<?php

namespace Traydes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */

    protected $dates = ['deleted_at', 'published_at'];
    protected $table = 'posts';

    /**
     * @param $value set slug base on title
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if(!$this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo category
     */
    public function category()
    {
        return $this->belongsTo('Traydes\Category');
    }

    /**
     * get the user resource
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Traydes\User');
    }

    /**
     * get all the images associated
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('Traydes\PostImage');
    }
}
