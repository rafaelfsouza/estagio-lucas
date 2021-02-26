@extends('admin.layouts.app')

@section('content')

    <div class="p-3">
        <div class="row">
            <div class="col-8 col-md-10 col-lg-11">
                <div class="mr-auto">
                    <h3>Categorias :: Visualizar</h3>
                </div>
            </div>
            <div class="col-4 col-md-2 col-lg-1">
                <a href="{{ route('back') }}" class="btn btn-block btn-outline-danger" data-toggle="tooltip" data-placement="left" title="Voltar">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-10">
                {{ Form::model($categoria, ['route' => ['admin.categorias.show', $categoria->id], 'method' => 'PUT','id' => 'form-crud']) }}
                <div class="row">
                    <div class="form-group col-12">
                        <label for="categoria">Categoria</label>
                        {{ Form::text('categoria', null, ['class'=>'form-control', 'id' => 'categoria', 'disabled']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-sm-3">
                        <label for="ativo">Ativo</label>
                        {{ Form::text('ativo', $categoria->ativo ? 'Sim' : 'Não', ['class'=>'form-control', 'disabled']) }}
                    </div>
                </div>
                <div class="row no-gutters justify-content-end">
                    @can('auth', 'categorias.editar')<a href="{{ route('admin.categorias.edit', ['id' => $categoria->id]) }}" class="btn btn-outline-primary mr-2">Editar <i class="fas fa-pencil-alt"></i></a>@endcan
                    @can('auth', 'categorias.excluir') <button type="button" data-label="{{ $categoria->categoria }}" data-url="{{ route('admin.categorias.destroy', $categoria->id) }}" class="btn btn-outline-danger btn-delete">Excluir <i class="far fa-trash-alt"></i></button>@endcan
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
