<?php

namespace App\Http\Controllers\Tokoku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Redirect;

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
}
