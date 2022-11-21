<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'course_id',
        'name'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
    ];



    public function courses()
    {
        return $this->belongsTo(Course::class);
    }


    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
