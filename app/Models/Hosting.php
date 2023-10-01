<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;

class Hosting extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = [
        'name', 'slug', 'price', 'suffix', 'description', 'content', 'image', 'active', 'category_id'
    ];

    /* Slugable */
    public $typeColumn = '';
    public $nameColumn = 'name';
    public $slugColumn = "slug";

    public function getSlugableColumn($var)
    {
        return $this->$var ?: null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}