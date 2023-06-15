<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'Normal',
        ]);
    }
}