<?php

namespace App\Http\Requests\Tokoku;

use Illuminate\Foundation\Http\FormRequest;
use App\Tokoku\Product;
use App\Tokoku\Warehouse;
use App\Tokoku\Transaction;
use App\Tokoku\Periode;

class StoreSoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $periode = Periode::where('active','Y')->get();
        if($periode->count() == 1){
            $periode = $periode->first();
        } else {
            $periode = 0;
        }

        $data['parse']       = Transaction::where('type','SO')->where('periode_id',$periode)->get();
        if($data['parse']->count() == 0){
            $data['product'] = Product::get();
        } else {
            foreach($data['parse'] as $id){
                $ids[] = $id->id;
            }
            $data['product'] = Product::whereNotIn('id',$ids)->get();
        }

        //Product
        foreach($data['product'] as $item){
            $items[] = $item->id;
        }
        $product = implode(',',$items);

        //Warehouse
        $data['warehouse']  = Warehouse::get();
        foreach($data['warehouse'] as $item){
            $items_2[] = $item->id;
        }
        $warehouse = implode(',',$items_2);
        
        return [
            'product_id'    => 'required|in:'.$product,
            'warehouse_id'  => 'required|in:'.$warehouse,
            'qty'           => 'required|min:0|numeric',
        ];
    }
}
