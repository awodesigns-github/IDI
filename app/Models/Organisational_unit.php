<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisational_unit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
