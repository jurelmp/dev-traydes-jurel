<?php

namespace Traydes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    /**
     * namespace for softdelete traits
     */
    use SoftDeletes;

    /**
     * overriden fields
     * @var string
     */
    protected $table = 'cities';
    protected $dates = ['created_at', 'deleted_at'];

    /**
     * return to parent model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo('Traydes\State');
    }
}
