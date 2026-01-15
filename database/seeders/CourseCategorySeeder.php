<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel terlebih dahulu
        DB::table('course_category')->truncate();
        
        // Data kategori kursus
        $categories = [
            [
                'course_category_name' => 'Web Development',
                'img' => 'https://images.unsplash.com/photo-1627398242454-45a1465c2479?w=400&h=300&fit=crop',
                'desc' => 'Belajar pengembangan website dengan teknologi terbaru',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Mobile Development',
                'img' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=400&h=300&fit=crop',
                'desc' => 'Kursus pengembangan aplikasi mobile untuk Android dan iOS',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Data Science',
                'img' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=300&fit=crop',
                'desc' => 'Analisis data, machine learning, dan artificial intelligence',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'UI/UX Design',
                'img' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&h=300&fit=crop',
                'desc' => 'Desain antarmuka dan pengalaman pengguna yang optimal',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Digital Marketing',
                'img' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop',
                'desc' => 'Strategi pemasaran digital dan media sosial',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Cloud Computing',
                'img' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=400&h=300&fit=crop',
                'desc' => 'Teknologi cloud, DevOps, dan server management',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Cybersecurity',
                'img' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&h=300&fit=crop',
                'desc' => 'Keamanan jaringan dan sistem informasi',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Business Intelligence',
                'img' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=300&fit=crop',
                'desc' => 'Analisis bisnis dan pengambilan keputusan data-driven',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Game Development',
                'img' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=400&h=300&fit=crop',
                'desc' => 'Pengembangan game untuk berbagai platform',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Software Engineering',
                'img' => 'https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?w=400&h=300&fit=crop',
                'desc' => 'Prinsip dan praktik rekayasa perangkat lunak',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Database Management',
                'img' => 'https://images.unsplash.com/photo-1543857778-c4a1a569e788?w=400&h=300&fit=crop',
                'desc' => 'Manajemen dan administrasi database',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Programming Fundamentals',
                'img' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=300&fit=crop',
                'desc' => 'Dasar-dasar pemrograman untuk pemula',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Network Engineering',
                'img' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=400&h=300&fit=crop',
                'desc' => 'Jaringan komputer dan sistem komunikasi',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Artificial Intelligence',
                'img' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=400&h=300&fit=crop',
                'desc' => 'Kecerdasan buatan dan machine learning lanjutan',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_category_name' => 'Blockchain',
                'img' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=400&h=300&fit=crop',
                'desc' => 'Teknologi blockchain dan cryptocurrency',
                'archived' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        
        // Tambahkan beberapa kategori yang di-archive
        $archivedCategories = [
            [
                'course_category_name' => 'Flash Development',
                'img' => null,
                'desc' => 'Pengembangan dengan Adobe Flash (legacy)',
                'archived' => true,
                'created_at' => Carbon::now()->subYears(2),
                'updated_at' => Carbon::now()->subYears(1),
            ],
            [
                'course_category_name' => 'Silverlight Programming',
                'img' => null,
                'desc' => 'Microsoft Silverlight development',
                'archived' => true,
                'created_at' => Carbon::now()->subYears(3),
                'updated_at' => Carbon::now()->subYears(2),
            ],
        ];
        
        // Gabungkan semua kategori
        $allCategories = array_merge($categories, $archivedCategories);
        
        // Insert data ke database
        DB::table('course_category')->insert($allCategories);
        
        $this->command->info('Course categories seeded successfully!');
        $this->command->info('Total categories: ' . count($allCategories));
        $this->command->info('Active categories: ' . count($categories));
        $this->command->info('Archived categories: ' . count($archivedCategories));
        
        // **PERBAIKAN DI SINI**: Gunakan array_map dan date() untuk format tanggal
        $results = DB::table('course_category')
            ->select('course_category_id', 'course_category_name', 'archived', 'created_at')
            ->get()
            ->map(function ($item) {
                return [
                    $item->course_category_id,
                    $item->course_category_name,
                    $item->archived ? 'Yes' : 'No',
                    // Gunakan date() untuk format string
                    date('Y-m-d', strtotime($item->created_at)),
                ];
            })->toArray();
        
        // Tampilkan tabel hasil
        $this->command->table(
            ['ID', 'Name', 'Archived', 'Created'],
            $results
        );
    }
}