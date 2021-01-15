<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @property-write mixed $title
 * @mixin \Eloquent
 * @property int $id
 * @property string $slug
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $author_id
 * @property-read \App\User $author
 */
class Post extends Model
{
    const PER_PAGE = 4;
    protected $fillable = ['title', 'slug', 'content','author_id'];
    protected $with = ['comments', 'author'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
        $this->attributes['author_id'] = 1;
    }
}
