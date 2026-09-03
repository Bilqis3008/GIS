<x-layout title="Publikasi" description="Laporan dan kajian Yayasan Green Invite Sembilan dalam format PDF.">
    <section class="mx-auto max-w-[1200px] px-5 py-16">
        <p class="overline">Publikasi</p>
        <h1 class="mt-2 text-display-md text-ink">Laporan & Kajian</h1>
    </section>

    <section class="mx-auto max-w-3xl px-5 pb-24">
        @if ($publications->isEmpty())
            <p class="text-body-md text-muted">Belum ada publikasi yang tersedia.</p>
        @else
            <ul class="divide-y divide-hairline">
                @foreach ($publications as $pub)
                    @php $file = $pub->getFirstMedia('file'); @endphp
                    <li class="flex items-center justify-between gap-4 py-5">
                        <div>
                            <h2 class="text-title-sm text-ink">{{ $pub->title }}</h2>
                            <p class="text-caption text-muted">{{ $pub->year }}@if ($pub->description) · {{ $pub->description }}@endif</p>
                        </div>
                        @if ($file)
                            <a href="{{ $file->getUrl() }}" target="_blank" rel="noopener" class="btn-secondary shrink-0 !min-h-0 !px-4 !py-2">Unduh PDF</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </section>
</x-layout>
