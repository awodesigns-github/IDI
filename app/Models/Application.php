<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Environment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = true;

    public function technology(){
        return $this->belongsTo(Technology::class, 'technology_id');
    }

    public function server(){
        return $this->belongsTo(Server::class, 'server_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class, 'owner_id', 'id');
    }

    public function environment()
    {
        return $this->belongsTo(Environment::class, 'environment_id');
    }

    public static function environment_count()
    {
        $env_count = Application::query()->join('environments','applications.environment_id', 'environments.id')->selectRaw('environments.details, count(applications.id) as count')->groupBy('environments.details')->get();
        return $env_count;
    }
}
