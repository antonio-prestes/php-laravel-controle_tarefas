@component('mail::message')

    # {{$task}}

    Data limite conclusão: {{$limit_date}}

@component('mail::button', ['url' => $url])
        Clique aqui para ver a tarefa
@endcomponent

    Thanks,
    {{ config('app.name') }}

@endcomponent
