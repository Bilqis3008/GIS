<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageSiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?string $title = 'Pengaturan Situs';

    protected static ?string $navigationLabel = 'Pengaturan Situs';

    protected static string $view = 'filament.pages.manage-site-settings';

    /** @var array<string, mixed> */
    public ?array $data = [];

    /** Daftar field yang dikelola (key => label). */
    public const FIELDS = [
        'hero_title' => 'Judul Hero',
        'hero_subtitle' => 'Subjudul Hero',
        'brand_bridge' => 'Kalimat Brand Bridge',
        'problem_statement' => 'Pernyataan Masalah',
        'address' => 'Alamat',
        'email' => 'Email',
        'phone' => 'Telepon',
        'whatsapp' => 'Nomor WhatsApp (format 62...)',
        'social_instagram' => 'Instagram (URL)',
        'social_facebook' => 'Facebook (URL)',
        'social_youtube' => 'YouTube (URL)',
        'footer_text' => 'Teks Footer',
        'legal_akta' => 'Legal: Akta Pendirian',
        'legal_kemenkumham' => 'Legal: Pengesahan KEMENKUMHAM',
    ];

    public function mount(): void
    {
        $values = SiteSetting::values();
        $this->form->fill(
            collect(self::FIELDS)->keys()->mapWithKeys(fn ($key) => [$key => $values->get($key)])->all()
        );
    }

    public function form(Form $form): Form
    {
        $longFields = ['hero_subtitle', 'brand_bridge', 'problem_statement', 'footer_text', 'address'];

        $fields = collect(self::FIELDS)->map(function ($label, $key) use ($longFields) {
            return in_array($key, $longFields, true)
                ? Textarea::make($key)->label($label)->rows(2)
                : TextInput::make($key)->label($label);
        })->values()->all();

        return $form
            ->schema([
                Section::make('Konten & Kontak')->schema($fields)->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        foreach ($this->form->getState() as $key => $value) {
            SiteSetting::set($key, $value === '' ? null : $value);
        }

        Notification::make()->title('Pengaturan disimpan.')->success()->send();
    }
}
