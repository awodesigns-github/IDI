<?php

use App\Models\Operating_system;
use App\Models\Purpose;
use App\Models\Server_type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address');
            $table->string('hostname');
            $table->foreignId('environment_id'); // links to environments table
            $table->foreignIdFor(Purpose::class); // links to purposes table
            $table->foreignIdFor(Operating_system::class); // links to os table
            $table->foreignIdFor(Server_type::class); // links to server_type table
            $table->double('server_memory');
            $table->double('disk_space');
            $table->integer('applications');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
