<?php

namespace App\Filament\Resources\FormResource\Widgets;

use App\Models\Submission;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class SubmissionTable extends BaseWidget
{
    public function table(Table $table): Table
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
