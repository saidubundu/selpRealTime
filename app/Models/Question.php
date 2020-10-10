<?php

namespace App\Models;

use App\Http\Resources\QuestionResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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

    public function watchers()
    {
        return $this->hasMany(Watcher::class);
    }

    public function is_watched_by()
    {
        $id = Auth::id();
        $watchers_ids = array();

        foreach ($this->watchers as $w):
            array_push($watchers_ids, $w->user_id);
        endforeach;

        if (in_array($id, $watchers_ids)){
            return true;
        }
        else{
            return false;
        }
    }
}
