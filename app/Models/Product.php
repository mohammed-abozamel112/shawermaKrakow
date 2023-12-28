<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'description',
        'category',
        'quantity',
        'availability',
        'top_product',
        'weight',
        'price_before_discount',
        'price_after_discount',
        'image',
        'shawerma_krakows_id',
    ];

    public function shawermaKrakow()
    {
        return $this->belongsTo(ShawermaKrakow::class, 'shawerma_krakows_id');
    }
}
