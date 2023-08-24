<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public function application(){
        return $this->hasMany(Application::class, 'server_id', 'id');
    }

    public static function application_count()
    {
        $app_count = Server::query()->join('applications', 'applications.server_id', 'servers.id')->selectRaw('servers.hostname, count(applications.id) as count')->where('applications.status', 1)->groupBy('servers.hostname')->get();
        return $app_count;
    }

    public static function runtime($application)
    {
        $server_creation = Server::query()->selectRaw('servers.created_at')->where('id', '=', $application)->first();
        $current_time = now();

        
        $runtime = Carbon::parse($server_creation->created_at);
        $current_time->format('Y-m-d h:m:s');
        $difference = $current_time->diffForHumans($runtime);

        return $difference;

    }
}
