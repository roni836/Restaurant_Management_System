<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Order extends Model
{
    use HasFactory;
    public function orderItem(): HasMany{
        return $this->HasMany(OrderItem::class,"order_id","id");
    }

    // public function totalAmount(): Attribute{
    //     return Attribute::make(

    //     )
    // }

    public function users():HasOne{
        return $this->HasOne(User::class,"id","user_id");
    }
    
}
