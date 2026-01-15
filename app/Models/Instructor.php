<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructor extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nama tabel lowercase singular
     */
    protected $table = 'instructor';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'instructor_id';

    /**
     * Kolom yang bisa diisi massal (mass assignable)
     */
    protected $fillable = [
        'instructor_name',
        'instructor_code',
        'email',
        'desc',
        'photo',
        'expertise',
        'other',
        'slug',
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
        'expertise' => 'array',
        'other' => 'array',
        'archived' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope for active instructors
     */
    public function scopeActive($query)
    {
        return $query->where('archived', false);
    }

     /**
     * Relationship with courses
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'instructor_id', 'instructor_id');
    }

    /**
     * Generate slug automatically
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($instructor) {
            if (empty($instructor->slug)) {
                $instructor->slug = \Illuminate\Support\Str::slug($instructor->instructor_name);
            }
            
            if (empty($instructor->instructor_code)) {
                $instructor->instructor_code = 'INS-' . str_pad(Instructor::count() + 1, 3, '0', STR_PAD_LEFT);
            }
        });

        static::updating(function ($instructor) {
            if ($instructor->isDirty('instructor_name') && empty($instructor->slug)) {
                $instructor->slug = \Illuminate\Support\Str::slug($instructor->instructor_name);
            }
        });
    }
}
