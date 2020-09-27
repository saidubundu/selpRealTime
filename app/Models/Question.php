<?php

namespace App\Models;

use App\Http\Resources\QuestionResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Question extends Model implements Searchable
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'slug', 'category_id', 'user_id'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($question){
            $question->slug = str_slug($question->title);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute()
    {
        return ("/question/$this->slug");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->latest();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function acceptBestAnswer(Reply $reply)
    {
        $this->best_reply_id = $reply->id;
        $this->save();
    }

    public function getSearchResult(): SearchResult
    {
        // TODO: Implement getSearchResult() method.
        $url = route('question.show', $this->slug);

        return new SearchResult(
            $this,
            $this->title,
            $this->path
        );
    }
}
