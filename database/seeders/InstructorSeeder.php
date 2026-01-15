<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel terlebih dahulu
        DB::table('instructor')->truncate();
        
        // Data instruktur (15 aktif + 5 archived)
        $instructors = [
            // Aktif (10 instruktur)
            [
                'instructor_name' => 'Dr. Sarah Chen',
                'instructor_code' => 'INS-001',
                'email' => 'sarah.chen@example.com',
                'desc' => 'Senior Web Developer dengan 10+ tahun pengalaman. Spesialis dalam JavaScript, React, dan Node.js. Pernah bekerja di Google dan Microsoft.',
                'photo' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Web Development', 'JavaScript', 'React', 'Node.js', 'Full-Stack Development']),
                'other' => json_encode([
                    'experience_years' => 12,
                    'companies' => ['Google', 'Microsoft', 'Freelance'],
                    'education' => 'PhD in Computer Science, Stanford University',
                    'students_taught' => 5000,
                    'rating' => 4.9,
                    'courses_published' => 15,
                ]),
                'slug' => 'dr-sarah-chen',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Michael Rodriguez',
                'instructor_code' => 'INS-002',
                'email' => 'michael.rodriguez@example.com',
                'desc' => 'Mobile Development Expert dengan spesialisasi Flutter dan React Native. Telah membangun 50+ aplikasi mobile untuk berbagai klien.',
                'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Mobile Development', 'Flutter', 'React Native', 'iOS Development', 'Android Development']),
                'other' => json_encode([
                    'experience_years' => 8,
                    'companies' => ['Startup Founder', 'Consultant'],
                    'education' => 'MSc in Software Engineering, MIT',
                    'students_taught' => 3500,
                    'rating' => 4.8,
                    'apps_published' => 50,
                ]),
                'slug' => 'michael-rodriguez',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Prof. David Kim',
                'instructor_code' => 'INS-003',
                'email' => 'david.kim@example.com',
                'desc' => 'Data Scientist dan Machine Learning Engineer. Peneliti di bidang AI dengan publikasi di berbagai jurnal internasional.',
                'photo' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Data Science', 'Machine Learning', 'Python', 'Artificial Intelligence', 'Deep Learning']),
                'other' => json_encode([
                    'experience_years' => 15,
                    'companies' => ['AI Research Lab', 'University Professor'],
                    'education' => 'PhD in Artificial Intelligence, Carnegie Mellon',
                    'students_taught' => 2000,
                    'rating' => 4.9,
                    'publications' => 25,
                ]),
                'slug' => 'prof-david-kim',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Lisa Wong',
                'instructor_code' => 'INS-004',
                'email' => 'lisa.wong@example.com',
                'desc' => 'UI/UX Designer dengan background psikologi. Spesialis dalam design thinking dan user experience research.',
                'photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&h=400&fit=crop',
                'expertise' => json_encode(['UI/UX Design', 'Figma', 'Adobe XD', 'User Research', 'Design Thinking']),
                'other' => json_encode([
                    'experience_years' => 7,
                    'companies' => ['Design Agency', 'Product Company'],
                    'education' => 'BA in Psychology & Design, RISD',
                    'students_taught' => 1800,
                    'rating' => 4.7,
                    'design_projects' => 100,
                ]),
                'slug' => 'lisa-wong',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Alex Johnson',
                'instructor_code' => 'INS-005',
                'email' => 'alex.johnson@example.com',
                'desc' => 'Digital Marketing Strategist dengan pengalaman meningkatkan revenue bisnis online hingga 300%.',
                'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Digital Marketing', 'SEO', 'Social Media Marketing', 'Content Strategy', 'Analytics']),
                'other' => json_encode([
                    'experience_years' => 10,
                    'companies' => ['Marketing Agency', 'E-commerce'],
                    'education' => 'MBA in Marketing, Harvard Business School',
                    'students_taught' => 2200,
                    'rating' => 4.8,
                    'campaigns_managed' => 150,
                ]),
                'slug' => 'alex-johnson',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Emma Davis',
                'instructor_code' => 'INS-006',
                'email' => 'emma.davis@example.com',
                'desc' => 'Cloud Architect dengan sertifikasi AWS, Azure, dan GCP. Spesialis dalam cloud migration dan DevOps.',
                'photo' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Cloud Computing', 'AWS', 'DevOps', 'Kubernetes', 'Docker']),
                'other' => json_encode([
                    'experience_years' => 9,
                    'companies' => ['Amazon AWS', 'Cloud Consultant'],
                    'education' => 'MSc in Cloud Computing',
                    'students_taught' => 1600,
                    'rating' => 4.9,
                    'certifications' => ['AWS Solutions Architect', 'Azure Administrator', 'GCP Professional'],
                ]),
                'slug' => 'emma-davis',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Robert Chen',
                'instructor_code' => 'INS-007',
                'email' => 'robert.chen@example.com',
                'desc' => 'Cybersecurity Expert dengan pengalaman di bidang penetration testing dan security auditing.',
                'photo' => 'https://images.unsplash.com/photo-1507591064344-4c6ce005-128?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Cybersecurity', 'Penetration Testing', 'Network Security', 'Ethical Hacking', 'Security Auditing']),
                'other' => json_encode([
                    'experience_years' => 11,
                    'companies' => ['Security Firm', 'Government Agency'],
                    'education' => 'MSc in Cybersecurity',
                    'students_taught' => 1200,
                    'rating' => 4.8,
                    'security_audits' => 75,
                ]),
                'slug' => 'robert-chen',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Sophia Martinez',
                'instructor_code' => 'INS-008',
                'email' => 'sophia.martinez@example.com',
                'desc' => 'Business Intelligence Analyst dengan keahlian dalam SQL, Tableau, dan data storytelling.',
                'photo' => 'https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Business Intelligence', 'SQL', 'Tableau', 'Data Analysis', 'Data Visualization']),
                'other' => json_encode([
                    'experience_years' => 6,
                    'companies' => ['Consulting Firm', 'Financial Institution'],
                    'education' => 'BA in Business Analytics',
                    'students_taught' => 1400,
                    'rating' => 4.7,
                    'dashboards_created' => 200,
                ]),
                'slug' => 'sophia-martinez',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'James Wilson',
                'instructor_code' => 'INS-009',
                'email' => 'james.wilson@example.com',
                'desc' => 'Game Developer dengan pengalaman di Unity dan Unreal Engine. Telah mengembangkan 20+ game indie.',
                'photo' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Game Development', 'Unity', 'Unreal Engine', 'C#', '3D Modeling']),
                'other' => json_encode([
                    'experience_years' => 8,
                    'companies' => ['Game Studio', 'Indie Developer'],
                    'education' => 'BSc in Game Development',
                    'students_taught' => 900,
                    'rating' => 4.6,
                    'games_published' => 22,
                ]),
                'slug' => 'james-wilson',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Maria Garcia',
                'instructor_code' => 'INS-010',
                'email' => 'maria.garcia@example.com',
                'desc' => 'Software Engineering Lead dengan spesialisasi dalam agile methodologies dan clean code practices.',
                'photo' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Software Engineering', 'Agile Methodologies', 'Clean Code', 'System Design', 'Testing']),
                'other' => json_encode([
                    'experience_years' => 13,
                    'companies' => ['Tech Giant', 'Startup Advisor'],
                    'education' => 'MSc in Software Engineering',
                    'students_taught' => 1900,
                    'rating' => 4.9,
                    'projects_led' => 45,
                ]),
                'slug' => 'maria-garcia',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Thomas Brown',
                'instructor_code' => 'INS-011',
                'email' => 'thomas.brown@example.com',
                'desc' => 'Database Administrator dengan pengalaman mengelola database enterprise untuk perusahaan Fortune 500.',
                'photo' => 'https://images.unsplash.com/photo-1507591064344-4c6ce005-128?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Database Management', 'SQL', 'NoSQL', 'Database Administration', 'Performance Tuning']),
                'other' => json_encode([
                    'experience_years' => 14,
                    'companies' => ['Enterprise Solutions', 'Database Consultant'],
                    'education' => 'BSc in Database Systems',
                    'students_taught' => 1100,
                    'rating' => 4.7,
                    'databases_managed' => 30,
                ]),
                'slug' => 'thomas-brown',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Jennifer Lee',
                'instructor_code' => 'INS-012',
                'email' => 'jennifer.lee@example.com',
                'desc' => 'Programming Instructor dengan passion mengajar pemula. Mengembangkan metode pengajaran yang mudah dipahami.',
                'photo' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Programming Fundamentals', 'Python', 'Java', 'Algorithms', 'Teaching Methodology']),
                'other' => json_encode([
                    'experience_years' => 5,
                    'companies' => ['Education Platform', 'Coding Bootcamp'],
                    'education' => 'BEd in Computer Education',
                    'students_taught' => 3000,
                    'rating' => 4.9,
                    'beginners_taught' => 2500,
                ]),
                'slug' => 'jennifer-lee',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Kevin Taylor',
                'instructor_code' => 'INS-013',
                'email' => 'kevin.taylor@example.com',
                'desc' => 'Network Engineer dengan sertifikasi CCIE. Spesialis dalam jaringan enterprise dan security.',
                'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Network Engineering', 'Cisco', 'Network Security', 'Routing & Switching', 'CCIE']),
                'other' => json_encode([
                    'experience_years' => 12,
                    'companies' => ['Telecom Company', 'Network Consultant'],
                    'education' => 'BSc in Network Engineering',
                    'students_taught' => 800,
                    'rating' => 4.8,
                    'certifications' => ['CCIE', 'CCNP', 'CCNA'],
                ]),
                'slug' => 'kevin-taylor',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Amanda Clark',
                'instructor_code' => 'INS-014',
                'email' => 'amanda.clark@example.com',
                'desc' => 'AI Researcher dengan fokus pada Natural Language Processing dan Computer Vision.',
                'photo' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Artificial Intelligence', 'NLP', 'Computer Vision', 'TensorFlow', 'PyTorch']),
                'other' => json_encode([
                    'experience_years' => 7,
                    'companies' => ['AI Research Lab', 'Tech Company'],
                    'education' => 'PhD in AI, MIT',
                    'students_taught' => 600,
                    'rating' => 4.8,
                    'research_papers' => 18,
                ]),
                'slug' => 'amanda-clark',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instructor_name' => 'Daniel White',
                'instructor_code' => 'INS-015',
                'email' => 'daniel.white@example.com',
                'desc' => 'Blockchain Developer dengan pengalaman membangun decentralized applications dan smart contracts.',
                'photo' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Blockchain', 'Solidity', 'Ethereum', 'Smart Contracts', 'Web3']),
                'other' => json_encode([
                    'experience_years' => 6,
                    'companies' => ['Blockchain Startup', 'Consultant'],
                    'education' => 'MSc in Blockchain Technology',
                    'students_taught' => 700,
                    'rating' => 4.7,
                    'dapps_built' => 15,
                ]),
                'slug' => 'daniel-white',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            // Archived (5 instruktur)
            [
                'instructor_name' => 'Mark Thompson',
                'instructor_code' => 'INS-101',
                'email' => 'mark.thompson@oldmail.com',
                'desc' => 'Flash Developer dengan pengalaman di ActionScript 2.0/3.0. Sudah tidak aktif sejak teknologi Flash dihentikan.',
                'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Flash Development', 'ActionScript', 'Adobe Flash', 'Animation']),
                'other' => json_encode([
                    'experience_years' => 10,
                    'status' => 'Retired from Flash development',
                    'last_active' => '2020-12-31',
                ]),
                'slug' => 'mark-thompson',
                'archived' => true,
                'created_at' => Carbon::now()->subYears(4),
                'updated_at' => Carbon::now()->subYears(2),
            ],
            [
                'instructor_name' => 'Susan Miller',
                'instructor_code' => 'INS-102',
                'email' => 'susan.miller@oldmail.com',
                'desc' => 'Windows Phone Developer dengan spesialisasi C# dan XAML. Sudah tidak aktif sejak platform Windows Phone dihentikan.',
                'photo' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Windows Phone', 'C#', 'XAML', '.NET']),
                'other' => json_encode([
                    'experience_years' => 8,
                    'status' => 'Migrated to other technologies',
                    'last_active' => '2019-06-30',
                ]),
                'slug' => 'susan-miller',
                'archived' => true,
                'created_at' => Carbon::now()->subYears(5),
                'updated_at' => Carbon::now()->subYears(3),
            ],
            [
                'instructor_name' => 'Paul Anderson',
                'instructor_code' => 'INS-103',
                'email' => 'paul.anderson@oldmail.com',
                'desc' => 'jQuery Developer dengan pengalaman luas. Sekarang fokus pada modern JavaScript frameworks.',
                'photo' => 'https://images.unsplash.com/photo-1507591064344-4c6ce005-128?w=400&h=400&fit=crop',
                'expertise' => json_encode(['jQuery', 'JavaScript', 'DOM Manipulation']),
                'other' => json_encode([
                    'experience_years' => 7,
                    'status' => 'Transitioned to React/Vue',
                    'last_active' => '2021-03-15',
                ]),
                'slug' => 'paul-anderson',
                'archived' => true,
                'created_at' => Carbon::now()->subYears(3),
                'updated_at' => Carbon::now()->subYears(1),
            ],
            [
                'instructor_name' => 'Nancy Harris',
                'instructor_code' => 'INS-104',
                'email' => 'nancy.harris@oldmail.com',
                'desc' => 'Perl Developer dengan pengalaman di sistem legacy. Sudah pensiun dari dunia pengembangan web.',
                'photo' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Perl', 'CGI Scripting', 'Legacy Systems']),
                'other' => json_encode([
                    'experience_years' => 15,
                    'status' => 'Retired',
                    'last_active' => '2018-08-20',
                ]),
                'slug' => 'nancy-harris',
                'archived' => true,
                'created_at' => Carbon::now()->subYears(6),
                'updated_at' => Carbon::now()->subYears(4),
            ],
            [
                'instructor_name' => 'Brian Walker',
                'instructor_code' => 'INS-105',
                'email' => 'brian.walker@oldmail.com',
                'desc' => 'Visual Basic 6.0 Developer dengan pengalaman di aplikasi desktop legacy.',
                'photo' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&h=400&fit=crop',
                'expertise' => json_encode(['Visual Basic 6.0', 'Desktop Applications', 'Legacy Systems']),
                'other' => json_encode([
                    'experience_years' => 12,
                    'status' => 'Migrated to .NET',
                    'last_active' => '2017-11-10',
                ]),
                'slug' => 'brian-walker',
                'archived' => true,
                'created_at' => Carbon::now()->subYears(7),
                'updated_at' => Carbon::now()->subYears(5),
            ],
        ];
        
        // Insert data ke database
        DB::table('instructor')->insert($instructors);
        
        $totalInstructors = count($instructors);
        $activeInstructors = count(array_filter($instructors, function($instructor) {
            return !$instructor['archived'];
        }));
        $archivedInstructors = $totalInstructors - $activeInstructors;
        
        $this->command->info('Instructors seeded successfully!');
        $this->command->info("Total instructors: {$totalInstructors}");
        $this->command->info("Active instructors: {$activeInstructors}");
        $this->command->info("Archived instructors: {$archivedInstructors}");
        
        // Tampilkan tabel hasil (tanpa error format)
        $results = DB::table('instructor')
            ->select('instructor_id', 'instructor_name', 'instructor_code', 'archived', 'created_at')
            ->get()
            ->map(function ($item) {
                return [
                    $item->instructor_id,
                    substr($item->instructor_name, 0, 20) . (strlen($item->instructor_name) > 20 ? '...' : ''),
                    $item->instructor_code,
                    $item->archived ? 'Yes' : 'No',
                    date('Y-m-d', strtotime($item->created_at)),
                ];
            })->toArray();
        
        // Tampilkan tabel hasil
        $this->command->table(
            ['ID', 'Name', 'Code', 'Archived', 'Created'],
            $results
        );
        
        // Tampilkan instruktur dengan expertise
        $this->command->info(PHP_EOL . 'Instructor Expertise Summary:');
        $expertiseCount = [];
        foreach ($instructors as $instructor) {
            if (!$instructor['archived']) {
                $expertiseArray = json_decode($instructor['expertise'], true);
                if (is_array($expertiseArray)) {
                    foreach ($expertiseArray as $skill) {
                        $expertiseCount[$skill] = ($expertiseCount[$skill] ?? 0) + 1;
                    }
                }
            }
        }
        
        arsort($expertiseCount);
        $expertiseTable = [];
        foreach ($expertiseCount as $skill => $count) {
            $expertiseTable[] = [$skill, $count];
        }
        
        $this->command->table(['Expertise', 'Count'], array_slice($expertiseTable, 0, 10));
    }
}