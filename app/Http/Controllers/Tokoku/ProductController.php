<?php

namespace App\Http\Controllers\Tokoku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Tokoku\StoreProductRequest;
use App\Http\Requests\Tokoku\UpdateProductRequest;

use Illuminate\Support\Facades\DB;
use Excel;
use Exception;
use \Carbon\Carbon;

use App\Tokoku\Product;
use App\Tokoku\Measure;
use App\Tokoku\Imports\ModulImport;

class ProductController extends Controller
{
    private $home, $current;

    public function __construct()
    {
        $this->middleware('auth');
        $this->home = route('home');
        $this->current = route('pdIndex');
    }

    public function index(){
        $data['parse'] = Product::orderBy('name')->get();
        $no = 1;
        return view('tokoku.product.index',compact('data','no'));
    }

    public function create(){
        $data['measure'] = Measure::all();
        return view('tokoku.product.create',compact('data'));
    }

    public function store(StoreProductRequest $request){
        $data               = new Product;
        $data->code         = $request->input('code');
        $data->name         = $request->input('name');
        $data->measure_id   = $request->input('measure_id');
        $data->price        = $request->input('price');
        $data->warn_stock   = $request->input('warn_stock');
        $data->save();

        return redirect(route('pdCreate'));
    }

    public function edit($id){
        $data['measure'] = Measure::all();
        $data['parse']   = Product::find($id);
        if($data == null){
            return redirect($this->current);
        }
        return view('tokoku.product.edit',compact('data'));
    }

    public function update(UpdateProductRequest $request, $id){
        $x = Product::find($id);
        if($x != null){
            $array_update = [
                'name'         => $request->input('name'),
                'code'         => $request->input('code'),
                'name'         => $request->input('name'),
                'measure_id'   => $request->input('measure_id'),
                'price'        => $request->input('price'),
                'warn_stock'   => $request->input('warn_stock')
            ];                
            $x->update($array_update);
        }
        return redirect($this->current);
    }

    public function delete(Request $request){
        $id     = $request->input('id');
        
        $x   = Product::find($id);
        if($x != null){
            $x->delete();
        }
        return redirect($this->current)->with('status', 'Berhasil Menghapus Produk');
    }

    public function deleteAll(){
        DB::table('product')->delete();
        return redirect($this->current)->with('status', 'Berhasil Menghapus Semua Produk');
    }

    public function import(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext  = $file->getClientOriginalExtension();
            
            if($ext != 'xls'){
                return redirect($this->current)->with('errors', 'Kesalahan: File yang diunggah wajib berekstensi XLS (Excel 1997 - 2003 Format)');
            }
            
            $data = Excel::load($file);
            $insert = array();
            foreach ($data->get() as $element) {
                $data = array(
                    'code' => $element['code'] == null ? '-':$element['code'],
                    'name' => $element['name'] == null ? '-':$element['name'],
                    'warn_stock' => $element['warn_stock'] == null ? 0:$element['warn_stock'],
                    'price' => $element['price'] == null ? 0:$element['price'],
                    'measure_id' => 7
                );
                $insert[] = $data;
            }
            //dd($insert);
            try {
                Product::insert($insert);    
            } catch (Exception $e) {
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    return redirect($this->current)->with('errors', 'Kesalahan: 1062 - Terindikasi ada duplikasi kode barang. Pastikan tidak ada duplikasi Kode Barang sebelum Anda mengunggah berkas .xls Anda');
                }
                return redirect($this->current)->with('errors', 'Kesalahan: 0 - Template xls yang Anda unggah mungkin tidak sesuai ketentuan, Export data terlebih dahulu untuk mengetahui template');
            }
            return redirect($this->current)->with('status','Sukses diimpor');
        }
        return redirect($this->current);
    }

    public function export(){
        $type = 'xls';
        $name = 'Backup_Products_-_'.Carbon::now()->format('dmyHis');
        $data = Product::get()->toArray();

        return Excel::create($name, function($excel) use ($data) {
			$excel->sheet('products', function($sheet) use ($data){
				$sheet->fromArray($data);
	        });
        })->download($type);
        echo "<script>window.close();</script>";
    }
}
