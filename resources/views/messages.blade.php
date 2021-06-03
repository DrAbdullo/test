@extends('layouts.app')
@section('content')




<h1>Тема: {{$data->title}}</h1>
<div class="alert alert-info">
    <h2>Заявка:</h2>
    <h5>{{ $data->content}}</h5>
    <p>Дата подачи заявки:<small>{{ $data->date}}</small></p>
    <p>Файл: <small>{{ $data->furl}}</small></p>


</div>
@endsection

@section('aside')
@parent
<h3>Все сообщения</h3>
@foreach (DB::table('users_data')->where('user_id','=',Auth::user()->id )->orderBy('created_at','desc')->get() as $el)


<div class="alert alert-info">
    <small>{{ $el->title }}</small>
    <p>Дата подачи заявки:<small>{{ $data->date}}</small></p>

    <a href="{{ route('message_show',$el->id) }} "><button class="btn btn-warning">Детальнее</button></a>
</div>

@endforeach
@endsection