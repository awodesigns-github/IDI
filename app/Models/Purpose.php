<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Purpose extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function server()
    {
        return $this->belongsToMany(Server::class);
    }
}
