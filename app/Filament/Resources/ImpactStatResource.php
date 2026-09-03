<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\ImpactStatus;
use App\Filament\Resources\ImpactStatResource\Pages;
use App\Models\ImpactStat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ImpactStatResource extends Resource
{
    protected static ?string $model = ImpactStat::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationGroup = 'Konten';

    protected static ?string $modelLabel = 'Angka Dampak';

    protected static ?string $pluralModelLabel = 'Angka Dampak';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Status pakai radio dengan label tegas supaya editor tidak salah (CLAUDE.md R1/§9).
            Forms\Components\Radio::make('status')
                ->label('Status angka')
                ->options(ImpactStatus::options())
                ->descriptions([
                    'realized' => 'Sudah berjalan / capaian aktual. Boleh tampil di band "Dampak".',
                    'planned' => 'Rencana / proyeksi / kapasitas. Hanya tampil di section "Rencana & Target".',
                ])
                ->required()
                ->default('realized')
                ->inline(false),
            Forms\Components\TextInput::make('label')
                ->label('Label')
                ->placeholder('Sampah dikelola')
                ->required(),
            Forms\Components\TextInput::make('value')
                ->label('Nilai')
                ->placeholder('15 ton')
                ->required(),
            Forms\Components\TextInput::make('period')
                ->label('Periode')
                ->placeholder('per bulan'),
            Forms\Components\TextInput::make('note')
                ->label('Catatan')
                ->columnSpanFull(),
            Forms\Components\TextInput::make('source_label')
                ->label('Label Sumber')
                ->placeholder('Laporan Kegiatan Green Urban Tani'),
            Forms\Components\TextInput::make('source_url')
                ->label('URL Sumber')
                ->url(),
            Forms\Components\TextInput::make('order')
                ->label('Urutan')
                ->numeric()
                ->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->columns([
                Tables\Columns\TextColumn::make('label')->label('Label')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('value')->label('Nilai'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (ImpactStatus $state) => $state->label())
                    ->color(fn (ImpactStatus $state) => $state === ImpactStatus::Realized ? 'success' : 'gray'),
                Tables\Columns\TextColumn::make('period')->label('Periode'),
                Tables\Columns\TextColumn::make('order')->label('Urutan')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->label('Status')->options(ImpactStatus::options()),
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
            'index' => Pages\ListImpactStats::route('/'),
            'create' => Pages\CreateImpactStat::route('/create'),
            'edit' => Pages\EditImpactStat::route('/{record}/edit'),
        ];
    }
}
