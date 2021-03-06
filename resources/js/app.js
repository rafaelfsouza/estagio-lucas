
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Inputmask from 'inputmask'
import 'jquery-ui/ui/widgets/datepicker.js';

Inputmask({"mask": ["(99) 9999-9999", "(99) 99999-9999"], clearIncomplete: true, showMaskOnHover: false}).mask($('.input-telefone'))
Inputmask({"mask": "(99) 99999-9999", clearIncomplete: true, showMaskOnHover: false}).mask($('.input-celular'))
Inputmask({"mask": "99:99 às 99:99", clearIncomplete: true, showMaskOnHover: false}).mask($('.input-horario-inicio-fim'))
Inputmask({"mask": "99:99", clearIncomplete: true, showMaskOnHover: false}).mask($('.input-horario'))
Inputmask({"mask": "999.999.999-99", clearIncomplete: true, showMaskOnHover: false}).mask($('.input-cpf'))
Inputmask({"mask": "99.999.999/9999-99", clearIncomplete: true, showMaskOnHover: false}).mask($('.input-cnpj'))
Inputmask({"mask": ["999.999.999-99", "99.999.999/9999-99"], clearIncomplete: true, showMaskOnHover: false}).mask($('.input-cpf-cnpj'))
Inputmask({"mask": "99999-999", clearIncomplete: true, showMaskOnHover: false}).mask($('.input-cep'))
Inputmask({"mask": "99/99/9999", clearIncomplete: true, showMaskOnHover: false}).mask($('.input-data'))
Inputmask({"alias": "datetime", inputFormat: 'mm/yyyy', placeholder: 'mm/aaaa', clearIncomplete: true, showMaskOnHover: false}).mask($('.input-entrega'))
Inputmask({"alias": "numeric", "groupSeparator": ".", "autoGroup": true, "digits": 2, "radixPoint": ",", "digitsOptional": false, "placeholder": "0"}).mask($('.input-valor'))

// cep autocomplete
$('.input-cep').blur(function () {
    var cep = $(this).val();
    if ($.trim(cep) != "") {
        const instance = window.axios.create();
        instance.defaults.headers.common = {};
        instance.get("https://viacep.com.br/ws/"+ cep +"/json/").then(function (response) {
            if (!response.data.erro) {
                $('.input-cep').addClass("is-valid").removeClass("is-invalid");
                $("#logradouro").val(response.data.logradouro);
                $("#bairro").val(response.data.bairro);
                $("#cidade").val(response.data.localidade);
                $("#uf").val(response.data.uf);
                // $("#pais").val('Brasil');
                $("#numero").focus();
            }else {
                $('.input-cep').addClass("is-invalid").removeClass("is-valid");
                $(".input-cep").focus();
            }
        });
    }
});

$.validator.setDefaults({
    errorElement: "em", errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
        } else {
            $(element).parent().append(error)
        }
    }, highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
    }
})

$('[data-toggle=tooltip]').tooltip()

$('.btn-delete').click(function () {
    let url = $(this).data('url');
    let label = $(this).data('label');
    window.swal({
        title: `Deseja excluir ${label} ?`,
        text: "Operação irreversível!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        reverseButtons: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            window.axios.delete(url).then(function (response) {
                location.reload();
            })
        }
    })
});

$('.datepicker').attr({'readonly': true, 'placeholder': 'dd/mm/aaaa'}).css({background: 'white'}).datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
})

$('.datepicker-free').attr({'placeholder': 'dd/mm/aaaa'}).css({background: 'white'}).datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
})

$(document).ready(function(){
    $('.select2').select2()
})
