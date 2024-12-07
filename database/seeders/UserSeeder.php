<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Designation;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $departments = [
            ['name' => 'Marketing manager', 'created_at' => now()],
            ['name' => 'mobile Application', 'created_at' => now()],
           
        ];
        DB::table('departments')->insert($departments);
    
        // Seed Designations
        $designations = [
            ['name' => 'Sales and marketing', 'created_at' => now()],
            ['name' => 'Application development', 'created_at' => now()],
          
        ];
        DB::table('designations')->insert($designations);
    
        // Seed Users
        $users = [
            ['name' => 'John Doe', 'fk_department' => 1, 'fk_designation' => 2, 'phone_number' => '1234567890', 'created_at' => now()],
            ['name' => 'Tommy mark', 'fk_department' => 2, 'fk_designation' => 1, 'phone_number' => '9876543210', 'created_at' => now()],
        ];
        DB::table('users')->insert($users);
    
    }
}
