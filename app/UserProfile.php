<?php

namespace Traydes;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profile';
    protected $fillable = ['first_name', 'last_name', 'address', 'contact_no'];

    /**
     * get the user owns the phone
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Traydes\User');
    }
}
