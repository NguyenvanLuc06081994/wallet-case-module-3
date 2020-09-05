<?php

namespace App\Http\Controllers;

use App\Category;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
    }
    public function getAll(){
        $transactions = Transaction::all();
        $categories = Category::all();
        return view('transaction.list',compact('transactions','categories'));
    }

    public function showFormAdd()
    {
        $categories = Category::all();
        return view('transaction.add',compact('categories'));
    }

    public function addTransaction(Request $request)
    {
        $transaction = new Transaction();
        $transaction->money = $request->money;
        $transaction->transaction_at = $request->transaction_at;
        $transaction->category_id = $request->category_id;
        $transaction->description = $request->description;
        $transaction->save();
        return redirect()->route('transactions.list');
    }

    public function showFormEdit($id)
    {
        $categories = Category::all();
        $transaction = Transaction::find($id);
        return view('transaction.edit',compact('transaction','categories'));
    }

    public function Edit(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->money = $request->money;
        $transaction->transaction_at = $request->transaction_at;
        $transaction->category_id = $request->category_id;
        $transaction->description = $request->description;
        $transaction->save();
        return redirect()->route('transactions.list');
    }

    public function delete($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        return redirect()->route('transactions.list');
    }
}