<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateSaveTenantRequest;
use App\Library\Date;
use App\Library\MyClass;
use App\Models\Payment;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TenantController extends Controller
{
    public function index(Request $request)
    {
        $tenans = Tenant::realTenants();

        if($request->has('company_name')) $tenans->where('company_name','like','%'.$request->get('company_name').'%');
        if($request->has('type')) $tenans->where('type', $request->get('type'));
        if($request->has('last_date')) $tenans->where(DB::raw("DATE_FORMAT(last_date, '%d-%m-%Y')"), 'like', '%'.$request->get('last_date').'%');
        if($request->has('created_at')) $tenans->where(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y %H:%i')"), 'like', '%'.$request->get('created_at').'%');

        $tenans = $tenans->paginate( MyClass::ADMIN_ROW_COUNT );

        $dataToBlade = [
            'tenans' => $tenans,
            'request' => $request
        ];
        return view('admin.tenant.tenants',$dataToBlade);
    }

    public function addEdit($tenant)
    {
        $dataToBlade = [
            'id' => $tenant,
            'Tenant' => Tenant::realTenants()->where('id',$tenant)->first()
        ];

        return view('admin.tenant.tenantAddEdit',$dataToBlade);
    }

    public function addEditTenant(UpdateSaveTenantRequest $request, $tenant)
    {
        if($tenant == 0)
        {
            $newTenant = new Tenant();
        }
        else
        {
            $newTenant = Tenant::find($tenant);
        }

        $newTenant->company_name = $request->get('company_name');
        $newTenant->type = $request->get('type');
        $newTenant->save();

        return redirect()->route('tenant');
    }

    public function payment(Tenant $tenant)
    {
        return view('admin.tenant.payment', ['tenant' => $tenant]);
    }

    public function payment_action(Request $request, Tenant $tenant)
    {
        $validator = Validator::make($request->all(), [
            'month_count' => 'integer|min:1|max:10'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $months = (int)$request->month_count;
            $firtDate = max(strtotime($tenant->last_date), time());
            $lastDate = date('Y-m-d', strtotime("+$months months", $firtDate));

            $tenant->last_date = $lastDate;
            $tenant->save();

            $payment = new Payment();
            $payment->type = $tenant->type;
            $payment->month_count = $months;
            $payment->amount = $months * $tenant->msk_type->amount;
            $payment->tenant_id = $tenant->id;
            $payment->save();

            return redirect()->route('tenant');
        }
    }

    public function delete(Tenant $tenant)
    {
        $tenant->deleted = 1;
        $tenant->save();

        return redirect()->route('tenant');
    }
}
