<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'description', 'cover_image', 'file_path', 'price', 'is_published'];

    protected $casts = ['price' => 'decimal:2', 'is_published' => 'boolean'];

    public function category() { return $this->belongsTo(Category::class); }
    public function orders() { return $this->morphMany(Order::class, 'orderable'); }
}
