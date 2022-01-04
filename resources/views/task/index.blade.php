@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tarefas
                        <a href="{{route('create')}}" class="btn btn-primary btn-sm float-end">Nova task</a>
                        <button class="btn btn-secondary btn-sm dropdown-toggle float-end me-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Exportar
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('export')}}">XLS</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>

                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tarefa</th>
                            <th scope="col">Data limite</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <th scope="row">{{$task->id}}</th>
                                <td>{{$task->task}}</td>
                                <td>{{$task->limit_date}}</td>
                                <td><a href="{{route('edit', $task->id)}}">Editar</a></td>
                                <td>
                                    <form id="form_{{$task['id']}}" method="post"
                                          action="{{ route('delete', ['task' => $task['id']]) }}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <a href="#" onclick="document.getElementById('form_{{$task['id']}}').submit()">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <ul class="pagination justify-content-center">
                    {{ $tasks->links() }}
                </ul>


            </div>
        </div>
    </div>
@endsection
