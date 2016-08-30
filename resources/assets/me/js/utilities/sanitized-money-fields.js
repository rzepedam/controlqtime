function sanitizedMoneyFields() {
    $('.money').each(function () {
        var value = $(this)[0].value;
        var sanitizedDollar = value.replace('$', '');
        var sanitizedPoints = sanitizedDollar.replace('.', '');
        $(this)[0].value = sanitizedPoints;
    });
}
