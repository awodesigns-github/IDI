<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = true;

    public function technology(){
        return $this->hasOne(Technology::class);
    }

    public function server(){
        return $this->belongsTo(Server::class);
    }

    public function owner(){
        return $this->belongsTo(Owner::class);
    }
}
