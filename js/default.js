function mostraForm(form) {
    var classe = $("#" + form).attr('class');
    
    if (classe == 'form-busca-oculta') {
        $("#" + form).removeClass(classe);
        $("#" + form).addClass('form-busca-visivel');
    } else {
        $("#" + form).removeClass(classe);
        $("#" + form).addClass('form-busca-oculta');
    }
}