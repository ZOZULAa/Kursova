<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Binafy\LaravelCart\Cartable;

class medicine extends Model implements Cartable
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'medicines';
    protected $guarded = false;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getPrice(): float
    {
        return $this->price; 
    }
}
