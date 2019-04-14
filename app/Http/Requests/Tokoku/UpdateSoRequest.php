<?php

namespace App\Http\Requests\Tokoku;

use Illuminate\Foundation\Http\FormRequest;

use App\Tokoku\Warehouse;

class UpdateSoRequest extends FormRequest
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
        //Warehouse
        $data['warehouse']  = Warehouse::get();
        foreach($data['warehouse'] as $item){
            $items_2[] = $item->id;
        }
        $warehouse = implode(',',$items_2);
        
        return [
            'warehouse_id'  => 'required|in:'.$warehouse,
            'qty'           => 'required|min:0|numeric',
        ];
    }
}
