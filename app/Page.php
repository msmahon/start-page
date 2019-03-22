<?php

namespace StartPage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Page extends Model
{
    protected $fillable = [
        'user_id', 'slug', 'name', 'theme'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUrl()
    {

        return "page/{$this->slug}";
    }
}
