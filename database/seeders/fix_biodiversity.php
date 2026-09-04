<?php

use App\Models\Program;

// Fix biodiversity-warriors - use a working URL via icon column
$program = Program::where('slug', 'biodiversity-warriors')->first();
if ($program) {
    // Alternative working image URL for wildlife/biodiversity
    $program->icon = 'https://images.unsplash.com/photo-1425082661705-1834bfd09dca?q=80&w=1920&auto=format&fit=crop';
    $program->save();

    // Also try to download the media again
    try {
        $program->addMediaFromUrl('https://images.unsplash.com/photo-1425082661705-1834bfd09dca?q=80&w=1920&auto=format&fit=crop')
                ->toMediaCollection('cover');
        echo "Media downloaded successfully for biodiversity-warriors\n";
    } catch (\Exception $e) {
        echo "Media download failed, will use icon URL: " . $e->getMessage() . "\n";
    }
}

echo "Done!\n";
