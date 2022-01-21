<?php

namespace Database\Seeders;

use App\Models\Admin;

use Illuminate\Database\Seeder;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = array(
            array(
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'address' => 'Kathmandu',
                'phone' => '9865711464',
                'role' => 'admin',
                'status' => 'active'
            ),
            array(
                'name' => 'Editor User',
                'email' => 'editor@gmail.com',
                'password' => bcrypt('editor123'),
                'address' => 'Lalitpur',
                'phone' => '985467894',
                'role' => 'editor',
                'status' => 'active'
            ),
            array(
                'name' => 'Harish',
                'email' => 'thagunnaharish23@gmail.com',
                'password' => bcrypt('harish123'),
                'address' => 'Lalitpur',
                'phone' => '985467894',
                'role' => 'admin',
                'status' => 'active'
            )

        );
        foreach ($list as $userInfo) {
            # code...
            if (Admin::where('email', $userInfo['email'])->count()==0){
                Admin::insert($userInfo);
            }
        }
    }
}
