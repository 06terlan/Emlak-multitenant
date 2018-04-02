<?php

namespace App\Http\Requests\Admin;

use App\Library\MyClass;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SearchRequest extends FormRequest
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
            'type' => ['string', 'nullable', Rule::in(array_keys(MyClass::$announcementTypes))],

            'buldingSecondType' => ['string', 'nullable', Rule::in(array_keys(MyClass::$buldingSecondType))],

            //'buldingSecondType.*' => ['string', Rule::in(array_keys(MyClass::$buldingSecondType))],

            'buldingType' => ['string', 'nullable', Rule::in(array_keys(MyClass::$buldingType))],

            //'buldingType.*' => ['string', Rule::in(array_keys(MyClass::$buldingType))],

            'city' => ['nullable', 'integer', Rule::in(array_keys(MyClass::$city))],

            //'city.*' => 'integer|exists:msk_cities,id',

            'date1'         => 'nullable|date_format:d-m-Y',

            'date2'         => 'nullable|date_format:d-m-Y',

            'ownerType' => ['integer', 'nullable', Rule::in(array_keys(MyClass::$ownerType))],

            'locatedFloor1'  => 'integer|max:31',

            'locatedFloor2'  => 'integer|max:31',

            'floorCount1'  => 'integer|max:31',

            'floorCount2'  => 'integer|max:31',

            'amount1'        => 'numeric|nullable|max:99999999',

            'amount2'        => 'numeric|nullable|max:99999999',

            'area1'        => 'integer|nullable|max:99999999',

            'area2'        => 'integer|nullable|max:99999999',

            'roomCount'        => 'integer|nullable|max:11',

            'status'        => 'array|nullable',

            'status.*'        => ['integer', Rule::in(array_keys(MyClass::$buttonStatus2))],

            'district'        => 'array|nullable',

            'district.*'        => ['integer', Rule::in(array_keys(MyClass::$district))],

            'metro'        => 'array|nullable',

            'metro.*'        => ['integer', Rule::in(array_keys(MyClass::$metros))],

            'sight'        => 'array|nullable',

            'sight.*'        => ['integer', Rule::in(array_keys(MyClass::$sight))],

            'which' =>  'integer|nullable|in:1,2',
        ];
    }
}
