<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {
    protected $table = 'media';
    protected $fillable = [
        'name',
        'extention',
        'path',
        'size'
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}