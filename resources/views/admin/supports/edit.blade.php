<h1>Editar Suporte {{ $support->id }}</h1>

@if ($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach
@endif

<form action="{{ route('supports.update',$support->id) }}" method="POST">
    {{-- <input type="text" value="{{ csrf_token() }}" name="_token" hidden> --}}
    @csrf {{-- cria token para validar formulário --}}
    @method('PUT') {{-- o metodo de update é PUT no PHP --}}
    <input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject}}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>
