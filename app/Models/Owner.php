<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function organisationalUnit(){
        return $this->belongsTo(Organisational_unit::class);
    }

    public function ownerType() {
        return $this->belongsTo(Owner_type::class);
    }
}
