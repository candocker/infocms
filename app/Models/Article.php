<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Article extends AbstractModel
{
    protected $table = 'article';
    protected $fillable = ['name'];

}
