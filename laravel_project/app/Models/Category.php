<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function hasMany($related, $foreignKey = null, $localKey = null)
    {
        //return parent::hasMany($related, $foreignKey, $localKey);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
