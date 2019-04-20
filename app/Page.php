<?php

namespace StartPage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use StartPage\Module;

class Page extends Model
{
    protected $fillable = [
        'user_id', 'slug', 'name', 'theme'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function getUrl()
    {

        return "page/{$this->slug}";
    }
}
