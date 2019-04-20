<?php

namespace StartPage;

use Illuminate\Database\Eloquent\Model;
use StartPage\Page;

class Module extends Model
{
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
