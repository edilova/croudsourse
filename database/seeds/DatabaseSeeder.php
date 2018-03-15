<?php
use App\Models\User as User;
use App\Models\Post as Post;
use App\Role as Role;
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
        $this->call(RoleTableSeeder::class);
        //User::truncate();
        $role_admin   = Role::where('name','admin')->first();
        $role_manager = Role::where('name','manager')->first();
        $role_expert  = Role::where('name','expert')->first();


        $admin = User::create([
            'email'=>'admin@soztekser.kz',
            'password'=>Hash::make('admin'),
            'name'=>'Admin Adminych'
        ]);
        $admin->roles()->attach($role_admin);
        $manager = User::create([
            'email'=>'manager@soztekser.kz',
            'password'=>Hash::make('manager'),
            'name'=>'Manager'
        ]);
        $manager->roles()->attach($role_manager);
        $expert = User::create([
            'email'=>'expert@soztekser.kz',
            'password'=>Hash::make('expert'),
            'name'=>'Expert'
        ]);
        $manager->roles()->attach($role_manager);

        Post::create([
            'content'=>'Жана жылда тагыда Алматыга барамын',
            'user_id'=>1
        ]);
    }
}
