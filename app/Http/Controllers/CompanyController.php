<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $lims_bank_all = Bank::where('is_active', true)->get();
        return view('bank.create', compact('lims_bank_all'));
    }
}
