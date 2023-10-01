<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    /**
     * Boot the sluggable trait for a model.
     *
     * @return void
     */
    public static function bootSluggable()
    {
        static::creating(function ($model) {
            $slug = $model->generateUniqueSlug(
                $name = $model->getSluggableString(),
                $counter = 0,
                $slugField = $model->getSlugColumnName(),
                $typeField = $model->getTypeColumnName(),
                $type = $model->getTypeColumnName() ? $model->getAttributes()['type'] : null
            );
            $model->setSlug($slug);
        });
        static::updating(function ($model) {
            $name = $model->attributes[$model->getSlugColumnName()] ?: $model->getSluggableString();
            $slug = $model->generateUniqueSlugOnUpdate(
                $name,
                $counter = 0,
                $slugField = $model->getSlugColumnName(),
                $id = $model->id
            );
            $model->setSlug($slug);
        });
    }

    /**
     * The name of the column to use for slugs.
     *
     * @return string
     */
    public function getSlugColumnName()
    {
        return $this->getSlugableColumn('slugColumn');
    }

    public function getTypeColumnName()
    {
        return $this->getSlugableColumn('typeColumn');
    }

    public function getNameColumnName()
    {
        return $this->getSlugableColumn('nameColumn');
    }
    /**
     * Get the current slug value.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->getAttribute($this->getSlugColumnName());
    }

    /**
     * Set the slug to the given value.
     *
     * @param  string  $value
     * @return $this
     */
    public function setSlug($value)
    {
        $slugColumn = $this->getSlugColumnName();
        return $this->$slugColumn = $value;
    }

    /**
     * Get the string to create a slug from.
     *
     * @return string
     */
    public function getSluggableString()
    {
        return $this->getAttribute($this->getNameColumnName('nameColumn'));
    }

    /**
     * Generate the unique slug
     *
     * @return string
     */
    public function generateUniqueSlug($name, $counter = 0, $slugField = "slug", $typeField = 'type', $type = null)
    {
        $updatedName = $counter == 0 ? $name : $name . "-" . $counter;
        $slug = Str::slug($updatedName);
        $hasTranslatableColumn = method_exists($this, 'getTranslatable');
        if ($hasTranslatableColumn) {
            $slugField = "slug->" . app()->getLocale();
        };
        if ($type) {
            if (static::where($typeField, $type)->where($slugField, $slug)->exists()) {
                return $this->generateUniqueSlug($name, $counter + 1, $slugField, $typeField, $type);
            }
        } else {
            if (static::where($slugField, $slug)->withoutGlobalScopes()->exists()) {
                return $this->generateUniqueSlug($name, $counter + 1, $slugField);
            }
        }
        return $slug;
    }
    public function generateUniqueSlugOnUpdate($name, $counter = 0, $slugField = "slug", $typeField = 'type', $type = null, $id = 0)
    {
        $updatedName = $counter == 0 ? $name : $name . "-" . $counter;
        $slug = Str::slug($updatedName);
        $hasTranslatableColumn = method_exists($this, 'getTranslatable');
        if ($hasTranslatableColumn) {
            $slugField = "slug->" . app()->getLocale();
        };
        if ($type) {
            if (static::where('id', '<>', $id)->where($typeField, $type)->where($slugField, $slug)->exists()) {
                return $this->generateUniqueSlugOnUpdate($name, $counter + 1, $slugField, $typeField, $type, $id);
            }
        } else {
            if (static::where('id', '<>', $id)->where($slugField, $slug)->withoutGlobalScopes()->exists()) {
                return $this->generateUniqueSlugOnUpdate($name, $counter + 1, $slugField, $id);
            }
        }
        return $slug;
    }
}