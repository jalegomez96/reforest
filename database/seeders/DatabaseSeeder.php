<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $users = array(
        array(
            'name' => 'Jaime Gomez',
            'email' => 'jgomez@gmail.com',
            'password' => 'jgomez1234'
        ),
        array(
            'name' => 'Juan Meneses',
            'email' => 'jmeneses@gmail.com',
            'password' => 'jmeneses1234'
        ),
        array(
            'name' => 'Brayan Tobar',
            'email' => 'btobar@gmail.com',
            'password' => 'btobar1234'
        )
    );

    private function seedUsers()
    {
        DB::table('users')->delete();
        foreach ($this->users as $user) {
            $p = new User();
            $p->name = $user['name'];
            $p->email = $user['email'];
            $p->password = bcrypt($user['password']);
            $p->save();
        }
    }

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->seedUsers();
    }
}
