<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portfolios = [
            'portfolio_name' => 'Web Development',
            'portfolio_title' => 'Banking Management System',
            'portfolio_image' => 'lisa.png',
            'portfolio_description' => 'Definition: Business strategy can be understood as the course of action or set of decisions which assist the entrepreneurs in achieving specific business objectives.',
        ];

        Portfolio::create($portfolios);
    }
}