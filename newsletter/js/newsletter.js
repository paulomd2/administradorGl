function paginacao(pagina) {
    var count = $("#numNews").val();

    $("#listaNews").load('listaNewsAjax.php?count=' + count + '&pagina=' + pagina);

    
}

$(document).ready(function () {
    $("#listaNews").load('listaNewsAjax.php');

    $.get('listaNewsAjax.php', {count: 10, pagina: 1},
    function (r) {
        console.log(r);
    })

    $("#numNews").change(function () {
        var limite = $("#numNews").val();

        $("#listaNews").load('listaNewsAjax.php?count=' + limite);
    });
});