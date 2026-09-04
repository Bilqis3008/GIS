<?php

use App\Models\Program;

// Remove duplicates - keep latest per slug
$slugs = Program::pluck('slug')->toArray();
$unique_slugs = array_unique($slugs);

foreach ($unique_slugs as $slug) {
    $records = Program::where('slug', $slug)->orderBy('id')->get();
    if ($records->count() > 1) {
        // Keep the first, delete the rest
        $records->shift(); // keep first
        foreach ($records as $dup) {
            $dup->delete();
            echo "Deleted duplicate: {$slug} (id={$dup->id})\n";
        }
    }
}

echo "\nCurrent programs:\n";
foreach (Program::orderBy('order')->get() as $p) {
    $mediaUrl = $p->getFirstMediaUrl('cover');
    echo "slug={$p->slug} | icon={$p->icon} | media=" . ($mediaUrl ?: 'NONE') . "\n";
}
echo "\nTotal: " . Program::count() . "\n";
