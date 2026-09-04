<?php
use App\Models\Program;

$p = Program::where('slug', 'kehutanan')->first();
echo "Media URL: " . $p->getFirstMediaUrl('cover') . PHP_EOL;
echo "Icon: " . $p->icon . PHP_EOL;
echo "Fallback: " . ($p->getFirstMediaUrl('cover') ?: $p->icon) . PHP_EOL;
echo "APP_URL: " . config('app.url') . PHP_EOL;
