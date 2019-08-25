jQuery(document).ready(function($) {
    alert('chegou aqui');
    $('h1').on('click', function(event){
        event.preventDefault();
        alert('adsad');
    });
});