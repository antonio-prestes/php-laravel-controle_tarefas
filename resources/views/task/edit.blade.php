@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Atualizar Tarefa</div>

                    <div class="card-body">
                        <form method="post" action="{{route('update',['task'=>$task->id])}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tarefa</label>
                                <input type="text" class="form-control" name="task" value="{{$task->task}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Data Limite</label>
                                <input type="date" class="form-control" name="limit_date" value="{{$task->limit_date}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
