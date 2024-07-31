@extends('templates.main', ["title" => "Novo Eixo"])
    <hr>
    <a href="{{route('eixo.index')}}" class="btn btn-success">Voltar</a>
    <hr>
   
    <form action="{{route('eixo.store')}}" method="POST">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="" cols="20" rows="10" class="form-control"></textarea>
        <input type="submit" value="Salvar">
    </form>
@endsection