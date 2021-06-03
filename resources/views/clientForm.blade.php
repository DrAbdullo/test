@extends('layouts.app')
@section('content')


@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif

@can('check-date')
@include('inc.form')
@endcan


@cannot('check-date')
<div class="container">

    <h3> Сегодня вы уже отправили заявку, слейдующию заявку вы можете отправить завтра </h3>

</div>
@endcannot
@endsection

@section('aside')
@parent
<h3>Все сообщения</h3>
@foreach (DB::table('users_data')->where('user_id','=',Auth::user()->id )->orderBy('created_at','desc')->get() as $el)


<div class="alert alert-info">
    <h5>{{ $el->title }}</h5>
    <h5>{{ $el->created_at}}</h5>
    <h5>{{ $el->date}}</h5>
    <a href="{{ route('message_show',$el->id) }} "><button class="btn btn-warning">Детальнее</button></a>
</div>
@endforeach
@endsection