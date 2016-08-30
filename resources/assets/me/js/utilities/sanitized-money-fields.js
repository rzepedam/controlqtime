function sanitizedMoneyFields() {
    $('.money').each(function () {
        var value = $(this)[0].value;
        var sanitizedDollar = value.replace('$', '');
        var sanitizedPoints = sanitizedDollar.split('.').join('');
        $(this)[0].value = sanitizedPoints;
    });
}
