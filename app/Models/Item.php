<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category_brand()
    {
        return $this->belongsTo(Category_brand::class);
    }


    public function category_product()
    {
        return $this->belongsTo(Category_product::class);
    }

    //   public function item()
    // {
    //     return $this->belongsToManys(Item::class);
    // }
}
