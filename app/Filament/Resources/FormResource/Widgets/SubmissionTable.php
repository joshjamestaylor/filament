<?php

namespace App\Filament\Resources\FormResource\Widgets;

use App\Models\Submission;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;

class SubmissionTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full'; // Make the widget full width

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(Submission::query()) // Fetch data from the submissions table
            ->columns([
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('first_name')->label('First name'),
                Tables\Columns\TextColumn::make('last_name')->label('Last name'),
            ]);
    }
}
