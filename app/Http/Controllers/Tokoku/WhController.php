<?php

namespace App\Http\Controllers\Tokoku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Tokoku\StoreWhRequest;

use App\Tokoku\Warehouse;

class WhController extends Controller
{
    private $home, $current;

    public function __construct()
    {
        $this->middleware('auth');
        $this->home = route('home');
        $this->current = route('whIndex');
    }

    public function index(){
        $data['parse'] = Warehouse::orderBy('created_at', 'desc')->get();
        $no = 1;
        return view('tokoku.warehouse.index',compact('data','no'));
    }

    public function create(){
        return view('tokoku.warehouse.create');
    }

    public function store(StoreWhRequest $request){
        $data           = new Warehouse;
        $data->name     = $request->input('name');
        $data->save();

        return redirect($this->current);
    }

    public function edit($id){
        $data   = Warehouse::find($id);
        if($data == null){
            return redirect($this->current);
        }
        return view('tokoku.warehouse.edit',compact('data'));
    }

    public function update(StoreWhRequest $request, $id){
        $x = Warehouse::find($id);
        $array_update = [
            'name'    => $request->input('name'),
        ];                
        $x->update($array_update);
        return redirect($this->current);
    }

    public function delete(Request $request){
        $id     = $request->input('id');
        
        $x   = Warehouse::find($id);
        if($x != null){
            $x->delete();
        }
        return redirect($this->current)->with('status', 'Berhasil Menghapus Gudang');
    }
}
