<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nama tabel lowercase singular
     */
    protected $table = 'course';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'course_id';

    /**
     * Kolom yang bisa diisi massal (mass assignable)
     */
    protected $fillable = [
        'course_name',
        'date',
        'short_desc',
        'overview',
        'certificate',
        'course_category_id',
        'instructor_id',
        'contain',
        'slug',
        'thumbnail',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'datetime',
        'contain' => 'array',
        'archived' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship with category
     */
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id', 'course_category_id');
    }

    /**
     * Relationship with instructor
     */
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }
}
