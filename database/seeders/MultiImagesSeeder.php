<?php

namespace Database\Seeders;

use App\Models\MultiImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MultiImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images =
            [
                ['multi_image' => 'skeatch_light.png'],
                ['multi_image' => 'illustrator_light.png'],
                ['multi_image' => 'invision_light.png'],
                ['multi_image' => 'photoshop_light.png'],
                ['multi_image' => 'figma_light.png'],
                ['multi_image' => 'hotjar_light.png'],
                ['multi_image' => 'xd_light.png'],
            ];
        foreach ($images as  $image) {
            MultiImages::create($image);
        }
    }
}