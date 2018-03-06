<?php
use App\User as User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //User::truncate();
        User::create([
            'email'=>'admin@soztekser.kz',
            'password'=>Hash::make('admin'),
            'name'=>'Admin Adminych'
        ]);
    }
}
