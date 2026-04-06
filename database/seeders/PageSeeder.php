<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::create([
            'title' => 'Главная',
            'slug' => 'home',
            'content' => '<p>Добро пожаловать на страницу практики.</p>',
            'meta_title' => 'Практика — Карташов И. С.',
            'meta_description' => 'Официальный сайт практики студента Карташова Ильи Сергеевича.',
            'published' => true,
        ]);
    }
}
