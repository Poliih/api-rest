<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anime extends Model
{
    use HasFactory;

    /**
     * A tabela associada com o model.
     *
     * @var string
     */

    protected $table = 'animes';

    /**
     *
     * @var array
     */

     protected $casts = [
        'genero'=> 'array',
     ];
}
