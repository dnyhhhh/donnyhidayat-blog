<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'type'];

    public function ebooks() { return $this->hasMany(Ebook::class); }
    public function courses() { return $this->hasMany(Course::class); }
    public function posts() { return $this->hasMany(Post::class); }
}
