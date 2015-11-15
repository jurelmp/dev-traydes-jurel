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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @return subcategories of a category
     */
//    public function subCategories()
//    {
//        return $this->hasMany('Traydes\Category', 'parent_id', 'id');
//    }

    /**
     * The children categories of a Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany('Traydes\Category', 'parent_id', 'id');
    }

    /**
     * The parent Category of a child category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parentCategory()
    {
        return $this->belongsTo('Traydes\Category', 'parent_id', 'id');
    }

    /**
     * check if the category is root or not
     * @return bool
     */
    public function isRoot()
    {
        if ($this->parent_id == 0) {
            return true;
        }
        return false;
    }

    public function totalPosts()
    {
        $subs = $this->subCategories()->get();
        $total = 0;

        foreach ($subs as $sub) {
            $total += $sub->posts->count();
        }
        return $total;
    }

}
