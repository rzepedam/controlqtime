$(document).ready(function(){
    var elem = document.querySelector('.js-switch');
    var init = new Switchery(elem, {
        color             : '#5C6BC0',
        disabledOpacity   : 1,
        speed             : '0.4s',
        size              : 'small'
    });
});