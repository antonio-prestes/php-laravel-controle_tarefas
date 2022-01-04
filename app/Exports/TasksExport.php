<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return auth()->user()->tasks()->get();
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'ID da Tarefa',
            'ID do usuário',
            'Tarefa',
            'Data limite',
            'Data criação',
            'Data atualização'
        ];
    }
}
