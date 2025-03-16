<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $appends = ['status_label'];

    public function store(){
        return $this->hasOne('App\Models\StoreBranch','store_id','store_id');
    }
    
    public function getStatusLabelAttribute()
    {
        if($this->status == config('constant.STOCK_STATUS.OUT_OF_STOCK')){
            return 'Out Of Stock';
        }else if($this->status == config('constant.STOCK_STATUS.IN_STOCK')){
            return 'In Stock';
        }
    }
}
