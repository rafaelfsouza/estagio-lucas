<div class="row">
    <div class="form-group col-12 col-sm-10">
        <label>*Perfil</label>
        {{ Form::text('perfil', null, ['class'=>'form-control']) }}
    </div>
    <div class="col-12 col-sm-2 custom-control custom-checkbox">
        <label for="ativo">Ativo</label>
        <div class="form-check">
            {{ Form::hidden('ativo', 0) }}
            @if(isset($perfil))
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

<div class="row justify-content-end">
    <div class="form-group col-auto">
        <button class="btn btn-outline-primary">Salvar</button>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function () {

            let $validation = $("#form-crud").validate({
                rules: {
                    perfil: {
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
