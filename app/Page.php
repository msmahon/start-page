<?php

namespace StartPage;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getUrl()
    {

        return "page/{$this->slug}";
    }
}
