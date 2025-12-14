<?php

namespace Database\Seeders;

use App\Models\ClassAdvisor;
use App\Models\ClassRoom;
use App\Models\Teacher;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AdvisorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classRoomIds = ClassRoom::where('status_active', true)->pluck('id')->toArray();
        $teacherIds = Teacher::pluck('id')->toArray();

        foreach ($classRoomIds as $classRoomId) {
            $isClassId = null;
            $isTeacherId = null;

            if (!ClassAdvisor::where('class_room_id', $classRoomId)->exists()) {
                $isClassId = $classRoomId;
            } else {
                continue;
            }

            foreach ($teacherIds as $teacherId) {
                if (!ClassAdvisor::where('teacher_id', $teacherId)->exists()) {
                    $isTeacherId = $teacherId;
                    break;
                } else {
                    continue;
                }
            }

            if (!is_null($isClassId) && !is_null($isTeacherId)) {
                ClassAdvisor::create([
                    'class_room_id' => $isClassId,
                    'teacher_id' => $isTeacherId,
                ]);
            }
        }
    }
}
