<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class,'wallet_id','id');
    }
}
