<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ristorante extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ristoranti';

    protected $fillable = ['id', 'name', 'address', 'city', 'phone'];

    use HasFactory;
}
