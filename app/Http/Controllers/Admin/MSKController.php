<?php

namespace App\Http\Controllers\Admin;

use App\Library\MyClass;
use App\Library\MyHelper;
use App\Models\MskMakler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MSKController extends Controller
{
    #region makler

    public function makler()
    {
        $makles = MskMakler::realData()->paginate( MyClass::ADMIN_ROW_COUNT );

        //$announcements = $makles->paginate( MyClass::ADMIN_ROW_COUNT );

        return view( 'admin.msk.makler', [ 'makles' => $makles ]);
    }

    public function maklerAddEdit(Request $request, $makler)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|min:5|max:30',
                'number' => 'required|string|min:14|max:14|unique:msk_maklers',
            ]);

            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else
            {
                if($makler == 0)
                {
                    $maklerData = new MskMakler();
                }
                else
                {
                    $maklerData = MskMakler::find($makler);
                }

                $maklerData->fullname = $request->get('fullname');
                $maklerData->number = $request->get('number');
                $maklerData->pure_number = MyHelper::pureNumber($request->get('number'));
                $maklerData->save();

                return redirect()->route('msk_makler');
            }
        }
        else
        {
            $maklerData = MskMakler::find($makler);
            return view( 'admin.msk.maklerAddEdit', [ 'makler' => $maklerData, 'id' => $makler ]);
        }

    }

    public function maklerDelete(MskMakler $makler)
    {
        $makler->delete();

        return redirect()->back();
    }

    #endregion
}
