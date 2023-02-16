<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function order()
    {
       return $this->hasMany(Order::class, 'who_ordered_id', 'id');
    }
}
