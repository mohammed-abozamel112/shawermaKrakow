<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShawermaKrakow extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
