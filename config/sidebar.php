<?php

return [
    [
        'title' => 'Beranda',
        'icon' => 'home',
        'route-name' => 'home',
        'is-active' => 'home',
        'description' => 'Untuk melihat ringkasan aplikasi.',
        'roles' => ['admin', 'developer', 'operator', 'guru', 'siswa', 'wali siswa'],
    ],

    // SISWA

    [
        'title' => 'Jadwal Mapel',
        'icon' => 'calendar-alt',
        'route-name' => 'schedule-student.index',
        'is-active' => 'schedule-student.index',
        'description' => 'Untuk melihat jadwal mapel anda.',
        'roles' => ['siswa'],
    ],

    // GURU

    [
        'title' => 'Jadwal Mengajar',
        'icon' => 'clock',
        'route-name' => 'schedule-teacher.index',
        'is-active' => 'schedule-teacher*',
        'description' => 'Untuk melihat jadwal mengajar anda.',
        'roles' => ['guru'],
    ],

    // ADMIN

    [
        'title' => 'Admin',
        'icon' => 'user-shield',
        'description' => 'Melihat daftar admin.',
        'route-name' => 'admin.index',
        'is-active' => 'admin*',
        'roles' => ['admin', 'developer'],
    ],

    [
        'title' => 'Ruang Kelas',
        'icon' => 'school',
        'description' => 'Melihat daftar ruang kelas.',
        'route-name' => 'classroom.index',
        'is-active' => 'classroom*',
        'roles' => ['admin', 'developer'],
    ],

    [
        'title' => 'Jadwal Kelas',
        'icon' => 'calendar',
        'description' => 'Melihat jadwal kelas.',
        'route-name' => 'class-schedule.index',
        'is-active' => 'class-schedule*',
        'roles' => ['admin', 'developer'],
    ],

    [
        'title' => 'Wali Kelas',
        'icon' => 'user-friends',
        'description' => 'Melihat daftar wali kelas tiap kelas.',
        'route-name' => 'advisor-class.index',
        'is-active' => 'advisor-class*',
        'roles' => ['admin', 'developer'],
    ],

    [
        'title' => 'Mata Pelajaran',
        'icon' => 'book',
        'description' => 'Melihat daftar mata pelajaran.',
        'route-name' => 'subject-study.index',
        'is-active' => 'subject-study*',
        'roles' => ['admin', 'developer'],
    ],

    [
        'title' => 'Guru',
        'icon' => 'user-tie',
        'route-name' => 'teacher.index',
        'is-active' => 'teacher*',
        'description' => 'Melihat daftar guru.',
        'roles' => ['admin', 'developer'],
    ],

    [
        'title' => 'Guru Mata Pelajaran',
        'icon' => 'chalkboard-teacher',
        'route-name' => 'subject-teacher.index',
        'is-active' => 'subject-teacher*',
        'description' => 'Melihat mata pelajaran guru.',
        'roles' => ['admin', 'developer'],
    ],

    [
        'title' => 'Siswa',
        'icon' => 'graduation-cap',
        'route-name' => 'student.index',
        'is-active' => 'student*',
        'description' => 'Melihat daftar siswa.',
        'roles' => ['admin', 'developer'],
    ],

    [
        'title' => 'Laporan',
        'description' => 'Menampilkan daftar laporan pada aplikasi.',
        'icon' => 'print',
        'route-name' => 'report.attendance.class.index',
        'is-active' => 'report.attendance*',
        'roles' => ['admin', 'developer'],
        'sub-menus' => [
            [
                'title' => 'Siswa',
                'description' => 'Melihat daftar laporan siswa.',
                'route-name' => 'report.student.index',
                'is-active' => 'report.student*',
            ],
            [
                'title' => 'Guru',
                'description' => 'Melihat daftar laporan guru.',
                'route-name' => 'report.teacher.index',
                'is-active' => 'report.teacher*',
            ],
            [
                'title' => 'Mata Pelajaran',
                'description' => 'Melihat daftar laporan mata pelajaran.',
                'route-name' => 'report.subject-study.index',
                'is-active' => 'report.subject-study*',
            ],
            [
                'title' => 'Jadwal Kelas',
                'description' => 'Melihat daftar jadwal kelas.',
                'route-name' => 'report.class-schedule.index',
                'is-active' => 'report.class-schedule*',
            ],
        ],
    ],

    [
        'title' => 'Pengaturan',
        'description' => 'Menampilkan pengaturan aplikasi.',
        'icon' => 'cog',
        'route-name' => 'setting.profile.index',
        'is-active' => 'setting*',
        'roles' => ['admin', 'developer', 'guru', 'operator', 'siswa', 'wali siswa'],
        'sub-menus' => [
            [
                'title' => 'Profil',
                'description' => 'Melihat pengaturan profil.',
                'route-name' => 'setting.profile.index',
                'is-active' => 'setting.profile*',
            ],
            [
                'title' => 'Akun',
                'description' => 'Melihat pengaturan akun.',
                'route-name' => 'setting.account.index',
                'is-active' => 'setting.account*',
            ],
        ],
    ],
];
