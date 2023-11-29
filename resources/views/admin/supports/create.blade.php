<h1>Novo Suporte</h1>

@if ($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach
@endif

<form action="{{ route('supports.store') }}" method="POST">
    {{-- <input type="text" value="{{ csrf_token() }}" name="_token" hidden> --}}
    @csrf {{-- cria token para validar formulário --}}
    <input type="text" placeholder="Assunto" name="subject" value="{{old('subject')}}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{old('body')}}</textarea>
    <button type="submit">Enviar</button>
</form>
