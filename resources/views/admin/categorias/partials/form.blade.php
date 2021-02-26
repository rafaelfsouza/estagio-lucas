<div class="row">
    <div class="form-group col-12">
        <label for="categoria">*Categoria</label>
        {{ Form::text('categoria', null, ['class'=>'form-control', 'id' => 'categoria']) }}
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-2 custom-control custom-checkbox form-group">
        <label for="ativo">Ativo</label>
        <div class="form-check">
            {{ Form::hidden('ativo', 0) }}
            @if(isset($categoria))
                {{ Form::checkbox('ativo', 1, null, ['id' => 'ativo', 'class' => 'custom-control-input']) }}
            @else
                {{ Form::checkbox('ativo', 1, true, ['id' => 'ativo', 'class' => 'custom-control-input']) }}
            @endif
            <label class="custom-control-label" for="ativo">
                Sim
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-12">
        <button class="btn btn-outline-primary">Salvar</button>
    </div>
</div>
@section('scripts')
    <script>
        $(document).ready(function () {
            let $validation = $("#form-crud").validate({
                rules: {
                    categoria: {
                        required: true
                    }
                }
            });
            @if(isset($errors))
            $validation.showErrors({!! $errors !!})
            @endif

        });
    </script>
@endsection
