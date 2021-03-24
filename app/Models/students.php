<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{

    public function certificates(){
        return $this->hasMany(certificates::class,);
     }

    protected $guarded = [];
}
