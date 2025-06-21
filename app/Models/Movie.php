<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

        protected $fillable = [
        'code',
        'title',
        'country',
        'language',
        'year',
        'downloads',
        'description',
        'file_id',
        'message_id',
    ];


    public function genres()
{
    return $this->belongsToMany(Genre::class);
}

}
