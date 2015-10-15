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
}
