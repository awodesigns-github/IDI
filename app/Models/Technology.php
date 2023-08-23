<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    // create a relationship between applications and technologies ...
    public function application()
    {
        return $this->belongsToMany(Application::class);
    }
} 
