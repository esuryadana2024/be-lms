<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel terlebih dahulu
        DB::table('course')->truncate();
        
        // Ambil kategori course dari database
        $categories = DB::table('course_category')->get();
        if ($categories->isEmpty()) {
            $this->command->error('Please run CourseCategorySeeder first!');
            return;
        }
        
        // Data course (15 course aktif + 5 course archived)
        $courses = [
            // Web Development (3 courses)
            [
                'course_name' => 'Full-Stack Web Development Bootcamp',
                'date' => Carbon::now()->addDays(30),
                'short_desc' => 'Belajar menjadi full-stack developer dalam 3 bulan',
                'overview' => 'Kursus intensif yang mengajarkan Anda untuk menjadi full-stack developer profesional. Anda akan belajar HTML, CSS, JavaScript, React, Node.js, Express, dan MongoDB.',
                'certificate' => 'Full-Stack Developer Certificate',
                'course_category_id' => $categories->where('course_category_name', 'Web Development')->first()->course_category_id,
                'instructor_id' => 1,
                'contain' => json_encode([
                    'duration' => '3 bulan',
                    'level' => 'Intermediate',
                    'modules' => 15,
                    'quizzes' => 30,
                    'projects' => 5,
                    'prerequisites' => ['Basic programming knowledge', 'HTML & CSS basics'],
                    'tools' => ['VS Code', 'Node.js', 'MongoDB', 'Git'],
                    'languages' => ['HTML', 'CSS', 'JavaScript', 'React', 'Node.js'],
                ]),
                'slug' => 'full-stack-web-development-bootcamp',
                'thumbnail' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&h=400&fit=crop',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_name' => 'React.js Masterclass',
                'date' => Carbon::now()->addDays(15),
                'short_desc' => 'Master React.js dengan hooks, context, dan Redux',
                'overview' => 'Pelajari React.js secara mendalam dari dasar hingga advanced. Kursus ini mencakup hooks, context API, Redux, React Router, dan testing dengan Jest.',
                'certificate' => 'React.js Expert Certificate',
                'course_category_id' => $categories->where('course_category_name', 'Web Development')->first()->course_category_id,
                'instructor_id' => 2,
                'contain' => json_encode([
                    'duration' => '6 minggu',
                    'level' => 'Intermediate',
                    'modules' => 12,
                    'quizzes' => 20,
                    'projects' => 4,
                    'prerequisites' => ['JavaScript fundamentals', 'Basic HTML/CSS'],
                    'tools' => ['VS Code', 'Create React App', 'Git'],
                    'libraries' => ['React', 'Redux', 'React Router', 'Axios'],
                ]),
                'slug' => 'reactjs-masterclass',
                'thumbnail' => 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?w=800&h=400&fit=crop',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_name' => 'Laravel 10: Build Modern Web Applications',
                'date' => Carbon::now()->addDays(45),
                'short_desc' => 'Bangun aplikasi web modern dengan Laravel 10',
                'overview' => 'Pelajari framework PHP Laravel versi terbaru. Bangun aplikasi web lengkap dengan authentication, API, database relationships, dan deployment.',
                'certificate' => 'Laravel Developer Certificate',
                'course_category_id' => $categories->where('course_category_name', 'Web Development')->first()->course_category_id,
                'instructor_id' => 3,
                'contain' => json_encode([
                    'duration' => '8 minggu',
                    'level' => 'Beginner to Intermediate',
                    'modules' => 10,
                    'quizzes' => 15,
                    'projects' => 3,
                    'prerequisites' => ['PHP basics', 'Basic OOP knowledge'],
                    'tools' => ['Composer', 'MySQL', 'Git', 'Laravel'],
                    'features' => ['Authentication', 'Eloquent ORM', 'API Development', 'Testing'],
                ]),
                'slug' => 'laravel-10-build-modern-web-applications',
                'thumbnail' => 'https://images.unsplash.com/photo-1627398242454-45a1465c2479?w=800&h=400&fit=crop',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            // Mobile Development (3 courses)
            [
                'course_name' => 'Flutter & Dart: Complete Development Guide',
                'date' => Carbon::now()->addDays(20),
                'short_desc' => 'Buat aplikasi mobile cross-platform dengan Flutter',
                'overview' => 'Kursus lengkap untuk mengembangkan aplikasi mobile Android dan iOS dengan Flutter dan Dart. Pelajari state management, API integration, dan publishing ke app stores.',
                'certificate' => 'Flutter Developer Certificate',
                'course_category_id' => $categories->where('course_category_name', 'Mobile Development')->first()->course_category_id,
                'instructor_id' => 4,
                'contain' => json_encode([
                    'duration' => '10 minggu',
                    'level' => 'Beginner',
                    'modules' => 14,
                    'quizzes' => 25,
                    'projects' => 6,
                    'prerequisites' => ['Basic programming knowledge'],
                    'tools' => ['Android Studio', 'VS Code', 'Git'],
                    'topics' => ['Dart Programming', 'Widgets', 'State Management', 'Firebase', 'API Integration'],
                ]),
                'slug' => 'flutter-dart-complete-development-guide',
                'thumbnail' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&h=400&fit=crop',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_name' => 'iOS Development with SwiftUI',
                'date' => Carbon::now()->addDays(60),
                'short_desc' => 'Kembangkan aplikasi iOS modern dengan SwiftUI',
                'overview' => 'Pelajari pengembangan aplikasi iOS menggunakan SwiftUI framework terbaru. Kursus ini mencakup Swift programming, UI design dengan SwiftUI, dan Core Data.',
                'certificate' => 'iOS Developer Certificate',
                'course_category_id' => $categories->where('course_category_name', 'Mobile Development')->first()->course_category_id,
                'instructor_id' => 5,
                'contain' => json_encode([
                    'duration' => '12 minggu',
                    'level' => 'Intermediate',
                    'modules' => 16,
                    'quizzes' => 30,
                    'projects' => 5,
                    'prerequisites' => ['Basic programming concepts'],
                    'tools' => ['Xcode', 'Git', 'Swift'],
                    'frameworks' => ['SwiftUI', 'Combine', 'Core Data', 'CloudKit'],
                ]),
                'slug' => 'ios-development-with-swiftui',
                'thumbnail' => 'https://images.unsplash.com/photo-1519219788971-8d9797e0928e?w=800&h=400&fit=crop',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            // Data Science (3 courses)
            [
                'course_name' => 'Python for Data Science and Machine Learning',
                'date' => Carbon::now()->addDays(25),
                'short_desc' => 'Belajar data science dan ML dengan Python dari nol',
                'overview' => 'Kursus komprehensif yang mengajarkan Python untuk data science, machine learning, dan data visualization. Pelajari NumPy, Pandas, Matplotlib, Scikit-learn, dan TensorFlow.',
                'certificate' => 'Data Science with Python Certificate',
                'course_category_id' => $categories->where('course_category_name', 'Data Science')->first()->course_category_id,
                'instructor_id' => 6,
                'contain' => json_encode([
                    'duration' => '14 minggu',
                    'level' => 'Beginner to Advanced',
                    'modules' => 20,
                    'quizzes' => 35,
                    'projects' => 8,
                    'prerequisites' => ['Basic math knowledge'],
                    'tools' => ['Jupyter Notebook', 'Anaconda', 'Git'],
                    'libraries' => ['NumPy', 'Pandas', 'Matplotlib', 'Scikit-learn', 'TensorFlow'],
                ]),
                'slug' => 'python-for-data-science-and-machine-learning',
                'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=400&fit=crop',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_name' => 'Data Analysis with SQL and Tableau',
                'date' => Carbon::now()->addDays(40),
                'short_desc' => 'Analisis data dengan SQL dan visualisasi dengan Tableau',
                'overview' => 'Pelajari SQL untuk querying database dan Tableau untuk data visualization. Kursus ini fokus pada praktikal skills untuk menjadi data analyst profesional.',
                'certificate' => 'Data Analyst Certificate',
                'course_category_id' => $categories->where('course_category_name', 'Data Science')->first()->course_category_id,
                'instructor_id' => 7,
                'contain' => json_encode([
                    'duration' => '8 minggu',
                    'level' => 'Beginner',
                    'modules' => 12,
                    'quizzes' => 20,
                    'projects' => 4,
                    'prerequisites' => ['Basic computer skills'],
                    'tools' => ['MySQL', 'Tableau Public', 'Excel'],
                    'skills' => ['SQL Queries', 'Data Cleaning', 'Dashboard Creation', 'Storytelling with Data'],
                ]),
                'slug' => 'data-analysis-with-sql-and-tableau',
                'thumbnail' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=400&fit=crop',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            // UI/UX Design (2 courses)
            [
                'course_name' => 'UI/UX Design Fundamentals',
                'date' => Carbon::now()->addDays(10),
                'short_desc' => 'Dasar-dasar desain antarmuka dan pengalaman pengguna',
                'overview' => 'Pelajari prinsip-prinsip dasar UI/UX design, termasuk user research, wireframing, prototyping, dan usability testing. Gunakan tools seperti Figma dan Adobe XD.',
                'certificate' => 'UI/UX Design Certificate',
                'course_category_id' => $categories->where('course_category_name', 'UI/UX Design')->first()->course_category_id,
                'instructor_id' => 8,
                'contain' => json_encode([
                    'duration' => '6 minggu',
                    'level' => 'Beginner',
                    'modules' => 10,
                    'quizzes' => 15,
                    'projects' => 3,
                    'prerequisites' => ['No prior experience needed'],
                    'tools' => ['Figma', 'Adobe XD', 'Miro'],
                    'topics' => ['User Research', 'Wireframing', 'Prototyping', 'Design Systems', 'Usability Testing'],
                ]),
                'slug' => 'ui-ux-design-fundamentals',
                'thumbnail' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&h=400&fit=crop',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            // Digital Marketing (2 courses)
            [
                'course_name' => 'Digital Marketing Strategy 2024',
                'date' => Carbon::now()->addDays(5),
                'short_desc' => 'Strategi pemasaran digital terkini untuk bisnis',
                'overview' => 'Pelajari strategi pemasaran digital efektif termasuk SEO, content marketing, social media marketing, email marketing, dan analytics.',
                'certificate' => 'Digital Marketing Strategist Certificate',
                'course_category_id' => $categories->where('course_category_name', 'Digital Marketing')->first()->course_category_id,
                'instructor_id' => 9,
                'contain' => json_encode([
                    'duration' => '8 minggu',
                    'level' => 'Beginner to Intermediate',
                    'modules' => 12,
                    'quizzes' => 18,
                    'projects' => 4,
                    'prerequisites' => ['Basic computer skills'],
                    'tools' => ['Google Analytics', 'SEMrush', 'Mailchimp', 'Canva'],
                    'channels' => ['SEO', 'Social Media', 'Email', 'Content Marketing', 'PPC'],
                ]),
                'slug' => 'digital-marketing-strategy-2024',
                'thumbnail' => 'https://images.unsplash.com/photo-1432888622747-4eb9a8d1ebd3?w=800&h=400&fit=crop',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            // Cloud Computing (2 courses)
            [
                'course_name' => 'AWS Certified Solutions Architect',
                'date' => Carbon::now()->addDays(90),
                'short_desc' => 'Persiapan sertifikasi AWS Solutions Architect Associate',
                'overview' => 'Persiapkan diri untuk ujian sertifikasi AWS SAA-C03. Pelajari EC2, S3, RDS, VPC, IAM, dan layanan AWS lainnya dengan hands-on labs.',
                'certificate' => 'AWS Solutions Architect Associate (SAA-C03)',
                'course_category_id' => $categories->where('course_category_name', 'Cloud Computing')->first()->course_category_id,
                'instructor_id' => 10,
                'contain' => json_encode([
                    'duration' => '10 minggu',
                    'level' => 'Intermediate',
                    'modules' => 15,
                    'quizzes' => 40,
                    'projects' => 5,
                    'prerequisites' => ['Basic networking knowledge', 'Linux basics'],
                    'services' => ['EC2', 'S3', 'RDS', 'VPC', 'IAM', 'Lambda', 'CloudFront'],
                    'exam_prep' => ['Practice exams', 'Scenario-based questions', 'Hands-on labs'],
                ]),
                'slug' => 'aws-certified-solutions-architect',
                'thumbnail' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800&h=400&fit=crop',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            // Course archived (5 courses)
            [
                'course_name' => 'Flash ActionScript 3.0 Development',
                'date' => Carbon::now()->subYears(3),
                'short_desc' => 'Pengembangan animasi dan game dengan Flash',
                'overview' => 'Kursus pengembangan dengan Adobe Flash dan ActionScript 3.0 untuk membuat animasi dan game interaktif.',
                'certificate' => 'Flash Developer Certificate',
                'course_category_id' => $categories->where('course_category_name', 'Flash Development')->first()->course_category_id ?? null,
                'instructor_id' => 11,
                'contain' => json_encode([
                    'duration' => '8 minggu',
                    'level' => 'Intermediate',
                    'tools' => ['Adobe Flash', 'ActionScript 3.0'],
                ]),
                'slug' => 'flash-actionscript-3-development',
                'thumbnail' => 'https://images.unsplash.com/photo-1542744095-fcf48d80b0fd?w=800&h=400&fit=crop',
                'archived' => true,
                'created_at' => Carbon::now()->subYears(3),
                'updated_at' => Carbon::now()->subYears(2),
            ],
            [
                'course_name' => 'Windows Phone App Development',
                'date' => Carbon::now()->subYears(4),
                'short_desc' => 'Kembangkan aplikasi untuk Windows Phone',
                'overview' => 'Pelajari pengembangan aplikasi untuk platform Windows Phone menggunakan C# dan XAML.',
                'certificate' => 'Windows Phone Developer Certificate',
                'course_category_id' => null,
                'instructor_id' => 12,
                'contain' => json_encode([
                    'duration' => '10 minggu',
                    'level' => 'Intermediate',
                    'tools' => ['Visual Studio', 'C#', 'XAML'],
                ]),
                'slug' => 'windows-phone-app-development',
                'thumbnail' => 'https://images.unsplash.com/photo-1545235617-9465d2a55698?w=800&h=400&fit=crop',
                'archived' => true,
                'created_at' => Carbon::now()->subYears(4),
                'updated_at' => Carbon::now()->subYears(3),
            ],
            [
                'course_name' => 'jQuery for Beginners',
                'date' => Carbon::now()->subYears(2),
                'short_desc' => 'Pelajari jQuery untuk manipulasi DOM dan AJAX',
                'overview' => 'Kursus dasar jQuery untuk manipulasi DOM, event handling, dan AJAX requests.',
                'certificate' => 'jQuery Developer Certificate',
                'course_category_id' => $categories->where('course_category_name', 'Web Development')->first()->course_category_id,
                'instructor_id' => 13,
                'contain' => json_encode([
                    'duration' => '4 minggu',
                    'level' => 'Beginner',
                    'topics' => ['DOM Manipulation', 'Event Handling', 'AJAX', 'Animations'],
                ]),
                'slug' => 'jquery-for-beginners',
                'thumbnail' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=800&h=400&fit=crop',
                'archived' => true,
                'created_at' => Carbon::now()->subYears(2),
                'updated_at' => Carbon::now()->subYears(1),
            ],
        ];
        
        // Insert data ke database
        DB::table('course')->insert($courses);
        
        $totalCourses = count($courses);
        $activeCourses = count(array_filter($courses, function($course) {
            return !$course['archived'];
        }));
        $archivedCourses = $totalCourses - $activeCourses;
        
        $this->command->info('Courses seeded successfully!');
        $this->command->info("Total courses: {$totalCourses}");
        $this->command->info("Active courses: {$activeCourses}");
        $this->command->info("Archived courses: {$archivedCourses}");
        
        // Tampilkan tabel hasil (tanpa error format)
        $results = DB::table('course')
            ->select('course_id', 'course_name', 'course_category_id', 'archived', 'created_at')
            ->get()
            ->map(function ($item) use ($categories) {
                $categoryName = $categories->where('course_category_id', $item->course_category_id)->first()->course_category_name ?? 'N/A';
                
                return [
                    $item->course_id,
                    substr($item->course_name, 0, 30) . (strlen($item->course_name) > 30 ? '...' : ''),
                    $categoryName,
                    $item->archived ? 'Yes' : 'No',
                    date('Y-m-d', strtotime($item->created_at)),
                ];
            })->toArray();
        
        // Tampilkan tabel hasil
        $this->command->table(
            ['ID', 'Course Name', 'Category', 'Archived', 'Created'],
            $results
        );
    }
}