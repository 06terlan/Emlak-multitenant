<?php



namespace App\Http\Requests\Admin;



use App\Library\MyClass;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;
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

            'header'        => 'required|min:5|max:200',

            'type'          => ['required', Rule::in(array_keys(MyClass::$announcementTypes))],

            'type2'          => ['string', Rule::in(array_keys(MyClass::$buldingSecondType))],

            'amount'        => 'required|numeric|min:1|max:99999999',

            'area'          => '',

            'roomCount'     => 'max:255',

            'locatedFloor'  => 'max:30000',

            'floorCount'    => 'max:30000',

            'documentType'  => ['required', Rule::in(array_keys(MyClass::$documentTypes))],

            'repairing'     => ['required', Rule::in(array_keys(MyClass::$repairingTypes))],

            'content'       => 'required',

            'metro'         => 'integer|exists:msk_metros,id',

            'city'          => 'integer|exists:msk_cities,id',

            'place'         => 'string|nullable|max:20',

            'pictures'      => 'nullable|array|max:6',

            'pictures.*'    => 'image|max:3000',

            'owner'         => 'max:40',

            //'site'          => 'max:40',

            'mobnom'        => 'required|array',

            'user'          => 'required',

            'from'          => 'min:0,integer',

            'loc_lat'       => 'required|numeric',

            'loc_lng'       => 'required|numeric'
        ];

    }

}

