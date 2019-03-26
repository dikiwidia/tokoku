<?php

namespace App\Http\Controllers\Tokoku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Tokoku\StorePeriodeRequest;
use App\Http\Requests\Tokoku\UpdatePeriodeRequest;

use App\Tokoku\Periode;

class PeriodeController extends Controller
{
    private $home, $current;

    public function __construct()
    {
        $this->middleware('auth');
        $this->home = route('home');
        $this->current = route('periodeIndex');
    }

    public function index(){
        $data['parse'] = Periode::orderBy('created_at', 'desc')->get();
        $no = 1;
        return view('tokoku.periode.index',compact('data','no'));
    }

    public function create(){
        return view('tokoku.periode.create');
    }

    public function store(StorePeriodeRequest $request){
        $array_update = [
            'active'    => 'N',
        ];
        $x = Periode::where('active','Y');
        if($x->count() > 0){
            $x->update($array_update);
        }

        $data           = new Periode;
        $data->name     = $request->input('name');
        $data->active   = 'Y';
        $data->save();

        return redirect($this->current);
    }

    public function edit($id){
        $data   = Periode::find($id);
        if($data == null){
            return redirect($this->current);
        }
        return view('tokoku.periode.edit',compact('data'));
    }

    public function update(UpdatePeriodeRequest $request, $id){
        $x = Periode::find($id);
        if($request->input('active') == $x->active){
            $array_update = [
                'name'    => $request->input('name'),
            ];
            if($x->count() > 0){
                $x->update($array_update);
            } else {
                return redirect($this->current);
            }
        } else {
            $array_update = [
                'name'    => $request->input('name'),
                'active'    => $request->input('active')
            ];
            $up = Periode::where('active','Y');
            if($request->input('active') == 'Y'){
                $up->update(['active' => 'N']);
                $x->update($array_update);
            } else {
                $x->update($array_update);
            }
        }
        return redirect($this->current);
    }

    public function delete(Request $request){
        $id     = $request->input('id');
        
        $user   = Periode::find($id);
        if($user != null){
            $user->delete();
        }
        return redirect($this->current)->with('status', 'Berhasil Menghapus Periode');
    }
}
