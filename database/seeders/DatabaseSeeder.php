<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Language;
use App\Models\Pricing;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Admin",
            'email' => "admin@a.com",
            'password' => Hash::make('admin'),
            'role' => "admin",
            'image' => "admin.png"
        ]);
        User::create([
            'name' => "User One",
            'email' => "userone@a.com",
            'password' => Hash::make('userone'),
            'role' => "user",
            'image' => "userone.png"
        ]);

        //Category Seeding
        $category = ['Web Design', 'Web Development', 'UI/UX', 'Android'];
        foreach ($category as $c) {
            Category::create([
                'slug' => Str::slug($c), //web-design
                'name' => $c
            ]);
        }

        //Lanuge
        $language = ['PHP', 'Laravel', 'Nodejs', 'React', 'Vue'];
        foreach ($language as $c) {
            Language::create([
                'slug' => Str::slug($c), //web-design
                'name' => $c
            ]);
        }

        Pricing::create([
            'slug' => "fifteen-day-plan",
            'title' => '15 Days  Plan',
            'learn_date' => 15,
            'price' => 8000,
            'description' => "Badget Plan",
        ]);
        Pricing::create([
            'slug' => "one-moth-plan",
            'title' => 'One Month Plan',
            'learn_date' => 30,
            'price' => 15000,
            'description' => "Regular Plan",
        ]);
    }
}
