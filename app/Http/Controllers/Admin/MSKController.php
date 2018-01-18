<?php

namespace App\Http\Controllers\Admin;

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
        $makles = MskMakler::all();

        return view( 'admin.msk.makler', [ 'makles' => $makles ]);
    }

    public function maklerAddEdit(Request $request, $makler)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|min:5|max:30',
                'mobnom' => 'required|string|min:14|max:14',
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
                $maklerData->mobnom = $request->get('mobnom');
                $maklerData->pure_mobnom = MyHelper::pureNumber($request->get('mobnom'));
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
