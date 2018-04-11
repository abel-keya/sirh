<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        Role::create([
            'name' => 'administrator'
        ]);

        Role::create([
            'name' => 'manager'
        ]);

        Role::create([
            'name' => 'employee'
        ]);
    }
}
