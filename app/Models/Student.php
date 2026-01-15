<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nama tabel lowercase singular
     */
    protected $table = 'student';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'student_id';

    /**
     * Kolom yang bisa diisi massal (mass assignable)
     */
    protected $fillable = [
        'student_name',
        'email',
        'desc',
        'overview',
        'slug',
        'photo',
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
        'archived' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope for active students
     */
    public function scopeActive($query)
    {
        return $query->where('archived', false);
    }
    
    /**
     * Scope for searching students
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('student_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('overview', 'like', "%{$search}%")
                    ->orWhere('desc', 'like', "%{$search}%");
    }

    /**
     * Relationship with enrollments (jika ada tabel enrollments)
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id', 'student_id');
    }

    /**
     * Relationship with courses melalui enrollments
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id')
                    ->withTimestamps();
    }

    /**
     * Generate slug automatically
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            if (empty($student->slug)) {
                $student->slug = \Illuminate\Support\Str::slug($student->student_name);
            }
        });

        static::updating(function ($student) {
            if ($student->isDirty('student_name') && empty($student->slug)) {
                $student->slug = \Illuminate\Support\Str::slug($student->student_name);
            }
        });
    }
}
