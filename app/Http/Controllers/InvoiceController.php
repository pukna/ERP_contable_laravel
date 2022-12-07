<?php

namespace App\Http\Controllers;

use App\Account;
use App\GiftCard;
use App\PosSetting;
use App\Sale;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class InvoiceController extends Controller
{
    public function index()
    {
//        $role = Role::find(Auth::user()->role_id);
//        if($role->hasPermissionTo('sales-index')) {
//            $permissions = Role::findByName($role->name)->permissions;
//            foreach ($permissions as $permission)
//                $all_permission[] = $permission->name;
//            if(empty($all_permission))
//                $all_permission[] = 'dummy text';
//
//            if(Auth::user()->role_id > 2 && config('staff_access') == 'own')
//                $lims_sale_all = Sale::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
//            else
//                $lims_sale_all = Sale::orderBy('id', 'desc')->get();
//
//            $lims_gift_card_list = GiftCard::where("is_active", true)->get();
//            $lims_pos_setting_data = PosSetting::latest()->first();
//            $lims_account_list = Account::where('is_active', true)->get();
//
            return view('invoice.index');
//        }
//        else
//            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }
}
