<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $footers = [
            'number' => '+086 28 16100',
            'short_description' => 'There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some form is also here.',
            'address' => 'VIETNAM',
            'email' => 'khanhlam.dev@gmail.com',
            'facebook' => 'facebook.com/70irislqk',
            'twitter' => 'twitter.com/70irislqk',
            'copyright' => 'Theme Pure 2021',
        ];

        Footer::create($footers);
    }
}