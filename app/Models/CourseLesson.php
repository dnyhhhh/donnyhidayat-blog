<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    protected $fillable = ['course_id', 'title', 'order', 'video_url', 'content', 'is_preview'];

    protected $casts = ['is_preview' => 'boolean'];

    public function course() { return $this->belongsTo(Course::class); }
}
