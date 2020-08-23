<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'incomes';

    public function incategory()
    {
        return $this->belongsTo('App\Incategory','incategory_id','id');
    }
}
