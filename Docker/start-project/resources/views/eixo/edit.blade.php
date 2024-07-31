@extends('templates.main', ["title" => "Alterar Eixo", "header" => "Modificar Eixo"])
    <hr>
    <a href="{{route('eixo.index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
        </svg>
    </a>
    <hr>
   
    <form action="{{route('eixo.update', $eixo->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome</label>
        <input type="text" name="nome" value="{{$eixo->nome}}">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="" cols="20" rows="10">{{$eixo->descricao}}</textarea>
        <input type="submit" value="Salvar">
    </form>
    
@endsection