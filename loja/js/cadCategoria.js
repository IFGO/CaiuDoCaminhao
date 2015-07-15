$(document).ready(function () {
    $(".nome").keyup(function () {
        $(".nomeHidden").val($(".nome").val());
    });
    $(".descricao").keyup(function () {
        $(".descricaoHidden").val($(".descricao").val());
    });
    $(".menurel").change(function () {
        $(".menurelHidden").val($(".menurel :selected").val());
    });
    $("#btnExcluir").click(function () {

        var parent = "";
        var array = new Array();

        //COLOCA OS ID's NO ARRAY E APAGA TODAS AS LINHAS SELECCIONADAS
        $('table tbody :checkbox:checked').each(function (i) {

            array.push($(this).val());

            //LINHA A APAGAR
            parent = $(this).parent().parent().parent();

            //APAGA A LINHA  
            parent.slideUp("slow", function () {
                $(this).remove();
            });

        });

        //CONCATENA OS ID'S SEPARADOS POR VIRGULAS
        var lista_ids = array.join(',');
        $.ajax({
            type: 'POST',
            url: 'paginas/crud/crudCategorias.php',
            data: {
                id: lista_ids,
                opt: "excluir"
            },
            success: function (data) {
                $("#mensagem").html("<div class='success text-success mensagem-sucesso'>" + data + "</div>");
            }
        });
    });

    $('#btnCadastrar').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'paginas/crud/crudCategorias.php',
            data: {
                id: $(".idHidden").val(),
                nome: $(".nomeHidden").val(),
                descricao: $(".descricaoHidden").val(),
                menurel: $(".menurelHidden").val(),
                opt: "cadastro"
            },
            success: function (data) {
                $("#mensagem").html("<div class='success text-success mensagem-sucesso'>" + data + "</div>");
            }
        });
    });
});