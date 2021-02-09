<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'basics', 'description', 'experience', 'education', 'competences', 'loisirs', 'langues', 'ref', 'cvphoto'
    ];
}
