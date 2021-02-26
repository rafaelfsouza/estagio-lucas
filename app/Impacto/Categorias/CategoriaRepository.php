<?php

namespace Impacto\Categorias;

class CategoriaRepository
{
    public function listagem($busca = null, $perPage = 20){
        return Categoria::query()
            ->when($busca, function ($query) use ($busca){
                $query->where(function($query) use ($busca) {
                    $query->where('categoria', 'LIKE', "%$busca%");
                });
            })
            ->orderBy('categoria')
            ->paginate($perPage);
    }

    public function store($input) {
        $categoria = Categoria::query()->create($input);
        return $categoria;
    }

    public function show($id, $with = []) {
        return Categoria::query()
            ->with($with)
            ->find($id);

    }

    public function update($id, $input) {
        $categoria = Categoria::query()
            ->find($id);
        return $categoria->update($input);
    }

    public function delete($id) {
        $categoria = Categoria::query()
            ->find($id);
        return $categoria->delete();
    }

    public function data()
    {
        $categorias = Categoria::query()->where('ativo', true)
            ->orderBy('categoria')
            ->get();
        $categorias = $categorias->pluck('categoria', 'id')->toArray();

        return $categorias;
    }

}
