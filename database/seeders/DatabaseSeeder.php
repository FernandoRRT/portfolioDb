<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed the person table
        DB::table('person')->insert([
            'id' => Str::uuid(),
            'name' => 'Fernando Torres',
            'about_br' => 'Formado em análise e desenvolvimento de sistemas e atualmente cursando desenvolvimento de sistemas para dispositivos móveis no IFSP. Meu foco de atuação é como desenvolvedor front-end e webdesign. Sempre priorizando sites com elegância, desempenho e acessibilidade.',
            'about_en' => 'Graduated in Systems Analysis and Development and currently studying Systems Development for Mobile Devices at IFSP. My focus is as a front-end developer and web designer. Always prioritizing websites with elegance, performance and accessibility.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Seed the contact table
        DB::table('contact')->insert([
            'id' => Str::uuid(),
            'person_id' => DB::table('person')->where('name', 'Fernando Torres')->value('id'),
            'location' => 'Balneário Pinhal, RS, Brasil',
            'mobile' => '+5551993261772',
            'email' => 'contato@fernandotorres.dev.br',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Seed the language table
        $languages = [
            ['id' => Str::uuid(), 'name' => 'Typescript'],
            ['id' => Str::uuid(), 'name' => 'PHP'],
            ['id' => Str::uuid(), 'name' => 'CSS'],
            ['id' => Str::uuid(), 'name' => 'Dart'],
            ['id' => Str::uuid(), 'name' => 'Kotlin']
        ];
        DB::table('language')->insert($languages);

        // Seed the framework table
        $frameworks = [
            ['id' => Str::uuid(), 'name' => 'React', 'language_id' => DB::table('language')->where('name', 'Typescript')->value('id'), 'type' => 'Front-end'],
            ['id' => Str::uuid(), 'name' => 'Next.js', 'language_id' => DB::table('language')->where('name', 'Typescript')->value('id'), 'type' => 'Back-end'],
            ['id' => Str::uuid(), 'name' => 'Laravel', 'language_id' => DB::table('language')->where('name', 'PHP')->value('id'), 'type' => 'Back-end'],
            ['id' => Str::uuid(), 'name' => 'SASS', 'language_id' => DB::table('language')->where('name', 'CSS')->value('id'), 'type' => 'Front-end'],
            ['id' => Str::uuid(), 'name' => 'Android Studio', 'language_id' => DB::table('language')->where('name', 'Kotlin')->value('id'), 'type' => 'Mobile'],
            ['id' => Str::uuid(), 'name' => 'React Native', 'language_id' => DB::table('language')->where('name', 'Typescript')->value('id'), 'type' => 'Mobile'],
            ['id' => Str::uuid(), 'name' => 'Flutter', 'language_id' => DB::table('language')->where('name', 'Dart')->value('id'), 'type' => 'Mobile'],
            ['id' => Str::uuid(), 'name' => 'SCSS', 'language_id' => DB::table('language')->where('name', 'CSS')->value('id'), 'type' => 'Front End']
        ];
        DB::table('framework')->insert($frameworks);

        // Seed the person_language table
        $personId = DB::table('person')->where('name', 'Fernando Torres')->value('id');
        $personLanguages = [
            ['person_id' => $personId, 'language_id' => DB::table('language')->where('name', 'Typescript')->value('id')],
            ['person_id' => $personId, 'language_id' => DB::table('language')->where('name', 'CSS')->value('id')],
            ['person_id' => $personId, 'language_id' => DB::table('language')->where('name', 'Dart')->value('id')],
            ['person_id' => $personId, 'language_id' => DB::table('language')->where('name', 'Kotlin')->value('id')],
            ['person_id' => $personId, 'language_id' => DB::table('language')->where('name', 'PHP')->value('id')]
        ];
        DB::table('person_language')->insert($personLanguages);

        // Seed the person_framework table
        $personFrameworks = [
            ['person_id' => $personId, 'framework_id' => DB::table('framework')->where('name', 'React')->value('id'), 'created_at' => now(), 'updated_at' => now()],
            ['person_id' => $personId, 'framework_id' => DB::table('framework')->where('name', 'Next.js')->value('id'), 'created_at' => now(), 'updated_at' => now()],
            ['person_id' => $personId, 'framework_id' => DB::table('framework')->where('name', 'Android Studio')->value('id'), 'created_at' => now(), 'updated_at' => now()],
            ['person_id' => $personId, 'framework_id' => DB::table('framework')->where('name', 'Laravel')->value('id'), 'created_at' => now(), 'updated_at' => now()],
            ['person_id' => $personId, 'framework_id' => DB::table('framework')->where('name', 'SCSS')->value('id'), 'created_at' => now(), 'updated_at' => now()],
            ['person_id' => $personId, 'framework_id' => DB::table('framework')->where('name', 'Flutter')->value('id'), 'created_at' => now(), 'updated_at' => now()],
            ['person_id' => $personId, 'framework_id' => DB::table('framework')->where('name', 'React Native')->value('id'), 'created_at' => now(), 'updated_at' => now()]
        ];
        DB::table('person_framework')->insert($personFrameworks);

        // Seed the education table
        $educations = [
            [
                'id' => Str::uuid(),
                'person_id' => $personId,
                'started' => '2024',
                'finished' => '2026',
                'course_pt' => 'Especialização em desenvolvimento de sistemas para dispositivos móveis',
                'course_en' => 'Specialization in Systems Development for Mobile Devices',
                'degree_pt' => 'Especialização Lato Sensu',
                'degree_en' => 'Lato Sensu Postgraduate',
                'abbreviation' => 'IFSP',
                'institution' => 'Instituto Federal de Educação, Ciência e Tecnologia São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'person_id' => $personId,
                'started' => '2019',
                'finished' => '2021',
                'course_pt' => 'Análise e desenvolvimento de sistemas',
                'course_en' => 'Computer Systems Analysis',
                'degree_pt' => 'Tecnólogo',
                'degree_en' => 'Higher Technology Course (CST)',
                'abbreviation' => 'UNINTER',
                'institution' => 'Centro Universitário Internacional',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'person_id' => $personId,
                'started' => '2015',
                'finished' => '2017',
                'course_pt' => 'Gestão de Turismo',
                'course_en' => 'Associate\'s degree - Tourism Management',
                'degree_pt' => 'Tecnólogo',
                'degree_en' => 'Higher Technology Course (CST)',
                'abbreviation' => 'UNINTER',
                'institution' => 'Centro Universitário Internacional',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'person_id' => $personId,
                'started' => '2009',
                'finished' => '2012',
                'course_pt' => 'Educação: Espaços e Possibilidades para Educação Continuada',
                'course_en' => 'Continued Education',
                'degree_pt' => 'Lato Sensu Postgraduate',
                'degree_en' => 'Lato Sensu Postgraduate',
                'abbreviation' => 'IFSUL',
                'institution' => 'Instituto Federal de Educação, Ciência e Tecnologia Sul-rio-grandense',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'person_id' => $personId,
                'started' => '2003',
                'finished' => '2008',
                'course_pt' => 'História',
                'course_en' => 'History',
                'degree_pt' => 'Licenciatura',
                'degree_en' => 'Bachelor’s Degree',
                'abbreviation' => 'FAPA',
                'institution' => 'Faculdades Porto-Alegrense',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('education')->insert($educations);
    }
}