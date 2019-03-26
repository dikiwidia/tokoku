<?php

namespace App\Http\Controllers\Tokoku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Tokoku\StoreProductRequest;
use App\Http\Requests\Tokoku\UpdateProductRequest;

use App\Tokoku\Product;
use App\Tokoku\Measure;

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
        return redirect($this->current)->with('status', 'Berhasil Menghapus Product');
    }
}
