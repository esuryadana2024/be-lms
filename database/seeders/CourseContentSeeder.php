<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CourseContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel terlebih dahulu
        DB::table('course_content')->truncate();
        
        // Ambil data dari tabel terkait
        $courses = DB::table('course')->where('archived', false)->get();
        $categories = DB::table('course_category')->where('archived', false)->get();
        $instructors = DB::table('instructor')->where('archived', false)->get();
        
        if ($courses->isEmpty() || $categories->isEmpty() || $instructors->isEmpty()) {
            $this->command->error('Please run CourseSeeder, CourseCategorySeeder, and InstructorSeeder first!');
            return;
        }
        
        $courseContents = [];
        $contentId = 1;
        
        // Tipe konten yang tersedia
        $contentTypes = [
            'video' => ['Lecture Video', 'Tutorial Video', 'Live Session Recording', 'Demonstration Video'],
            'document' => ['PDF Notes', 'Slides Presentation', 'E-book', 'Cheat Sheet', 'Reference Material'],
            'quiz' => ['Chapter Quiz', 'Mid-term Test', 'Final Exam', 'Practice Questions'],
            'assignment' => ['Coding Exercise', 'Project Assignment', 'Case Study', 'Research Paper'],
            'code' => ['Source Code', 'Code Snippet', 'Project Template', 'Configuration File'],
            'link' => ['External Resource', 'Article Link', 'Documentation', 'Tool Reference'],
            'audio' => ['Podcast Episode', 'Audio Lecture', 'Interview Recording'],
        ];
        
        // Untuk setiap course, buat beberapa konten
        foreach ($courses as $course) {
            $courseId = $course->course_id;
            $courseCategoryId = $course->course_category_id;
            $instructorId = $course->instructor_id;
            
            // Tentukan berapa banyak konten untuk course ini (5-15 konten)
            $numContents = rand(5, 15);
            
            for ($i = 1; $i <= $numContents; $i++) {
                // Pilih tipe konten acak
                $type = array_rand($contentTypes);
                $typeName = $contentTypes[$type][array_rand($contentTypes[$type])];
                
                // Generate nama konten berdasarkan tipe dan nomor
                $contentName = "{$typeName} - Part {$i}";
                
                // Generate URL berdasarkan tipe
                $url = $this->generateUrl($type, $contentId);
                
                // Durasi berdasarkan tipe (dalam menit)
                $duration = $this->generateDuration($type);
                
                // Generate contain JSON berdasarkan tipe
                $contain = $this->generateContain($type, $contentId);
                
                $courseContents[] = [
                    'course_content_id' => $contentId,
                    'course_content_name' => $contentName,
                    'url' => $url,
                    'duration' => $duration,
                    'type' => $type,
                    'course_category_id' => $courseCategoryId,
                    'instructor_id' => $instructorId,
                    'course_id' => $courseId,
                    'contain' => json_encode($contain),
                    'archived' => false,
                    'created_at' => Carbon::now()->subDays(rand(1, 90)),
                    'updated_at' => Carbon::now(),
                ];
                
                $contentId++;
            }
        }
        
        // Tambahkan beberapa konten archived (tidak aktif)
        $archivedCount = 20;
        for ($i = 0; $i < $archivedCount; $i++) {
            $type = array_rand($contentTypes);
            $typeName = $contentTypes[$type][array_rand($contentTypes[$type])];
            
            $courseContents[] = [
                'course_content_id' => $contentId,
                'course_content_name' => "[Archived] {$typeName} - Old Version",
                'url' => $this->generateUrl($type, $contentId),
                'duration' => $this->generateDuration($type),
                'type' => $type,
                'course_category_id' => $categories->random()->course_category_id,
                'instructor_id' => $instructors->random()->instructor_id,
                'course_id' => null, // Tidak terikat ke course tertentu
                'contain' => json_encode(['status' => 'deprecated', 'reason' => 'Replaced with updated content']),
                'archived' => true,
                'created_at' => Carbon::now()->subYears(1)->subDays(rand(1, 180)),
                'updated_at' => Carbon::now()->subMonths(rand(1, 6)),
            ];
            
            $contentId++;
        }
        
        // Insert data ke database
        foreach ($courseContents as $content) {
            DB::table('course_content')->insert($content);
        }
        
        $totalContents = count($courseContents);
        $activeContents = $totalContents - $archivedCount;
        
        $this->command->info('Course contents seeded successfully!');
        $this->command->info("Total contents: {$totalContents}");
        $this->command->info("Active contents: {$activeContents}");
        $this->command->info("Archived contents: {$archivedCount}");
        
        // Tampilkan statistik per tipe
        $this->command->info(PHP_EOL . 'Content Type Statistics:');
        $typeStats = DB::table('course_content')
            ->select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->orderBy('count', 'desc')
            ->get()
            ->map(function ($item) {
                return [ucfirst($item->type), $item->count];
            })->toArray();
        
        $this->command->table(['Type', 'Count'], $typeStats);
        
        // Tampilkan sample data
        $this->command->info(PHP_EOL . 'Sample Course Contents:');
        $samples = DB::table('course_content as cc')
            ->join('course as c', 'cc.course_id', '=', 'c.course_id')
            ->select('cc.course_content_name', 'cc.type', 'c.course_name', 'cc.duration')
            ->where('cc.archived', false)
            ->limit(5)
            ->get();
        
        foreach ($samples as $sample) {
            $this->command->info("  📚 {$sample->course_content_name} ({$sample->type}, {$sample->duration} min) - {$sample->course_name}");
        }
    }
    
    private function generateUrl(string $type, int $id): string
    {
        $baseUrls = [
            'video' => [
                'https://www.youtube.com/watch?v=' . substr(md5($id), 0, 11),
                'https://vimeo.com/' . (500000 + $id),
                'https://storage.example.com/videos/lecture_' . $id . '.mp4',
                'https://drive.google.com/file/d/' . substr(md5($id), 0, 20) . '/view',
            ],
            'document' => [
                'https://drive.google.com/file/d/' . substr(md5($id), 0, 20) . '/view',
                'https://storage.example.com/docs/notes_' . $id . '.pdf',
                'https://docs.google.com/document/d/' . substr(md5($id), 0, 20) . '/edit',
                'https://github.com/example/course-materials/blob/main/docs/module_' . $id . '.pdf',
            ],
            'quiz' => [
                'https://forms.gle/' . substr(md5($id), 0, 10),
                'https://quiz.example.com/quiz/' . $id,
                '/quiz/' . $id, // Relative URL
            ],
            'assignment' => [
                'https://classroom.google.com/u/0/c/MT' . $id,
                'https://github.com/example/assignments/tree/main/assignment_' . $id,
                '/assignments/' . $id, // Relative URL
            ],
            'code' => [
                'https://github.com/example/code-snippets/blob/main/snippet_' . $id . '.js',
                'https://gist.github.com/example/' . substr(md5($id), 0, 10),
                'https://codepen.io/example/pen/' . substr(md5($id), 0, 10),
            ],
            'link' => [
                'https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide',
                'https://www.w3schools.com/' . ['html', 'css', 'js', 'python'][array_rand([0,1,2,3])],
                'https://stackoverflow.com/questions/tagged/' . ['javascript', 'python', 'java'][array_rand([0,1,2])],
                'https://medium.com/@example/tutorial-' . $id,
            ],
            'audio' => [
                'https://soundcloud.com/example/lecture-' . $id,
                'https://storage.example.com/audio/lecture_' . $id . '.mp3',
                'https://open.spotify.com/episode/' . substr(md5($id), 0, 22),
            ],
        ];
        
        return $baseUrls[$type][array_rand($baseUrls[$type])];
    }
    
    private function generateDuration(string $type): ?int
    {
        $durations = [
            'video' => rand(5, 120), // 5-120 menit
            'audio' => rand(10, 90), // 10-90 menit
            'document' => rand(1, 30), // 1-30 menit estimasi baca
            'quiz' => rand(15, 60), // 15-60 menit
            'assignment' => rand(60, 300), // 1-5 jam
            'code' => rand(5, 45), // 5-45 menit
            'link' => rand(5, 20), // 5-20 menit
        ];
        
        return $durations[$type] ?? null;
    }
    
    private function generateContain(string $type, int $id): array
    {
        $baseContain = [
            'created_by' => 'System Seeder',
            'seeder_id' => $id,
            'quality' => ['SD', 'HD', 'Full HD'][array_rand([0,1,2])],
            'language' => ['English', 'Indonesian', 'Subtitles Available'][array_rand([0,1,2])],
            'downloadable' => (bool) rand(0, 1),
            'interactive' => (bool) rand(0, 1),
        ];
        
        $typeSpecific = [];
        
        switch ($type) {
            case 'video':
                $typeSpecific = [
                    'resolution' => ['480p', '720p', '1080p'][array_rand([0,1,2])],
                    'format' => 'mp4',
                    'subtitles' => (bool) rand(0, 1),
                    'chapters' => rand(3, 10),
                    'playback_speed' => [0.75, 1.0, 1.25, 1.5, 2.0],
                ];
                break;
                
            case 'document':
                $typeSpecific = [
                    'format' => ['PDF', 'PPTX', 'DOCX', 'MD'][array_rand([0,1,2,3])],
                    'pages' => rand(5, 50),
                    'file_size' => rand(100, 5000) . ' KB',
                    'printable' => true,
                ];
                break;
                
            case 'quiz':
                $typeSpecific = [
                    'questions' => rand(5, 30),
                    'passing_score' => rand(60, 80),
                    'attempts_allowed' => rand(1, 3),
                    'time_limit' => rand(15, 120),
                    'randomize_questions' => (bool) rand(0, 1),
                ];
                break;
                
            case 'assignment':
                $typeSpecific = [
                    'deadline_days' => rand(3, 14),
                    'points' => rand(10, 100),
                    'submission_type' => ['file_upload', 'text_entry', 'url', 'both'][array_rand([0,1,2,3])],
                    'group_work' => (bool) rand(0, 1),
                    'peer_review' => (bool) rand(0, 1),
                ];
                break;
                
            case 'code':
                $typeSpecific = [
                    'language' => ['JavaScript', 'Python', 'Java', 'PHP', 'C++'][array_rand([0,1,2,3,4])],
                    'lines_of_code' => rand(10, 500),
                    'dependencies' => ['none', 'npm packages', 'pip packages'][array_rand([0,1,2])],
                    'test_cases' => rand(0, 10),
                ];
                break;
                
            case 'link':
                $typeSpecific = [
                    'external' => true,
                    'verified' => (bool) rand(0, 1),
                    'opens_in_new_tab' => true,
                    'last_checked' => Carbon::now()->subDays(rand(1, 30))->format('Y-m-d'),
                ];
                break;
                
            case 'audio':
                $typeSpecific = [
                    'format' => 'mp3',
                    'bitrate' => ['64kbps', '128kbps', '192kbps', '320kbps'][array_rand([0,1,2,3])],
                    'transcript_available' => (bool) rand(0, 1),
                    'chapters' => rand(3, 8),
                ];
                break;
        }
        
        return array_merge($baseContain, $typeSpecific);
    }
}