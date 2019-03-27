$(document).ready(function (  ) {

  var wpcf7Elm = document.querySelector( '.wpcf7' );

  wpcf7Elm.addEventListener( 'wpcf7submit', function( event ) {
    
    console.log(event.detail);
    $('#popupCallback').magnificPopup('close');
    return false;
  }, false );

});