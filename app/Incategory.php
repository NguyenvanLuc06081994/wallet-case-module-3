<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incategory extends Model
{
    protected $table = 'incategories';

    public function incomes()
    {
        return $this->hasMany('App\Income','incategory_id','id');
    }
}
