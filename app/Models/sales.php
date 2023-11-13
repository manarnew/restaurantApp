<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function saleDetails(){
        return $this->hasMany(saleDetails::class);
    }
}
