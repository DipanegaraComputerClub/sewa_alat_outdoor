<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function childSubcategories()
    {
        return $this->hasMany(Subcategory::class, 'kategori_id');
    }
}
