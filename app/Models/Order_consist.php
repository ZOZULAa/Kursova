<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_consist extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'drugs';
    protected $guarded = false;
}
