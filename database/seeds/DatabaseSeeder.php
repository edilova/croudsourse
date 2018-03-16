<?php
use App\Models\User as User;
use App\Models\Post as Post;
use App\Role as Role;
use App\Models\Translation as Translation;
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
        $role_user    = Role::where('name','user')->first();


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
        $user = User::create([
            'email'=>'user@soztekser.kz',
            'password'=>Hash::make('user'),
            'name'=>'Юзер Юзербеков'
        ]);
        $user->roles()->attach($role_user);

        $post1 = Post::create([
            'content'=>'Жана жылда тагыда Алматыга барамын',
            'user_id'=>1
        ]);
        $translation = Translation::create([
            'content'=>'Жана жылда тағыда Алматыға барамын',
            'post_id'=>1,
            'user_id'=>4
        ]);
    }
}
