<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\ActivityType;
use App\Filament\Resources\ActivityResource\Pages;
use App\Models\Activity;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Konten';

    protected static ?string $modelLabel = 'Berita / Kegiatan';

    protected static ?string $pluralModelLabel = 'Berita & Kegiatan';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Judul')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug((string) $state)) : null),
            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true),
            Forms\Components\Select::make('type')
                ->label('Tipe')
                ->options(ActivityType::options())
                ->required()
                ->default('berita'),
            Forms\Components\Textarea::make('excerpt')
                ->label('Ringkasan')
                ->rows(2),
            Forms\Components\RichEditor::make('body')
                ->label('Isi')
                ->columnSpanFull(),
            SpatieMediaLibraryFileUpload::make('cover')
                ->collection('cover')
                ->image()
                ->imageEditor()
                ->label('Gambar Sampul'),
            SpatieMediaLibraryFileUpload::make('gallery')
                ->collection('gallery')
                ->image()
                ->multiple()
                ->reorderable()
                ->label('Galeri Dokumentasi'),
            Forms\Components\DateTimePicker::make('published_at')
                ->label('Tanggal Publikasi')
                ->default(now()),
            Forms\Components\Toggle::make('is_published')
                ->label('Dipublikasikan')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('published_at', 'desc')
            ->columns([
                SpatieMediaLibraryImageColumn::make('cover')->collection('cover')->label('Sampul'),
                Tables\Columns\TextColumn::make('title')->label('Judul')->searchable()->sortable()->limit(40),
                Tables\Columns\TextColumn::make('type')->label('Tipe')->badge(),
                Tables\Columns\TextColumn::make('published_at')->label('Terbit')->dateTime('d M Y')->sortable(),
                Tables\Columns\IconColumn::make('is_published')->label('Tayang')->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')->label('Tipe')->options(ActivityType::options()),
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
