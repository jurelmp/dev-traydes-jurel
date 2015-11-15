<?php

namespace Traydes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $table = 'states';

    /**
     * create a slug wheneever a name of this object is created
     * @param $value
     */
    public function setStateAttribute($value)
    {
        $this->attributes['state'] = $value;

        if(!$this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @return colleges
     */
    public function colleges()
    {
        return $this->hasMany('Traydes\College');
    }
}