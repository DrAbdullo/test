@extends('layouts.app')

@section('content')
<h1>Not confirmed messages</h1>

<form method="post" action={{ route('manager_mess') }} class="hvl-ncomment">
    @csrf
    @if (!$mdata == NULL)


    <input type="hidden" name="id" id="id" value={{$mdata->id }}>


    <div class="alert alert-info">
        <small>Тема: {{$mdata->title}} Имя: {{ $mdata->user->name }} E-mail: {{ $mdata->user->email }}</small>

        <hr align="center" width="100%" size="50" color="#00ff00" />
        <h2>Заявка:</h2>
        <h5>{{ $mdata->content}}</h5>
        <p>Дата подачи заявки:<small>{{ $mdata->date}}</small></p>
        <p>Файл: <small>{{ $mdata->furl}}</small></p>
        <p>dada id: <small>{{ $mdata->id}}</small></p>

        @if($mdata->confirmed == false )
        <a href=""><button type="submit" class="btn btn-warning">Confirm</button></a>
        @else
        <h3>Message confirmed</h3>
        @endif
    </div>

    @endif
</form>
@if (!$data==NULL)

@foreach ($data as $el)
@if($el->confirmed == false)

<div class="alert alert-info">

    ID клиента: {{ $el->user->id}}
    Имя: {{ $el->user->name}}
    Тема: {{ $el->title }}
    Дата создания:{{ $el->date}}
    e-mail: {{ $el->user->email}}
    id заявки: {{ $el->id}}
    <a href="{{ route('man_message_show',$el->id) }} "><button class="btn btn-danger">Детальнее</button></a>
</div>
@endif


@endforeach


@endif

@endsection


@section('aside')
@parent
<h3>Confermd messages</h3>

@if(!$descdata==Null)

@foreach ($descdata as $el)

@if( $el->confirmed == 1)
<div class="alert alert-info">

    ID клиента: {{ $el->user->id}}
    Имя: {{ $el->user->name}}
    Тема: {{ $el->title }}
    Дата создания:{{ $el->date}}
    e-mail: {{ $el->user->email}}


    <a href="{{ route('man_message_show',$el->id) }} "><button class="btn btn-success">Детальнее</button></a>

</div>
@endif


@endforeach
@endif

@endsection