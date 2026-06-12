<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'tech_stack', 'preview_url', 'cover_image', 'file_path', 'price', 'is_published'];

    protected $casts = ['price' => 'integer', 'is_published' => 'boolean'];

    public function orders() { return $this->morphMany(Order::class, 'orderable'); }
}
