<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Disable foreign key checks
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        $this->command->info('Starting database seeding...');
        $this->command->info('================================');
        
        // Run seeders in order (important!)
        $this->call([
            InstructorSeeder::class, // Dijalankan sebelum CourseSeeder
            CourseCategorySeeder::class, // Harus dijalankan pertama
            CourseSeeder::class, // Dijalankan setelah CourseCategorySeeder
            StudentSeeder::class,
            CourseContentSeeder::class, // CourseContent membutuhkan course_id
            // Tambahkan seeder lain di sini
            // UserSeeder::class,
            // EnrollmentSeeder::class,
        ]);
        
        // Enable foreign key checks
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        $this->command->info('================================');
        $this->command->info('Database seeding completed!');

        // Show summary
        $this->showSummary();
    }

    private function showSummary(): void
    {
        $this->command->info(PHP_EOL . '📊 Database Summary:');
        $this->command->info('===================');
        
        $summary = [
            ['Instructors', \DB::table('instructor')->count()],
            ['Course Categories', \DB::table('course_category')->count()],
            ['Courses', \DB::table('course')->count()],
            ['Students', \DB::table('student')->count()],
            ['Course Contents', \DB::table('course_content')->count()],
        ];
        
        $this->command->table(['Table', 'Records'], $summary);
        
        // Show content type breakdown
        $this->command->info(PHP_EOL . '📚 Course Content Types:');
        $types = \DB::table('course_content')
            ->select('type', \DB::raw('count(*) as count'))
            ->groupBy('type')
            ->orderBy('count', 'desc')
            ->get();
        
        foreach ($types as $type) {
            $percentage = ($type->count / \DB::table('course_content')->count()) * 100;
            $this->command->info("  {$type->type}: {$type->count} contents (" . round($percentage, 1) . "%)");
        }
    }
}
