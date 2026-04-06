<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PracticeReport;

class PracticeReportSeeder extends Seeder
{
    public function run(): void
    {
        PracticeReport::create([
            'student_name' => 'Карташов Илья Сергеевич',
            'group' => 'ИСП-029',
            'supervisor' => 'Якименко Ольга Александровна',
            'organization' => 'ГБПОУ МО Сергиево-Посадский колледж',
            'period' => 'дата — дата',
            'tasks' => 'Реализация сайта по методичке, наполнение контентом, создание API.',
            'conclusion' => 'Практика выполнена успешно.',
        ]);
    }
}
