@extends('templates.main', ["title" => "Alterar Eixo", "header" => ""])

@section('content')
    <hr>
    <a href="{{route('eixo.create')}}">Cadastrar</a>
    <hr>
    <table>
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th>AÇÕES</th>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->descricao}}</td>
                    <td>
                        <a href="{{asset('storage'). "/" .$item->url}}" target="_blank">Arquivo</a>
                    </td>
                    <td>
                        <a href="{{route('eixo.show', $item->id)}}">Mais+Info</a>
                        <a href="{{route('eixo.edit', $item->id)}}">Alterar</a>
                        <form action="{{route('eixo.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Remover">
                        </form>
                        <a href="{{route('report')}}" target="_blank">Relatorio</a>
                        <a href="{{route('graph')}}" target="_blank">Grafico</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection