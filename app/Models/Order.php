<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'token',
        'shipping',
        'total',
        'email',
        'phone_number',
        'first_name',
        'last_name',
        'address',
        'city',
        'country',
        'post_code',
        'payment_method',
        'card_number',
        'expire_date',
        'security_code',
        'shawermakrakows_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function orderitems()
    {
        return $this->hasMany(OrderItems::class);
    }
    public function shawermaKrakow()
    {
        return $this->belongsTo(Shawermakrakow::class, 'shawermakrakows_id');
    }
}
