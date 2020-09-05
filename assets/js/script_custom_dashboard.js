$(document).ready(function () {
    /*
        INSTANCIA DA SIDEBAR QUE CHAMA O MENU LATERAL:
        1-TRAVA SCROLL FORA DO MENU.
        2-SELECIONA O EVENT DO MENU.
    */
    $('.ui.sidebar')
        .sidebar('attach events', '.ui .item.mobileMenu');
    $('select').dropdown();
    $('.ui.checkbox').checkbox('enable');
});