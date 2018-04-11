<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete(); 

        //roles
        $adminRole             = Role::whereName('administrator')->first();
        
        $managerRole           = Role::whereName('manager')->first();

        $employeeRole          = Role::whereName('employee')->first();
 
        $user = User::create([
            'name'            => 'Kelvin Admin',
            'email'           => 'kelvinadmin@gmail.com',
            'department_id'   =>  1,
            'password'        =>  bcrypt('password')
        ]);

        $user->assignRole($adminRole);
        $user->assignRole($managerRole);
        $user->assignRole($employeeRole);

        $user = User::create([
            'name'            => 'Kelvin Manager',
            'email'           => 'kelvinmanager@gmail.com', 
            'department_id'   =>  2,
            'password'        =>  bcrypt('password')
        ]);

        $user->assignRole($managerRole);
        $user->assignRole($employeeRole);

        $user = User::create([
            'name'            => 'Kelvin Employee',
            'email'           => 'kelvinemployee@gmail.com', 
            'department_id'   =>  3,
            'password'        =>  bcrypt('password')
        ]);

        $user->assignRole($employeeRole);
    }
}
