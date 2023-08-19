<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function application()
    {
        return $this->hasMany(Application::class);
    }

    public function organisationalUnit()
    {
        return $this->hasMany(Organisational_unit::class);
    }
}
