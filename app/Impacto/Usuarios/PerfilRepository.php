<?php

namespace Impacto\Usuarios;

class PerfilRepository
{
    public function listagem($busca = null, $cliente_id = null, $perPage = 20){
        return Perfil::query()
            ->when($cliente_id, function ($query){
                $query->where('cliente', true);
            })
            ->when($busca, function ($query) use ($busca){
                $query->where('perfil', 'LIKE', "%$busca%");
            })
            ->where('id', '!=', 2)
            ->orderBy('perfil')
            ->paginate($perPage);
    }

    public function store($input) {
        $perfil = Perfil::query()->create($input);

        return $perfil;
    }

    public function show($id) {
        return Perfil::query()->find($id);
    }

    public function update($id, $input) {
        $perfil = Perfil::query()->find($id);

        return $perfil->update($input);
    }

    public function delete($id) {
        $perfil = Perfil::query()->find($id);
        return $perfil->delete();
    }

    public function data()
    {
        $perfis = Perfil::query()->where('ativo', true)
            ->orderBy('perfil')
            ->get();
        $perfis = $perfis->pluck('perfil', 'id')->toArray();

        return $perfis;
    }

}
