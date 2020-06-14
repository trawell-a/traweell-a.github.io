<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model {
    protected $table = 'blog';
    protected $fillable = [
        'title',  
        'content', 
        'media_id',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $hidden = [];

    public function withMedia() {
        return $this->addSelect([
            DB::raw('blog.id AS id'),
            DB::raw('blog.title AS title'),
            DB::raw('blog.content AS content'),
            DB::raw('media.path AS path'),
            DB::raw('blog.updated_at AS updated_at'),
            DB::raw('blog.created_at AS created_at'),
        ])->leftJoin('media', 'media.id', '=', 'blog.media_id');
    }
}
