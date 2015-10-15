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
    protected $dates = ['deleted_at'];
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
}
