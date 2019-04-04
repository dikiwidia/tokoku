<?php

namespace App\Http\Controllers\Tokoku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

//use App\Http\Requests\Tokoku\ImportRequest;

use Excel;
use Redirect;

use App\Tokoku\Transaction;
use App\Tokoku\Periode;
use App\Tokoku\Product;
use App\Tokoku\Warehouse;

class ExcelController extends Controller
{
    private $home, $current, $periode;

    public function __construct()
    {
        $this->middleware('auth');
        $this->home = route('home');
        $this->current = route('pdIndex');
        $periode = Periode::where('active','Y')->get();
        if($periode->count() == 1){
            $this->periode = $periode->first();
        } else {
            Redirect::to('/periode')->send();;
        }
    }

    public function import(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            Excel::import(new ModulImport, $file);
            return redirect($this->current);
        }
        return redirect($this->current);
    }
}
