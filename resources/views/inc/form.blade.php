<form method="post" action="{{route('create')}}" class="hvl-ncomment" {{--"{{route('addFile')}}"--}} enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="user_id" id="user_id" value="{{ $user_id =  Auth::user()->id }}">
    <input type="hidden" name="date" id="date" value="{{ now() }}">



    <h3 class="hvl-h3">Tema</h3>
    <input type="text" class="form-control" name="title" id="title" cols="80" placeholder="Введите текст" required="required">

    <h3 class="hvl-h3">Ваше сообщение</h3>

    <textarea name="content" id="content" class="form-control" rows="8" cols="80" placeholder="Введите текст" required="required"></textarea><br>

    <p>Загрузите файл:</p>
    <div uk-form-custom="target:true">
        <input type="file" class="form-control" name="fname" required="required"><br>

    </div>
    <div id="disp_tmp_path"></div>

    <div>

        <button type="submit" class="btn btn-info">Отправить</button>
    </div>
</form>