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
            'name'              => 'Kelvin Admin',
            'email'             => 'kelvinadmin@gmail.com',
            'password'          =>  bcrypt('password'),
            'department_id'     =>  1,
            'nationality'       => 'Kenyan',
            'date_of_birth'     => '1993-04-12',
            'gender'            => 'Female',
            'marital_status'    => 'Single',
            'id_number'         => '43543d634',
            'mobile_number'     => '0734430543',
            'next_of_kin'       => 'sdafsd asdfasdf',
            'next_of_kin_id_no' => '0767435345',
            'address'           => 'sddafsd asdfasdf',
            'employment_status' => 'Part time',
            'linkedin_url'      => 'http://44fdsfd.com'
        ]);

        $user->assignRole($adminRole);
        $user->assignRole($managerRole);
        $user->assignRole($employeeRole);

        $user = User::create([  
            'name'              => 'Kelvin Manager',
            'email'             => 'kelvinmanager@gmail.com',
            'password'          => bcrypt('password'),
            'department_id'     => 2,
            'nationality'       => 'Kenyan',
            'date_of_birth'     => '1999-04-12',
            'gender'            => 'Male',
            'marital_status'    => 'Single',
            'id_number'         => '43543634',
            'mobile_number'     => '0790430543',
            'next_of_kin'       => 'sdafsd asdfasdf',
            'next_of_kin_id_no' => '0756435345',
            'address'           => 'sddafsd asdfasdf',
            'employment_status' => 'Part time',
            'linkedin_url'      => 'http://asdfasdf.com'
        ]);

        $user->assignRole($managerRole);
        $user->assignRole($employeeRole);

        $user = User::create([  
            'name'              => 'Kelvin Employee',
            'email'             => 'kelvinemployee@gmail.com',
            'password'          =>  bcrypt('password'),
            'department_id'     =>  2,
            'nationality'       => 'Kenyan',
            'date_of_birth'     => '1994-04-12',
            'gender'            => 'Female',
            'marital_status'    => 'Single',
            'id_number'         => '43543634',
            'mobile_number'     => '0790430543',
            'next_of_kin'       => 'sdafsd asdfasdf',
            'next_of_kin_id_no' => '0756435345',
            'address'           => 'sddafsd asdfasdf',
            'employment_status' => 'Part time',
            'linkedin_url'      => 'http://ddfd.com'
        ]);

        $user->assignRole($employeeRole);
    }
}
