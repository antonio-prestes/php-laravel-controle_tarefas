<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<style>
    .title {
        border: 1px;
        background-color: darkgray;
        text-align: center;
        width: 100%;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 25px;
    }
    .table {
        width: 100%;
    }

    table th {
        text-align: left;
    }

</style>
<body>
<div class="title">Lista de Tarefas</div>
<table class="table">
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
</body>
</html>
