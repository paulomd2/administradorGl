$(document).ready(function () {
    $("#btnEnviar").click(function () {
        var facebook = $("#facebook").val();
        var twitter = $("#twitter").val();
        var google = $("#google").val();
        var instagram = $("#instagram").val();
        var flickr = $("#flickr").val();
        var youtube = $("#youtube").val();
        var opcao = $("#opcao").val();

        $.post('control/controleRedes.php', {opcao: opcao, facebook: facebook, twitter: twitter, google: google, instagram: instagram, flickr: flickr, youtube: youtube});
        setTimeout(function () {
            window.location = 'index.php';
        }, 2000);
    });
});