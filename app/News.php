<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $tabel = 'news';
    protected $guarded = array('id');
}
