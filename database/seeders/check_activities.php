<?php
use App\Models\Activity;
use App\Models\Publication;

echo "=== ACTIVITIES ===\n";
foreach (Activity::all() as $a) {
    echo "ID: {$a->id} | Type: " . (is_object($a->type) ? $a->type->value : $a->type) . " | Title: {$a->title}\n";
}

echo "\n=== PUBLICATIONS ===\n";
foreach (Publication::all() as $p) {
    echo "ID: {$p->id} | Year: {$p->year} | Title: {$p->title}\n";
}
