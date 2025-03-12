<?php

namespace App\Filament\Resources\FormResource\Widgets;

use App\Models\Submission;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;

class SubmissionTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full'; 
    public $formId; 

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(Submission::query()->where('form_id', 1)) // Fetch submissions only for the current form
            ->columns([
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('first_name')->label('First name'),
                Tables\Columns\TextColumn::make('last_name')->label('Last name'),
                Tables\Columns\TextColumn::make('answers')
                    ->label('Answers')
                    ->url(fn (Submission $record) => route('filament.resources.submissions.view', ['submission' => $record->id]))
                    ->formatStateUsing(function ($state) {
                        return 'View submission';
                    }),
            ]);
    }
}
