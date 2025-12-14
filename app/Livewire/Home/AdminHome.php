<?php

namespace App\Livewire\Home;

use App\Helpers\HomeChart;
use App\Models\CheckInRecord;
use App\Models\CheckOutRecord;
use App\Models\ClassRoom;
use App\Models\ClassSchedule;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\SubjectStudy;
use App\Models\Teacher;
use App\Models\User;
use Livewire\Component;

class AdminHome extends Component
{
    public $totalStudent = 0;
    public $totalTeacher = 0;
    public $totalAdmin = 0;
    public $totalJadwalKelas = 0;
    public $totalMataPelajaran = 0;
    public $totalKelas = 0;

    public $chartStudents;
    public $chartTeachers;
    public $chartClasses;
    public $chartSchedules;
    public $chartDates;

    public $period = 'daily';

    public function getDataCount()
    {
        $this->totalStudent = Student::count();
        $this->totalTeacher = Teacher::count();
        $this->totalJadwalKelas = ClassSchedule::count();
        $this->totalMataPelajaran = SubjectStudy::count();
        $this->totalKelas = ClassRoom::count();
        $this->totalAdmin = User::where('role', 'admin')->count();
    }

    public function getDataChart()
    {
        $this->period = $this->period ?: 'daily';

        $studentChart  = HomeChart::CHART_DATA(Student::query(), $this->period);
        $teacherChart  = HomeChart::CHART_DATA(Teacher::query(), $this->period);
        $classChart    = HomeChart::CHART_DATA(ClassRoom::query(), $this->period);
        $scheduleChart = HomeChart::CHART_DATA(ClassSchedule::query(), $this->period);

        $this->chartStudents  = $studentChart['data'];
        $this->chartTeachers  = $teacherChart['data'];
        $this->chartClasses   = $classChart['data'];
        $this->chartSchedules = $scheduleChart['data'];
        $this->chartDates     = $studentChart['date'];
    }


    public function mount()
    {
        $this->getDataCount();
        $this->getDataChart();
    }

    public function updatedPeriod()
    {
        $this->getDataChart();

        $this->dispatch('updateChart', [
            'students'  => $this->chartStudents,
            'teachers'  => $this->chartTeachers,
            'classes'   => $this->chartClasses,
            'schedules' => $this->chartSchedules,
            'date'      => $this->chartDates,
        ]);
    }

    public function render()
    {
        return view('livewire.home.admin-home');
    }
}
