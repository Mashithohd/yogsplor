<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Insert sample user data
        DB::table('user')->insert([
            'nama_user' => 'nur',
            'email' => 'laa@gmail.com',
            'password' => Hash::make('12345678'), 
        ]);
    }
}
