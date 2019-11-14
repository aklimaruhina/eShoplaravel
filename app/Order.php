<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['user_id','ip_address','name','phone_no', 'shipping_address', 'email', 'message','is_paid', 'is_complete','seen_by_admin'];
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function carts(){
    	return $this->belongsTo(Cart::class);
    }
}
