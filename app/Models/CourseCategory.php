<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseCategory extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nama tabel lowercase singular
     */
    protected $table = 'course_category';

    /**
     * Kolom yang bisa diisi massal (mass assignable)
     */
    protected $fillable = [
        'course_category_name',
        'img',
        'desc',
        'archived'
    ];

    /**
     * Kolom yang disembunyikan dari array/JSON
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'course_category_id', 'course_category_id');
    }
}
