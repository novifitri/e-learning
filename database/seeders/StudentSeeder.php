<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Student::create([
            'nis' => "123456",
            'name' => 'Amari Fanny',
            'email' => 'amari.fanny@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => bcrypt('password'),
            "alamat" => "Semarang",
            "agama" => "katolik",  
            "no_hp" => "08123456789",
            "gender" => "perempuan",
            "classroom_id" => "1",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // Role::create(["guard_name"=> "student", "name" => "student"]);
        Role::create(["name" => "student"]);

        $student->assignRole("student");
    }
}
