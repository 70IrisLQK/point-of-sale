<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = [
            'title' => 'I have transform your ideas into remarkable digital products',
            'short_title' => '20+ Years Experience In this game, Means Product Designing',
            'short_description' => 'I love to work in User Experience & User Interface designing. Because I love to solve the design problem and find easy and better solutions to solve it. I always try my best to make good user interface with the best user experience. I have been working as a UX Designer',
            'long_description' => 'There are many variations of passages of Lorem Ipsum available ',
            'about_image' => 'about_img.png',
        ];

        About::updateOrCreate($about);
    }
}