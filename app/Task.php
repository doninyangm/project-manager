<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function Company(){
        return $this->belongsTo('App\Company');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
