<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSubmissionResource\Pages;
use App\Models\ContactSubmission;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactSubmissionResource extends Resource
{
    protected static ?string $model = ContactSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationGroup = 'Pesan Masuk';

    protected static ?string $modelLabel = 'Pesan Masuk';

    protected static ?string $pluralModelLabel = 'Pesan Masuk';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('is_read', false)->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\TextEntry::make('name')->label('Nama'),
            Infolists\Components\TextEntry::make('email')->label('Email')->copyable(),
            Infolists\Components\TextEntry::make('phone')->label('Telepon')->placeholder('—'),
            Infolists\Components\TextEntry::make('organization')->label('Organisasi')->placeholder('—'),
            Infolists\Components\TextEntry::make('subject')
                ->label('Subjek')
                ->formatStateUsing(fn ($state) => $state->label()),
            Infolists\Components\TextEntry::make('created_at')->label('Diterima')->dateTime('d M Y H:i'),
            Infolists\Components\TextEntry::make('message')->label('Pesan')->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\IconColumn::make('is_read')->label('Dibaca')->boolean(),
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Subjek')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state->label()),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('created_at')->label('Diterima')->dateTime('d M Y H:i')->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_read')->label('Status baca'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->after(fn (ContactSubmission $record) => $record->update(['is_read' => true])),
                Tables\Actions\Action::make('toggleRead')
                    ->label(fn (ContactSubmission $record) => $record->is_read ? 'Tandai belum dibaca' : 'Tandai dibaca')
                    ->icon('heroicon-o-check')
                    ->action(fn (ContactSubmission $record) => $record->update(['is_read' => ! $record->is_read])),
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
            'index' => Pages\ListContactSubmissions::route('/'),
            'view' => Pages\ViewContactSubmission::route('/{record}'),
        ];
    }
}
