<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = [
            ['name' => 'Maths', 'code' => '041', 'status' => '1'],
            ['name' => 'Science', 'code' => '086', 'status' => '1'],
            ['name' => 'Biology', 'code' => '044', 'status' => '1'],
            ['name' => 'English', 'code' => '184', 'status' => '1'],
        ];

        Subject::insert($subject);

    }
}
