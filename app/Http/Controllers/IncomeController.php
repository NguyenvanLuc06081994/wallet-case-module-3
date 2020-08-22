<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function showFormAdd()
    {
        return view('wallet.add');
    }
}
