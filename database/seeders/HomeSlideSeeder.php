<?php

namespace Database\Seeders;

use App\Models\HomeSlide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homeSliders = [
            'title' => 'I will give you Best Product in the shortest time.',
            'short_title' => 'I will give you Best Product in the shortest time.',
            'home_slide' => 'banner_img.png',
            'video_url' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
        ];

        HomeSlide::updateOrCreate($homeSliders);
    }
}