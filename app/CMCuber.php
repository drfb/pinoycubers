<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMCuber extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'status',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    
    protected $table = 'cubemeet_cubers';

    public function cubemeet() {
        return $this->belongsTo('App\Cubemeet', 'cm_id');
    }

    public function cuberprofile() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
