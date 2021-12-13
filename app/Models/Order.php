<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'user_id',
        'order_number',
        'sub_total',
        'total_amount',
        'delivery_charge',
        'coupon',
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'address',
        'city',
        'state',
        'postcode',
        'apartment',
        'note',
        'n_first_name',
        'n_last_name',
        'n_email',
        'n_phone',
        'n_country',
        'n_address',
        'n_city',
        'n_state',
        'n_postcode',
        'n_apartment',
        'n_note',
        'payment_status',
        'payment_method',
        'condition',
        'payment_details'
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'product_orders')->withPivot('quantity');
    }
}
