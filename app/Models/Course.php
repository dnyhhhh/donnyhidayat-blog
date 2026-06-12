<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'description', 'cover_image', 'price', 'total_lessons', 'is_published'];

    protected $casts = ['price' => 'decimal:2', 'is_published' => 'boolean'];

    public function category() { return $this->belongsTo(Category::class); }
    public function lessons() { return $this->hasMany(CourseLesson::class)->orderBy('order'); }
    public function orders() { return $this->morphMany(Order::class, 'orderable'); }
}
