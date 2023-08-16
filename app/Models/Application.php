<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Application extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = true;

    const EXCERPT_LENGTH = 100;

    public function technology(){
        return $this->hasOne(Technology::class);
    }

    public function server(){
        return $this->belongsTo(Server::class);
    }

    public function owner(){
        return $this->belongsTo(Owner::class);
    }

    public function excerpt()
    {
        return Str::limit($this->description, Application::EXCERPT_LENGTH);
    }
}
