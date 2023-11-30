<h1>Editar Suporte {{ $support->id }}</h1>

<x-alert/>

<form action="{{ route('supports.update',$support->id) }}" method="POST">
    @method('PUT') {{-- o metodo de update é PUT no PHP --}}
    @include('admin.supports.partials.form', [
        'support' => $support
    ])
</form>
