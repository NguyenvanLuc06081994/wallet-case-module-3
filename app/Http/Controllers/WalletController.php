<?php

namespace App\Http\Controllers;

use App\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function getAll()
    {
        $wallets = Wallet::all();
        return view('wallet.list',compact('wallets'));
    }
}
