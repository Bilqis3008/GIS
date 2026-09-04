<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Konten';

    protected static ?string $modelLabel = 'Program';

    protected static ?string $pluralModelLabel = 'Program';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Utama')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul Program')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug((string) $state)) : null)
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true)
                        ->helperText('Slug dipakai di URL (contoh: kehutanan → /aksi/kehutanan). Otomatis diisi dari judul; jangan ubah kecuali perlu.'),
                    Forms\Components\TextInput::make('summary')
                        ->label('Pilar / Tagline')
                        ->required()
                        ->maxLength(255)
                        ->helperText('Contoh: Konservasi & Restorasi. Tampil sebagai badge di halaman detail.'),
                    Forms\Components\Toggle::make('is_published')
                        ->label('Dipublikasikan')
                        ->default(true),
                    Forms\Components\TextInput::make('order')
                        ->label('Urutan Tampil')
                        ->numeric()
                        ->default(0),
                ]),

            Forms\Components\Section::make('Konten Halaman')
                ->schema([
                    Forms\Components\RichEditor::make('body')
                        ->label('Deskripsi Lengkap')
                        ->helperText('Konten utama yang ditampilkan di halaman detail program aksi.')
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Gambar')
                ->columns(2)
                ->schema([
                    SpatieMediaLibraryFileUpload::make('cover')
                        ->collection('cover')
                        ->image()
                        ->imageEditor()
                        ->label('Upload Gambar Sampul')
                        ->helperText('Upload file gambar dari komputer Anda. Akan dipakai sebagai background halaman.'),
                    Forms\Components\TextInput::make('icon')
                        ->label('URL Gambar Cadangan')
                        ->placeholder('https://images.unsplash.com/...')
                        ->url()
                        ->helperText('Jika tidak ada gambar yang di-upload, URL gambar ini akan dipakai sebagai background.'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->reorderable('order')
            ->columns([
                SpatieMediaLibraryImageColumn::make('cover')->collection('cover')->label('Sampul'),
                Tables\Columns\TextColumn::make('title')->label('Judul')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('order')->label('Urutan')->sortable(),
                Tables\Columns\IconColumn::make('is_published')->label('Tayang')->boolean(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')->label('Status tayang'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
