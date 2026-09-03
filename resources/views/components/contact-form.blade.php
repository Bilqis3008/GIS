@props(['defaultSubject' => 'umum'])

@if (session('contact_success'))
    <div class="mb-6 rounded-md border border-success bg-surface-soft p-4 text-body-md text-ink" role="status">
        {{ session('contact_success') }}
    </div>
@endif

<form method="POST" action="{{ route('kontak.store') }}" class="space-y-4">
    @csrf

    {{-- Honeypot — visually hidden, bukan untuk manusia --}}
    <div class="absolute -left-[9999px]" aria-hidden="true">
        <label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
    </div>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <label for="cf-name" class="mb-1 block text-caption text-ink">Nama <span class="text-forest">*</span></label>
            <input id="cf-name" name="name" type="text" value="{{ old('name') }}" required
                   class="h-12 w-full rounded-sm border border-hairline px-4 text-body-md focus:border-2 focus:border-accent-sky focus:outline-none">
            @error('name') <p class="mt-1 text-caption text-forest">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="cf-email" class="mb-1 block text-caption text-ink">Email <span class="text-forest">*</span></label>
            <input id="cf-email" name="email" type="email" value="{{ old('email') }}" required
                   class="h-12 w-full rounded-sm border border-hairline px-4 text-body-md focus:border-2 focus:border-accent-sky focus:outline-none">
            @error('email') <p class="mt-1 text-caption text-forest">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="cf-phone" class="mb-1 block text-caption text-ink">Nomor Telepon</label>
            <input id="cf-phone" name="phone" type="text" value="{{ old('phone') }}"
                   class="h-12 w-full rounded-sm border border-hairline px-4 text-body-md focus:border-2 focus:border-accent-sky focus:outline-none">
            @error('phone') <p class="mt-1 text-caption text-forest">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="cf-org" class="mb-1 block text-caption text-ink">Organisasi / Instansi</label>
            <input id="cf-org" name="organization" type="text" value="{{ old('organization') }}"
                   class="h-12 w-full rounded-sm border border-hairline px-4 text-body-md focus:border-2 focus:border-accent-sky focus:outline-none">
            @error('organization') <p class="mt-1 text-caption text-forest">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label for="cf-subject" class="mb-1 block text-caption text-ink">Subjek <span class="text-forest">*</span></label>
        <select id="cf-subject" name="subject" required
                class="h-12 w-full rounded-sm border border-hairline px-4 text-body-md focus:border-2 focus:border-accent-sky focus:outline-none">
            @foreach (\App\Enums\ContactSubject::options() as $value => $label)
                <option value="{{ $value }}" @selected(old('subject', $defaultSubject) === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('subject') <p class="mt-1 text-caption text-forest">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="cf-message" class="mb-1 block text-caption text-ink">Pesan <span class="text-forest">*</span></label>
        <textarea id="cf-message" name="message" rows="5" required
                  class="w-full rounded-sm border border-hairline px-4 py-3 text-body-md focus:border-2 focus:border-accent-sky focus:outline-none">{{ old('message') }}</textarea>
        @error('message') <p class="mt-1 text-caption text-forest">{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="btn-primary">Kirim Pesan</button>
</form>
