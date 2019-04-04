<?php

namespace App\Http\Requests\Tokoku;

use Illuminate\Foundation\Http\FormRequest;
use App\Tokoku\Product;
use App\Tokoku\Warehouse;
use App\Tokoku\Transaction;
use App\Tokoku\Periode;

class StoreTrRequest extends FormRequest
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
            return redirect('/');
        }

        $data['parse'] = Transaction::where('type','SO')->where('periode_id',$periode->id)->get();
        if($data['parse']->count() == 0){
            return redirect('/');
        } else {
            foreach($data['parse'] as $item){
                $items[] = $item->product->id;
            }
        }
        $product = implode(',',$items);
        
        $rules = [
            'date'          => 'required|date_format:Y-m-d',
            'type'          => 'required|in:S,B'
        ];
        
        foreach($this->request->get('product_id') as $key => $value)
        {
            $rules['product_id.'.$key] = 'required|in:'.$product; // you can set rules for all the array items
        }

        foreach($this->request->get('qty') as $key => $value)
        {
            $rules['qty.'.$key] = 'required|numeric'; // you can set rules for all the array items
        }
        return $rules;
        
    }
}
