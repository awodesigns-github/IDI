<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Environment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

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

    public static function application_name()
    {
        $app_name = Application::query()->select('applications.name')->get();
        return $app_name;
    }

    public static function application_status()
    {
        $app_status = Application::query()->select('applications.status')->get();
        return $app_status;
    }

    public static function runtime($application)
    {
        $application_creation = Application::query()->selectRaw('applications.created_at')->where('id', '=', $application)->first();
        $current_time = now();

        
        $runtime = Carbon::parse($application_creation->created_at);
        $current_time->format('Y-m-d h:m:s');
        $difference = $current_time->diffForHumans($runtime);

        return $difference;

    }
}
