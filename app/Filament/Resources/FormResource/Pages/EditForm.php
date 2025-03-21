<?php

namespace App\Filament\Resources\FormResource\Pages;

use App\Filament\Resources\FormResource;
use Filament\Resources\Pages\EditRecord;

class EditForm extends EditRecord
{
    protected static string $resource = FormResource::class;

    protected function getFooterWidgets(): array
    {
        return [
            FormResource\Widgets\SubmissionTable::make(['formId' => $this->record->id]), 
        ];
    }
}
