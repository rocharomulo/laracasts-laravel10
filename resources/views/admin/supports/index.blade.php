<h1>Listagem de Suportes</h1>

<a href="{{ route('supports.create') }}">Solicitar Suporte</a>

<table>
    <thead>
        <th>assunto</th>
        <th>status</th>
        <th>descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($supports->items() as $support)  {{-- laço no array de suportes --}}
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ getStatusSupport($support->status) }}</td>
                <td>{{ $support->body }}</td>
                <td>
                    <a href="{{ route('supports.show',$support->id) }}">ver</a>
                    <a href="{{ route('supports.edit',$support->id) }}">editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination
    :paginator="$supports"
    :appends="$filters"
    />
