<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    public $timestamps = false;  
    public function _province()
    {
        return $this->belongsTo(Province::class, 'id_of_id_as_city');
    }
    public function _city()
    {
        return $this->belongsTo(City_::class, 'place_of_id', 'city_id');
    }
}
