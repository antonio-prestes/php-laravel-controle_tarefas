<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TasksExport implements FromCollection, WithHeadings, WithMapping
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
        return [
            'ID da Tarefa',
            'Tarefa',
            'Data limite'
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->task,
            date('d/m/y', strtotime($row->limit_date))
        ];
    }
}
