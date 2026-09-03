@props(['member', 'featured' => false])

@php
    $photo = $member->getFirstMediaUrl('photo', 'thumb');
@endphp

<div style="background-color: white; border-radius: 1.25rem; padding: {{ $featured ? '2rem 1.5rem' : '1.75rem 1.25rem' }}; box-shadow: 0 15px 35px -5px rgba(0,0,0,0.25); border: 1px solid #e5e7eb;" class="flex flex-col items-center text-center transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl h-full">
    @if ($photo)
        <img src="{{ $photo }}" alt="{{ $member->name }}" class="{{ $featured ? 'h-32 w-32' : 'h-24 w-24' }} rounded-full object-cover shadow-md mb-4" style="border: 3px solid #166534;" loading="lazy">
    @else
        <div style="width: {{ $featured ? '100px' : '80px' }}; height: {{ $featured ? '100px' : '80px' }}; background-color: #f0fdf4; border-radius: 9999px; display: flex; align-items: center; justify-content: center; color: #166534; margin-bottom: 1rem; border: 3px solid #166534;">
            <svg style="width: {{ $featured ? '48px' : '40px' }}; height: {{ $featured ? '48px' : '40px' }}; fill: currentColor;" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
        </div>
    @endif
    <h3 style="font-size: {{ $featured ? '1.25rem' : '1.05rem' }}; font-weight: 700; color: #111827; margin-bottom: 0.35rem; line-height: 1.3;">{{ $member->name }}</h3>
    <span style="background-color: #f0fdf4; color: #166534; font-size: 0.75rem; font-weight: 700; padding: 0.25rem 0.75rem; border-radius: 9999px; border: 1px solid #bbf7d0; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.025em;">
        {{ $member->position }}
    </span>
</div>
