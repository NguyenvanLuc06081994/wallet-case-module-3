<?php

namespace App\Http\Controllers;

use App\Category;
use App\Transaction;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct()
    {
    }

    public function getAll()
    {

        $transactions = Transaction::select('*')->orderBy('transaction_at', 'asc')->get();
        $categories = Category::all();
        return view('transaction.list', compact('transactions', 'categories'));
    }

    public function showFormAdd()
    {
        $categories = Category::all();
        return view('transaction.add', compact('categories'));
    }

    public function addTransaction(Request $request)
    {
        $user = Auth::user();
        $wallet = Wallet::find($user->wallet->id);
        $transaction = new Transaction();
        $transaction->money = $request->money;
        $transaction->transaction_at = $request->transaction_at;
        $transaction->category_id = $request->category_id;
        $transaction->description = $request->description;
        $transaction->wallet_id = $user->wallet->id;
        if ($transaction->category->type == 'in') {
            $wallet->money += $request->money;
        } else {
            $wallet->money -= $request->money;
        }
        $transaction->save();
        $wallet->save();
        return redirect()->route('transactions.list');
    }

    public function showFormEdit($id)
    {
        $categories = Category::all();
        $transaction = Transaction::find($id);
        return view('transaction.edit', compact('transaction', 'categories'));
    }

    public function edit(Request $request, $id)  // không đặt tên thế này
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

    public function showChart()
    {
        return view('chart.chart');
    }

    //Nhấn phím Ctrl+Alt+L để nó format code cho đẹp
    public function getChart()
    {
        $transactions = DB::table('transactions')->whereBetween('transaction_at', ['20200101', '20201231'])->orderBy('transaction_at')->get();
        $result = [];
        $categories = Category::all();
        foreach ($transactions as $transaction) {
            foreach ($categories as $category) {
                if ($transaction->category_id == $category->id) {
                    if ($category->type == 'in') {
                        $key = date('d-m', strtotime($transaction->transaction_at));
                        if (!isset($result[$key])) {
                            $result[$key] = $transaction->money;
                        } else {
                            $result[$key] += $transaction->money;
                        }
                    }
                }
            }

        }
        return response([
            'status' => 1,
            'data' => [
                'label' => array_keys($result),
                'data' => array_values($result)
            ]
        ]);
    }

    public function getChartOut()
    {
        $transactions = DB::table('transactions')->whereBetween('transaction_at', ['20200101', '20201231'])->orderBy('transaction_at')->get();
        $result = [];
        $categories = Category::all();
        foreach ($transactions as $transaction) {
            foreach ($categories as $category) {
                if ($transaction->category_id == $category->id) {
                    if ($category->type == 'out') {
                        $key = date('d-m', strtotime($transaction->transaction_at));
                        if (!isset($result[$key])) {
                            $result[$key] = $transaction->money;
                        } else {
                            $result[$key] += $transaction->money;
                        }
                    }
                }
            }

        }
        return response([
            'status' => 1,
            'data' => [
                'label' => array_keys($result),
                'data' => array_values($result)
            ]
        ]);
    }

    public function getAllTransactions()
    {
        $transactions = Transaction::all();
        $totalIn = 0;
        $totalOut = 0;
        foreach ($transactions as $transaction) {
            if ($transaction->category->type == 'in') {
                $totalIn += $transaction->money;
            } else {
                $totalOut += $transaction->money;
            }
        }
        return view('chart.list', compact('transactions', 'totalIn', 'totalOut'));
    }

    public function getTransactionsByCategory()
    {
        $transactions = DB::table('transactions')->whereBetween('transaction_at', ['20200101', '20201231'])->orderBy('transaction_at')->get();
        $result = [];
        $categories = Category::all();
        foreach ($transactions as $transaction) {
            foreach ($categories as $category) {
                if ($transaction->category_id == $category->id) {
                    if ($category->type == 'out') {
                        $key = $category->name;
                        if (!isset($result[$key])) {
                            $result[$key] = $transaction->money;
                        } else {
                            $result[$key] += $transaction->money;
                        }
                    }
                }
            }
        }
        return response(
          [
              'status'=>200,
              'data'=>[
                  'label'=> array_keys($result),
                  'data'=> array_values($result)
              ]
          ]
        );
    }
}
