<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class CategoryTableSeeder extends Seeder
{
    
    public function run(): void
    {
        static $category = [
            'Gastos',
            'Ganhos'
        ];
    
    }
}
