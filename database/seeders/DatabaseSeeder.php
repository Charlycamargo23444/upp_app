<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Video;
use App\Models\Category as ModelsCategory;
use App\Models\City;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Image;
use App\Models\Location;
use App\Models\Phone;
use App\Models\Post as ModelsPost;
use App\Models\Profile;
use App\Models\Role;
use App\Models\State;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory(300)->create();
        Video::factory(300)->create();
        ModelsPost::factory(300)->create();
        Comment::factory(5)->create();
        ModelsCategory::factory(5)->create();
        City::factory(5)->create();
        Country::factory(5)->create();
        Gender::factory(5)->create();
        Image::factory(5)->create();
        Location::factory(5)->create();
        Phone::factory(5)->create();
        Profile::factory(5)->create();
        Role::factory(5)->create();
        State::factory(5)->create();


    }
}
