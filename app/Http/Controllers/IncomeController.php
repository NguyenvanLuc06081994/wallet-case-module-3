<?php

namespace App\Http\Controllers;

use App\Incategory;
use App\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{

    public function getAll()
    {
        $incomes = Income::all();
        return view('income.list',compact('incomes'));
    }
    public function showFormAdd()
    {
        $categories = Incategory::all();
        return view('income.add',compact('categories'));
    }

    public function add(Request $request)
    {
        $income = new Income();
        $income->money = $request->money;
        $income->incategory_id = $request->category_id;
        $income->date = $request->date;
        $income->note = $request->note;
        $income->save();
        return redirect()->route('incomes.list');
    }
}
