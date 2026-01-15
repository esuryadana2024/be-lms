<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel terlebih dahulu
        DB::table('student')->truncate();
        
        // Data mahasiswa (50 aktif + 10 archived)
        $students = [];
        
        // Nama-nama untuk data dummy
        $firstNames = ['Ahmad', 'Budi', 'Citra', 'Dewi', 'Eka', 'Fajar', 'Gita', 'Hadi', 'Indra', 'Joko', 
                      'Kartika', 'Lina', 'Maya', 'Nina', 'Oki', 'Putri', 'Rudi', 'Sari', 'Tono', 'Umi',
                      'Vina', 'Wahyu', 'Yanti', 'Zainal', 'Agus', 'Bella', 'Candra', 'Dedi', 'Elsa', 'Farhan'];
        
        $lastNames = ['Santoso', 'Wijaya', 'Kusuma', 'Purnama', 'Sari', 'Nugroho', 'Putra', 'Dewi', 'Pratiwi', 'Siregar',
                     'Haryanto', 'Lestari', 'Setiawan', 'Kurniawan', 'Wibowo', 'Saputra', 'Hidayat', 'Rahman', 'Maulana', 'Yulianto'];
        
        // Generate 50 mahasiswa aktif
        for ($i = 1; $i <= 50; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];
            $fullName = $firstName . ' ' . $lastName;
            $email = strtolower($firstName . '.' . $lastName . $i) . '@student.edu';
            $slug = Str::slug($fullName);
            
            // Random photo URL (using different avatar services)
            $photoOptions = [
                'https://i.pravatar.cc/400?u=' . $i . 'student',
                'https://robohash.org/' . $slug . '?set=set4',
                'https://api.dicebear.com/7.x/avataaars/svg?seed=' . $slug,
                'https://ui-avatars.com/api/?name=' . urlencode($fullName) . '&background=random',
            ];
            
            // Deskripsi berdasarkan bidang studi
            $fields = [
                'Computer Science' => 'Mahasiswa jurusan Ilmu Komputer yang tertarik dengan pengembangan web dan machine learning.',
                'Information Technology' => 'Mahasiswa Teknologi Informasi dengan minat di cybersecurity dan network administration.',
                'Software Engineering' => 'Mahasiswa Rekayasa Perangkat Lunak fokus pada agile development dan software testing.',
                'Data Science' => 'Mahasiswa Data Science yang sedang mempelajari Python untuk analisis data dan machine learning.',
                'Business Information Systems' => 'Mahasiswa Sistem Informasi Bisnis dengan ketertarikan pada digital transformation.',
                'Multimedia' => 'Mahasiswa Multimedia yang ahli dalam graphic design dan video editing.',
                'Network Engineering' => 'Mahasiswa Teknik Jaringan yang sedang mempelajari cloud computing dan network security.',
                'Game Development' => 'Mahasiswa pengembang game dengan spesialisasi Unity dan Unreal Engine.',
            ];
            
            $field = array_rand($fields);
            $desc = $fields[$field];
            
            // Overview/capabilities
            $overviews = [
                'Frontend Developer | React Enthusiast',
                'Backend Specialist | Database Management',
                'Full-Stack Developer | Cloud Computing',
                'UI/UX Designer | Figma Expert',
                'Data Analyst | Python & SQL',
                'Mobile Developer | Flutter & React Native',
                'DevOps Engineer | Docker & Kubernetes',
                'Cybersecurity Analyst | Ethical Hacking',
                'Game Developer | Unity & C#',
                'AI/ML Engineer | TensorFlow & PyTorch',
            ];
            
            $overview = $overviews[array_rand($overviews)];
            
            $students[] = [
                'student_id' => $i, // Karena menggunakan id() bukan increments()
                'student_name' => $fullName,
                'email' => $email,
                'desc' => $desc,
                'overview' => $overview,
                'slug' => $slug,
                'photo' => $photoOptions[array_rand($photoOptions)],
                'archived' => false,
                'created_at' => Carbon::now()->subMonths(rand(1, 24)), // Terdaftar 1-24 bulan lalu
                'updated_at' => Carbon::now()->subDays(rand(1, 30)),
            ];
        }
        
        // Generate 10 mahasiswa archived (alumni/tidak aktif)
        for ($i = 51; $i <= 60; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];
            $fullName = $firstName . ' ' . $lastName;
            $email = strtolower($firstName . '.' . $lastName . $i) . '@alumni.edu';
            $slug = Str::slug($fullName);
            
            $students[] = [
                'student_id' => $i,
                'student_name' => $fullName,
                'email' => $email,
                'desc' => 'Alumni yang telah menyelesaikan studi. ' . 
                         ['Bekerja sebagai Software Engineer di perusahaan teknologi.',
                          'Melanjutkan studi S2 di luar negeri.',
                          'Memulai startup di bidang edtech.',
                          'Bekerja sebagai konsultan IT.',
                          'Berprofesi sebagai Data Scientist.'][array_rand([0,1,2,3,4])],
                'overview' => 'Alumni | ' . 
                            ['Software Engineer', 'Data Scientist', 'IT Consultant', 'Product Manager', 'UX Researcher'][array_rand([0,1,2,3,4])],
                'slug' => $slug,
                'photo' => 'https://ui-avatars.com/api/?name=' . urlencode($fullName) . '&background=cccccc&color=333333',
                'archived' => true,
                'created_at' => Carbon::now()->subYears(3)->subMonths(rand(1, 12)), // Terdaftar 3-4 tahun lalu
                'updated_at' => Carbon::now()->subYears(1)->subMonths(rand(1, 12)), // Di-archive 1-2 tahun lalu
            ];
        }
        
        // Insert data ke database (gunakan insert dengan student_id)
        foreach ($students as $student) {
            DB::table('student')->insert($student);
        }
        
        $totalStudents = count($students);
        $activeStudents = count(array_filter($students, function($student) {
            return !$student['archived'];
        }));
        $archivedStudents = $totalStudents - $activeStudents;
        
        $this->command->info('Students seeded successfully!');
        $this->command->info("Total students: {$totalStudents}");
        $this->command->info("Active students: {$activeStudents}");
        $this->command->info("Archived students: {$archivedStudents}");
        
        // Tampilkan tabel hasil
        $results = DB::table('student')
            ->select('student_id', 'student_name', 'email', 'overview', 'archived')
            ->orderBy('student_id')
            ->limit(10)
            ->get()
            ->map(function ($item) {
                return [
                    $item->student_id,
                    substr($item->student_name, 0, 20) . (strlen($item->student_name) > 20 ? '...' : ''),
                    substr($item->email, 0, 20) . (strlen($item->email) > 20 ? '...' : ''),
                    $item->overview,
                    $item->archived ? 'Yes' : 'No',
                ];
            })->toArray();
        
        $this->command->table(
            ['ID', 'Name', 'Email', 'Overview', 'Archived'],
            $results
        );
        
        // Tampilkan statistik overview
        $this->command->info(PHP_EOL . 'Student Overview Statistics:');
        $overviewStats = DB::table('student')
            ->where('archived', false)
            ->select('overview', DB::raw('count(*) as count'))
            ->groupBy('overview')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($item) {
                return [$item->overview, $item->count];
            })->toArray();
        
        $this->command->table(['Overview', 'Count'], $overviewStats);
    }
}