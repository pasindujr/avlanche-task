<?php

namespace App\Http\Livewire\Student;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class StudentTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return User::query()
            ->where('is_student', 1);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),
            Column::make('Name', 'name')
                ->sortable()->searchable(),
            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),
            ButtonGroupColumn::make('Actions')
                ->unclickable()
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Action')
                        ->title(fn ($row) => 'Edit')
                        ->location(fn ($row) => route('students.edit', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full',
                            ];
                        }),
                    LinkColumn::make('Delete')
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => route('students.delete', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-4 rounded-full',
                            ];
                        }),
                ]),
            ButtonGroupColumn::make('Assign')
                ->unclickable()
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Action')
                        ->title(fn ($row) => 'Subject')
                        ->location(fn ($row) => route('students.assign.subject', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full',
                            ];
                        }),
                    LinkColumn::make('Action')
                        ->title(fn ($row) => 'Mark')
                        ->location(fn ($row) => route('students.assign.mark', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full',
                            ];
                        }),
                ]),
        ];
    }
}
