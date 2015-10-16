<?php

namespace Traydes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $table = 'categories';

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        if(!$this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany posts
     */
    public function posts()
    {
        return $this->hasMany('Traydes\Post');
    }

    /*
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @return sub categories
     *
    public function nestedCategories()
    {
        return $this->hasMany('Traydes\Category', 'parent_id');
    }
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @return subcategories of a category
     */
    public function subCategories()
    {
        return $this->hasMany('Traydes\Category', 'parent_id', 'id');
    }
}
