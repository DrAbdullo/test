@extends('layouts.app')
@section('content')




<form method="post" action={{ 'manager_mess' }}>

    <h1>Тема: {{$mdata->title}}</h1>
    <div class="alert alert-info">
        <h2>Заявка:</h2>
        <h5>{{ $mdata->content}}</h5>
        <p>Дата подачи заявки:<small>{{ $mdata->date}}</small></p>
        <p>Файл: <small>{{ $mdata->furl}}</small></p>

        <a href="{{ route('manager_mess',$mdata->user_id) }} "><button class="btn btn-warning">Детальнее</button></a>
    </div>

</form>

@endsection


@section('aside')
@parent
<h3>Not confermed messages</h3>


@endsection