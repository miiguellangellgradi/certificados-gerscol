<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificates extends Model
{
    public function courses()
    {
        return $this->belongsTo(courses::class);
    }

    public function students()
    {
        return $this->belongsTo(students::class);
    }

    protected $guarded = [];
}
