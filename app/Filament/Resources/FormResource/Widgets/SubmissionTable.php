<?php

namespace App\Filament\Resources\FormResource\Widgets;

use App\Models\Submission;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;

class SubmissionTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full'; 
    public ?int $formId = null; // Make formId nullable

    public function mount(int $formId): void
    {
        $this->formId = $formId;
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(Submission::query()->where('form_id', $this->formId)) // Use dynamic formId
            ->columns([
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('first_name')->label('First name'),
                Tables\Columns\TextColumn::make('last_name')->label('Last name'),
                Tables\Columns\TextColumn::make('answers')
                ->label('Answers')
                ->url(fn (Submission $record) => route('filament.admin.resources.submissions.view', ['record' => $record->id]))
                ->formatStateUsing(fn () => 'View Submission'),
            ]);
    }
}
