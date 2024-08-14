<?php

namespace App\Http\Controllers;
use App\Models\Eixo;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('index', Eixo::class);
        $data = Eixo::all();//all metodo que da o select *
        //Storage::disk('local')->put('example.txt', 'Contents');
        return view('eixo.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Eixo::class);
        return view('eixo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('store', Eixo::class);
        if($request->hasFile('documento')){

            $eixo = new Eixo();
            $eixo->nome = $request->nome;//setando
            $eixo->descricao = $request->descricao;
            $eixo->save();
            $ext = $request->file('documento')->getClientOriginalExtension();
            $nome_arq = $eixo->id.'_'.time(). "." .$ext;
            $request->file('documento')->storeAs("public/", $nome_arq);
            $eixo->url = $nome_arq;
            $eixo->save();

            $eixo->id;

            return redirect()->route('eixo.index');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $this->authorize('show', Eixo::class);
        $eixo = Eixo::find($id);
        if(isset($eixo)){
            return view('eixo.show', compact(['eixo']));
        }
        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('edit', Eixo::class);
        $eixo = Eixo::find($id);
        if(isset($eixo)){
            return view('eixo.edit', compact(['eixo']));
        }
        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update', Eixo::class);
        $eixo = Eixo::find($id);
        if(isset($eixo)){
            $eixo->nome = $request->nome;//setando
            $eixo->descricao = $request->descricao;
            $eixo->save();
            return redirect()->route('eixo.index');
        }
        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('destroy', Eixo::class);        $eixo = Eixo::find($id);
        if(isset($eixo)){
            $eixo->delete();
            return redirect()->route('eixo.index');
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    public function report(){
        $data = Eixo::all();
        // Instancia um Objeto da Classe Dompdf
        $dompdf = new Dompdf();
        // Carrega o HTML
        //$dompdf->loadHtml('hello world');
        $dompdf->loadHtml(view('eixo.pdf', compact('data'))); // (Opcional) Configura o Tamanho e Orientação da Página
        $dompdf->render();
        $dompdf->stream("relatorio-horas-turma.pdf", array("Attachment" => false));
      
    }

    public function graph(){
        $data = json_encode([
            ["NOME", "TOTAL"],
            ["Gabi", 100],
            ["Diego", 100],
            ["Paula", 100],
            ["Gil", 100],
        ]);

        return view('eixo.graph', compact('data'));
    }
}
