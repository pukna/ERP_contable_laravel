<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Unit;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class BankController extends Controller
{
    public function index()
    {
        $lims_bank_all = Bank::where('is_active', true)->get();
        return view('bank.create', compact('lims_bank_all'));
    }



}
