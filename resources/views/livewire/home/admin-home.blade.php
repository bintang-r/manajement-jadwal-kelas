<div>
    <x-alert />

    <div class="row">
        <div class="col-12 col-md-4 col-lg-3">
            <x-card.count-data title="Siswa" :period="$this->period" :total="$this->totalStudent" icon="graduation-cap" color="blue" />
            <x-card.count-data title="Guru" :period="$this->period" :total="$this->totalTeacher" icon="user-tie" color="red" />
            <x-card.count-data title="Admin" :period="$this->period" :total="$this->totalAdmin" icon="database" color="purple" />
            <x-card.count-data title="Jadwal Kelas" :period="$this->period" :total="$this->totalJadwalKelas" icon="calendar"
                color="green" />
            <x-card.count-data title="Mata Pelajaran" :period="$this->period" :total="$this->totalMataPelajaran" icon="book"
                color="orange" />
            <x-card.count-data title="Kelas" :period="$this->period" :total="$this->totalKelas" icon="building" color="teal" />
        </div>

        <div class="col-12 col-md-8 col-lg-9">
            <div class="card h-100 mb-3 w-100 d-flex">
                <div class="card-header text-center d-flex justify-content-between">
                    <h4 class="mb-0 pb-0 align-self-center">
                        Data Presensi
                        @switch($this->period)
                            @case('daily')
                                10 Hari Terkahir
                            @break

                            @case('weekly')
                                10 Minggu Terakhir
                            @break

                            @case('monthly')
                                10 Bulan Terakhir
                            @break

                            @case('yearly')
                                10 Tahun Terakhir
                            @break
                        @endswitch
                    </h4>

                    <x-form.select wire:model.live="period" name="period" form-group-class>
                        <option value=""></option>
                        @foreach (config('const.periods') as $period)
                            <option wire:key="{{ $period }}" value="{{ $period }}">
                                {{ match ($period) {
                                    'daily' => '10 HARI TERAKHIR',
                                    'weekly' => '10 MINGGU TERAKHIR',
                                    'monthly' => '10 BULAN TERAKHIR',
                                    'yearly' => '10 TAHUN TERAKHIR',
                                    default => '',
                                } }}
                            </option>
                        @endforeach
                    </x-form.select>
                </div>

                <div class="card-body py-2">
                    <div wire:ignore>
                        <div id="chart-mentions" students='@json($this->chartStudents)'
                            teachers='@json($this->chartTeachers)' classes='@json($this->chartClasses)'
                            schedules='@json($this->chartSchedules)' date='@json($this->chartDates)'
                            class="chart-lg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let chart;
            const el = document.getElementById('chart-mentions');

            function renderChart(students, teachers, classes, schedules, date) {
                if (chart) chart.destroy();

                chart = new ApexCharts(el, {
                    chart: {
                        type: 'area',
                        height: 550,
                        toolbar: {
                            show: false
                        },
                        animations: {
                            enabled: true,
                            easing: 'easeinout'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    series: [{
                            name: 'Siswa Baru',
                            data: students
                        },
                        {
                            name: 'Guru Baru',
                            data: teachers
                        },
                        {
                            name: 'Kelas Baru',
                            data: classes
                        },
                        {
                            name: 'Jadwal Kelas',
                            data: schedules
                        },
                    ],
                    xaxis: {
                        categories: date,
                        labels: {
                            style: {
                                fontSize: '12px'
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                fontSize: '12px'
                            }
                        }
                    },
                    colors: ['#22c55e', '#3b82f6', '#a855f7', '#f97316'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.4,
                            opacityTo: 0.05,
                            stops: [0, 90, 100]
                        }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'center'
                    },
                    tooltip: {
                        theme: 'dark'
                    }
                });

                chart.render();
            }

            renderChart(
                JSON.parse(el.getAttribute('students')),
                JSON.parse(el.getAttribute('teachers')),
                JSON.parse(el.getAttribute('classes')),
                JSON.parse(el.getAttribute('schedules')),
                JSON.parse(el.getAttribute('date'))
            );

            Livewire.on('updateChart', data => {
                const payload = data[0];

                renderChart(
                    payload.students,
                    payload.teachers,
                    payload.classes,
                    payload.schedules,
                    payload.date
                );
            });

        });
    </script>
@endpush
