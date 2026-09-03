<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ContactSubject;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'organization', 'subject', 'message', 'is_read'];

    protected $casts = [
        'subject' => ContactSubject::class,
        'is_read' => 'boolean',
    ];
}
