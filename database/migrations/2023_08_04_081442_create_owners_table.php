<?php

use App\Models\Organisational_unit;
use App\Models\Owner_type;
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
        Schema::create('owners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone_number');
            $table->foreignId('department_id'); // links to departments table
            $table->foreignIdFor(Organisational_unit::class); // link to organisational_units table
            $table->foreignIdFor(Owner_type::class); // link to owner_types table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
