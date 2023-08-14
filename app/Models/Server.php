<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function purpose(){
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Purpose::class);
    }

    public function environment(){
        return $this->belongsTo(Environment::class);
    }

    public function operating_system(){
        return $this->belongsTo(Operating_system::class);
    }

    public function server_type(){
        return $this->belongsTo(Server_type::class);
    }
}
