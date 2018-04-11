<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();

        Department::create([
            'name' => 'IT Department'
        ]);

        Department::create([
            'name' => 'Human Resource'
        ]);

        Department::create([
            'name' => 'Customer Service'
        ]);
    }
}
