<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AlunoRepository;
use App\Repositories\CursoRepository;
use App\Repositories\TurmaRepository;

class AlunoController extends Controller {
    
    protected $repository;

    public function __construct(){
        $this->repository = new AlunoRepository();
    }

    public function index() {
        $data = $this->repository->selectAllWith(['turma', 'user']);
        return $data;    
    }

    public function create() {
        // retorna, para o usuário, a view de criação de Aluno
    }

    public function store(Request $request) {

        $objCurso = (new CursoRepository())->findById($request->curso_id);
        $objTurma = (new TurmaRepository())->findById($request->turma_id);
        
        if(isset($objCurso) && isset($objTurma)) {
            $obj = new Aluno();
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj->cpf = $request->cpf;
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password); 
            $obj->curso()->associate($objCurso);
            $obj->turma()->associate($objTurma);
            $this->repository->save($obj);
            return "<h1>Store - OK!</h1>";
        }
        
        return "<h1>Store - Not found Curso or Turma!</h1>";
    }

    public function show(string $id) {
        $data = $this->repository->findById($id);
        return $data;
    }

    public function edit(string $id) {
        // $data = $this->repository->findById($id);
        // retorna, para o usuário, a view de edição de Aluno - passa objeto $data
    }

    public function update(Request $request, string $id) {
        
        $obj = $this->repository->findById($id);
        $objCurso = (new CursoRepository())->findById($request->curso_id);
        $objTurma = (new TurmaRepository())->findById($request->turma_id);
        
        if(isset($obj) && isset($objCurso) && isset($objTurma)) {
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj->cpf = $request->cpf;
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password); 
            $obj->curso()->associate($objCurso);
            $obj->turma()->associate($objTurma);
            $this->repository->save($obj);
            return "<h1>Update- OK!</h1>";
        }
        
        return "<h1>Store - Not found Curso or Turma!</h1>";
    }

    public function destroy(string $id){
        
        if($this->repository->delete($id))  {
            return "<h1>Delete - OK!</h1>";
        }
        
        return "<h1>Delete - Not found Aluno!</h1>";
    }
}
