<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issuing extends Model
{
    use HasFactory;

    protected $id = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    //tes
    public function detail_issuing()
    {
        return $this->hasOne(Detail_Issuing::class);
    }
}
