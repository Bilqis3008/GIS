<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['key', 'title', 'body'];

    public function getRouteKeyName(): string
    {
        return 'key';
    }
}
