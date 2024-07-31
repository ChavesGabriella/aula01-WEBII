@extends('templates.main', ["title" => "Detalhes Eixo"])
    <hr>
    <a href="{{route('eixo.index')}}">Voltar</a>
    <hr>
   
    <ul>
        <li><b>ID:</b>{{$eixo->id}}</li>
        <li><b>NOME:</b>{{$eixo->nome}}</li>
        <li><b>DESCRIÇÃO:</b>{{$eixo->descricao}}</li>
        <li><b>CRIADO:</b>{{$eixo->create_at}}</li>
        <li><b>ALTERADO:</b>{{$eixo->updated_at}}</li>
    </ul>
@endsection