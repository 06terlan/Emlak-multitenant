<?php

namespace App\Http\Requests\Admin;

use App\Library\MyClass;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateSaveTenantRequest extends FormRequest
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
            'company_name' => 'min:5|max:100|string',
            'type' => 'integer|required|exists:msk_types,id',
            //'last_date' => 'required|date_format:d-m-Y'
        ];
    }
}
