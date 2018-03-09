<?php

namespace App\Http\Requests\Admin;

use App\Library\MyClass;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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

            'buldingSecondType' => 'array|nullable',

            'buldingSecondType.*' => ['string', Rule::in(array_keys(MyClass::$buldingSecondType))],

            'buldingType' => 'array|nullable',

            'buldingType.*' => ['string', Rule::in(array_keys(MyClass::$buldingType))],

            'city' => 'array|nullable',

            'city.*' => 'integer|exists:msk_cities,id',

            'date1'         => 'nullable|date_format:d-m-Y',

            'date2'         => 'nullable|date_format:d-m-Y',

            'ownerType' => ['integer', 'nullable', Rule::in(array_keys(MyClass::$ownerType))],

            'locatedFloor1'  => 'integer|nullable|max:30000',

            'locatedFloor2'  => 'integer|nullable|max:30000',

            'amount1'        => 'numeric|nullable|max:99999999',

            'amount2'        => 'numeric|nullable|max:99999999',

            'metro'         => 'array|nullable',

            'metro.*' =>  ['integer', Rule::in(array_keys(MyClass::$metros))],
        ];
    }
}
