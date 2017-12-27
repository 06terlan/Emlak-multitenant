<?php

namespace App\Http\Requests\Admin;

use App\Library\MyClass;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProRequest extends FormRequest
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
        return [
            'header'        => 'required|min:5|max:200',
            'type'          => ['required', Rule::in(array_keys(MyClass::$announcementTypes))],
            'amount'        => 'required|numeric|min:1',
            'area'          => 'required|min:1|integer',
            'roomCount'     => 'required|min:1|max:255|integer',
            'locatedFloor'  => 'required|min:1|max:30000|integer',
            'floorCount'    => 'required|min:1|max:30000|integer',
            'documentType'  => ['required', Rule::in(array_keys(MyClass::$documentTypes))],
            'repairing'     => ['required', Rule::in(array_keys(MyClass::$repairingTypes))],
            'content'       => 'required',
        ];
    }
}
