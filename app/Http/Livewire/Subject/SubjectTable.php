<?php

namespace App\Http\Livewire\Subject;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Subject;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class SubjectTable extends DataTableComponent
{
    protected $model = Subject::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Weight", "weight")
                ->sortable(),
            ButtonGroupColumn::make('Actions')
                ->unclickable()
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Action')
                        ->title(fn($row) => 'Edit')
                        ->location(fn($row) => route('subjects.edit', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full',
                            ];
                        }),
                    LinkColumn::make('Delete')
                        ->title(fn($row) => 'Delete')
                        ->location(fn($row) => route('students.delete', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-4 rounded-full',
                            ];
                        }),
                ]),
        ];
    }
}
