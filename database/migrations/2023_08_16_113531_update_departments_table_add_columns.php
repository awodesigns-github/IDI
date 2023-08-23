<?php

use App\Models\Application;
use App\Models\Organisational_unit;
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
        Schema::table('departments', function (Blueprint $table) {
            $table->string('name');
            $table->string('branch');
            $table->integer('units');
            $table->integer('applications');
            $table->integer('kpi');
            $table->foreignIdFor(Application::class);
            $table->foreignIdFor(Organisational_unit::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('branch');
            $table->dropColumn('units');
            $table->dropColumn('applications');
            $table->dropColumn('kpi');
            $table->dropForeign('application_id');
            $table->dropForeign('organisational_unit_id');
        });
    }
};
