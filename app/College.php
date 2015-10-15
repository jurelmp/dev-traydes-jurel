<?php

namespace Traydes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $table = 'colleges';

    /**
     * create a slug wheneever a name of this object is created
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @return the area of the college
     */
    public function area()
    {
        return $this->belongsTo('Traydes\Area');
    }
}