<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $admin_user = array(
        'name' => 'admin',
        'email' => 'admin@reforest.com',
        'password' => 'admin'
    );

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

    private function seedAdminUser()
    {
        DB::table('users')->delete();
        DB::table('roles')->delete();

        Role::create(['name' => 'admin']);

        $admin = User::create([
            'name' => $this->admin_user['name'],
            'email' => $this->admin_user['email'],
            'password' => bcrypt($this->admin_user['password']),
        ]);

        $admin->assignRole('admin');
    }

    private function seedUsers()
    {
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
        $this->seedAdminUser();
        $this->seedUsers();
    }
}
