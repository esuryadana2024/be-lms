<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseContent extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nama tabel lowercase singular
     */
    protected $table = 'course_content';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'course_content_id';

    /**
     * Kolom yang bisa diisi massal (mass assignable)
     */
    protected $fillable = [
        'course_content_name',
        'url',
        'duration',
        'type',
        'course_category_id',
        'instructor_id',
        'course_id',
        'contain',
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

    /**
     * Scope for active contents
     */
    public function scopeActive($query)
    {
        return $query->where('archived', false);
    }

    /**
     * Relationship with course
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    /**
     * Relationship with instructor
     */
    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id', 'instructor_id');
    }

    /**
     * Relationship with category
     */
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id', 'course_category_id');
    }
}
