<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = [
        'name', 'slug', 'parent_id', 'description', 'content', 'image', 'active', 'default', 'type', 'sort', 'depth'
    ];

    /* Slugable */
    public $typeColumn = 'type';
    public $nameColumn = 'name';
    public $slugColumn = "slug";

    public function getSlugableColumn($var)
    {
        return $this->$var;
    }

    public function scopeGetBySlug($query, $slug = '')
    {
        return $query->whereSlug($slug);
    }

    public function scopeType($query, $type = 'post')
    {
        return $query->whereType($type);
    }

    // Self Methods
    public function getSons($id)
    {
        return self::whereParentId($id)->get();
    }
    public function getAll()
    {
        return self::orderBy("sort", "asc")->get();
    }

    public static function getNextSortRoot($type = 'post')
    {
        return self::type($type)->max('sort') + 1;
    }

    public static function getNextDepthRoot($type = 'post')
    {
        return self::type($type)->max('depth') + 1;
    }

    public function parent()
    {
        return self::belongsTo($this, 'parent_id')->orderBy('sort', 'ASC');
    }

    public function children()
    {
        return self::hasMany($this, 'parent_id')->orderBy('sort', 'ASC');
    }

    /*
    Many-to-many polymorphic Relationship
     */

    // Post
    public function hostings()
    {
        return $this->hasMany(Hosting::class, 'categoryable');
    }

    // User
    public function users()
    {
        return $this->morphedByMany(User::class, 'categoryable');
    }
}