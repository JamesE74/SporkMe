<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

//    protected $with=['spork'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'fork_reason', 'spoon_reason'
    ];

    /**
     * @var array
     */
    protected $appends=['forks', 'spoons'];

    /**
     * @return mixed
     */
    public function getSpoonsAttribute()
    {
        return $this->spork()->where('spork_type_id', 1)->count();
    }

    /**
     * @return mixed
     */
    public function getForksAttribute()
    {
        return $this->spork()->where('spork_type_id', 2)->count();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spork(){
        return $this->hasMany('App\Spork');
    }

}
