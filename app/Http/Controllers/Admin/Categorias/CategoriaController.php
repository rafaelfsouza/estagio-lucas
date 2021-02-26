<?php

namespace App\Http\Controllers\Admin\Categorias;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categorias\Categoria;
use Illuminate\Http\Request;
use Impacto\Categorias\CategoriaRepository;

class CategoriaController extends Controller {

    protected $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository){
        $this->categoriaRepository = $categoriaRepository;
    }

    public function index(Request $request){

        $listagem = $this->categoriaRepository->listagem($request->get('s'));

        return view('admin.categorias.index')->with(compact('listagem'));

    }

    public function create(){

        return view('admin.categorias.create');

    }

    public function store(Categoria $request){

        $input = $request->all();

        $categoria = $this->categoriaRepository->store($input);
        if ($categoria){
            $request->session()->flash('success', 'Registro Cadastrado!');
        }

        return redirect()->intended(route('admin.categorias.index'));

    }

    public function edit($id){

        $categoria = $this->categoriaRepository->show($id);

        if(!$categoria){
            return redirect()->route('admin.categorias.index');
        }

        return view('admin.categorias.edit')->with(compact('categoria'));

    }

    public function update(Categoria $request, $id){

        $input = $request->all();

        $categoria = $this->categoriaRepository->update($id, $input);

        if ($categoria){
            $request->session()->flash('success', 'Registro Atualizado!');
        }

        return redirect()->intended(route('admin.categorias.index'));

    }

    public function destroy($id){

        $categoria = $this->categoriaRepository->delete($id);

        session()->flash('success', 'Registro Excluído!');

        return response()->json($categoria);


    }

    public function show($id)
    {
        $categoria = $this->categoriaRepository->show($id);

        if(!$categoria){
            return redirect()->route('admin.categorias.index');
        }

        return view('admin.categorias.show')->with(compact('categoria'));
    }

}
