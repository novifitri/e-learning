<?php

namespace Database\Seeders;


use App\Models\Teacher;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = Teacher::create([
            'nig' => "123456",
            'name' => 'Bark Dane',
            'email' => 'bark.dane@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => bcrypt('password'),
            "alamat" => "Yogyakarta",
            "agama" => "islam",
            "no_hp" => "08123456789",
            "gender" => "laki - laki",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // Role::create(['guard_name' => 'teacher',"name" => "teacher"]);
        Role::create(["name" => "teacher"]);
        $teacher->assignRole("teacher");
    }
}
