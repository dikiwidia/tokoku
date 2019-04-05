<?php

namespace App\Http\Controllers\Tokoku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Redirect;
use Excel;

use App\Tokoku\Transaction;
use App\Tokoku\Periode;
use App\Tokoku\Product;
use App\Tokoku\Warehouse;

class WsController extends Controller
{
    private $home, $current, $periode;

    public function __construct()
    {
        $this->middleware('auth');
        $this->home = route('home');
        $this->current = route('soIndex');
        $periode = Periode::where('active','Y')->get();
        if($periode->count() == 1){
            $this->periode = $periode->first();
        } else {
            Redirect::to('/periode')->send();;
        }
    }

    public function index(){
        $data['periode']    = $this->periode;
        $x = Transaction::where('periode_id', $this->periode->id)->where('type','SO')->get();
        $data['parse'] = $x->groupBy('product_id');
        $data['warehouse'] = Warehouse::get();
        $no = 1;
        return view('tokoku.warnstock.index',compact('data','no'));
    }

    public function sortByWarehouse($id){
        $data['periode']    = $this->periode;
        $x = Transaction::where('periode_id', $this->periode->id)->where('type','SO')->where('warehouse_id',$id)->get();
        $data['parse'] = $x->groupBy('product_id');
        $data['warehouse'] = Warehouse::get();
        $no = 1;
        return view('tokoku.warnstock.index',compact('data','no'));
    }

    public function export($id){
        $type = 'xls';
        $name = 'Report_Stock_-_'.Carbon::now()->format('dmyHis');
        
        if($id == 'all'){
            $check = Transaction::where('periode_id', $this->periode->id)->where('type','SO')->get();
            if($check->count() == 0){
                echo "<script>window.close();</script>";   
            }
        } else {
            $check = Transaction::where('periode_id', $this->periode->id)->where('type','SO')->where('warehouse_id',$id)->get();
            if($check->count() == 0){
                echo "<script>window.close();</script>";   
            }
        }

        foreach($check->groupBy('product_id') as $item){
            $data[] = [
                'code' => $item[0]->product->code,
                'name' => $item[0]->product->name,
                'price' => $item[0]->product->price,
                'warehouse' => $item[0]->warehouse_id == NULL ? '-' : $item[0]->warehouse->name,
                'so' => $item[0]->type_stock('SO'),
                'buy' => $item[0]->type_stock('B'),
                'sold' => $item[0]->type_stock('S')*-1,
                'total_stock' => $item[0]->total_stock()
            ];
        }
        //dd($data);
        return Excel::create($name, function($excel) use ($data) {
			$excel->sheet('products', function($sheet) use ($data){
				$sheet->fromArray($data);
	        });
        })->download($type);
        echo "<script>window.close();</script>";
    }
}
