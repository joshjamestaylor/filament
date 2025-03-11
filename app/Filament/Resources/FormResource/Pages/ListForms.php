<?php

namespace App\Filament\Resources\FormResource\Pages;

use App\Filament\Resources\FormResource;
use Filament\Resources\Pages\ListRecords;

class ListForms extends ListRecords
{
    protected static string $resource = FormResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            FormResource\Widgets\SubmissionTable::class,
        ];
    }
}
