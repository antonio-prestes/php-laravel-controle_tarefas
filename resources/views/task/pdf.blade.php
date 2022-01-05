<h2>Lista de Tarefas</h2>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Tarefa</th>
        <th>Data Limite</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $key=>$task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->task}}</td>
            <td>{{date('d/m/y', strtotime($task->limit_date))}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
