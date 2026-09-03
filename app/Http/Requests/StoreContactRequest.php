<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\ContactSubject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:40'],
            'organization' => ['nullable', 'string', 'max:160'],
            'subject' => ['required', new Enum(ContactSubject::class)],
            'message' => ['required', 'string', 'max:3000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nama',
            'email' => 'email',
            'phone' => 'nomor telepon',
            'organization' => 'organisasi',
            'subject' => 'subjek',
            'message' => 'pesan',
        ];
    }

    /** Honeypot: bot mengisi field tersembunyi ini. */
    public function isSpam(): bool
    {
        return filled($this->input('website'));
    }
}
