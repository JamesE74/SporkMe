<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spork extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sporkTypes()
    {
        return $this->hasOne('App\SporkType');
    }
}
