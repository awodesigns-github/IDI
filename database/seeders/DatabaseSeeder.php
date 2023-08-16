<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // users seeder
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User II',
            'email' => 'testII@example.com',
        ]);

        // application seeder
        \App\Models\Application::create([
            'ci_number' => 'NBC001',
            'name' => 'IDI',
            'description' => 'This is a management application for managing entreprise applications and systems',
            'technology_id' => 1,
            'server_id' => 2,
            'owner_id' => 1
        ]);

        \App\Models\Application::create([
            'ci_number' => 'NBC011',
            'name' => 'IDI',
            'description' => 'This is a management application for managing entreprise applications and systems',
            'technology_id' => 1,
            'server_id' => 3,
            'owner_id' => 1
        ]);

        \App\Models\Application::create([
            'ci_number' => 'NBC002',
            'name' => 'IDI',
            'description' => 'This is a management application for managing entreprise applications and systems',
            'technology_id' => 1,
            'server_id' => 2,
            'owner_id' => 2
        ]);

        \App\Models\Application::create([
            'ci_number' => 'NBC006',
            'name' => 'IDI',
            'description' => 'This is a management application for managing entreprise applications and systems',
            'technology_id' => 3,
            'server_id' => 1,
            'owner_id' => 3
        ]);

        \App\Models\Application::create([
            'ci_number' => 'NBC004',
            'name' => 'IDI',
            'description' => 'This is a management application for managing entreprise applications and systems',
            'technology_id' => 3,
            'server_id' => 2,
            'owner_id' => 2
        ]);

        //purposes seeder
        \App\Models\Purpose::create([
            'details' => 'applications',
        ]);

        \App\Models\Purpose::create([
            'details' => 'applications and databases'
        ]);

        \App\Models\Purpose::create([
            'details' => 'databases'
        ]);

        //environments seeder
        \App\Models\Environment::create([
            'details' => 'Development'
        ]);

        \App\Models\Environment::create([
            'details' => 'UAT'
        ]);

        \App\Models\Environment::create([
            'details' => 'Production'
        ]);

        //operating_system seeder
        \App\Models\Operating_system::create([
            'details' => 'RedHat 8'
        ]);

        \App\Models\Operating_system::create([
            'details' => 'RedHat 9'
        ]);

        \App\Models\Operating_system::create([
            'details' => 'Windows Server 2022'
        ]);

        //server_types seeder
        \App\Models\Server_type::create([
            'details' => 'Virtual'
        ]);

        \App\Models\Server_type::create([
            'details' => 'Physical'
        ]);

        //server seeder
        \App\Models\Server::create([
            'ip_address' => "127.0.0.1",
            'hostname' => 'localhost',
            'environment_id' => 1,
            'purpose_id' => 1,
            'operating_system_id' => 1,
            'server_type_id' => 2,
            'server_memory' => '32000',
            'disk_space' => '64000',
            'applications' => 2,
            'status' => true
        ]);

        //department seeder
        // \App\Models\Department::create([
        //     'name' => 'Banking and Finance',
        //     'branch' => 'Samora',
        //     'units' => 3,
        //     'applications' => 3,
        //     'kpi' => 3,
        //     'application_id' => 1,
        //     'organisational_unit_id' => 1
        // ]);

        // \App\Models\Department::create([
        //     'name' => 'IT',
        //     'branch' => 'Posta',
        //     'units' => 3,
        //     'applications' => 2,
        //     'kpi' => 3,
        //     'application_id' => 4,
        //     'organisational_unit_id' => 1
        // ]);
        \App\Models\Department::create([
            'details' => 'Banking and Finance'
        ]);

        \App\Models\Department::create([
            'details' => 'IT'
        ]);

        //oganistaional units seeder
        \App\Models\Organisational_unit::create([
            'details' => 'Arusha Branch',
            'department_id' => 1
        ]);


        //owner types seeder
        \App\Models\Owner_type::create([
            'details' => 'Technical'
        ]);

        //owner seeder
        \App\Models\Owner::create([
            'name' => 'Joseph Mushi',
            'phone_number' => '+2551234567',
            'department_id' => 1,
            'organisational_unit_id' => 1,
            'owner_type_id' => 1
        ]);

        //technologies seeder
        \App\Models\Technology::create([
            'application_id' => 1,
            'framework' => 'Laravel',
            'database' => 'Pgsql',
            'container' => 'Docker'
        ]);
    }
}
