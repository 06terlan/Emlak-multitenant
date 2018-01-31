<?php

namespace App\Http\Requests\Admin;

use App\Library\MyClass;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MapRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check())
        {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type'          => [Rule::in(array_merge(array_keys(MyClass::$announcementTypes),['']))],

            'buldingType'  => [Rule::in(array_merge(array_keys(MyClass::$buldingType),['']))],

            'amount1'        => '',

            'amount2'        => '',

            'area1'          => '',

            'area2'          => '',

            'roomCount1'     => 'max:255',

            'roomCount2'     => 'max:255',

            'locatedFloor1'  => 'max:30000',

            'locatedFloor2'  => 'max:30000',

            'floorCount1'    => 'max:30000',

            'floorCount2'    => 'max:30000',

            'documentType'  => [Rule::in(array_merge(array_keys(MyClass::$documentTypes), ['']))],

            'repairing'     => [Rule::in(array_merge(array_keys(MyClass::$repairingTypes), ['']))],

            'content'       => '',

            'metro'         => 'max:20',

            'city'          => 'max:20',

            'owner'         => 'max:40',

            'date1'         => 'date_format:d-m-Y',

            'date2'         => 'date_format:d-m-Y',

            'mobnom'        => '',

            'user'          => '',

            'status'          => ''
        ];
    }
}
