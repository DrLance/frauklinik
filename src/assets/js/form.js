(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  };
}(jQuery));

$( document ).ready( function () {

  const finishHtml = '<div class="good">\n' +
    '  <img src="wp-content/themes/frauklinik/images/popup-good.svg" alt="" />\n' +
    '  <h6>Спасибо, за вашу заявку!</h6>\n' +
    '  <p>Мои коллеги обработают заявку,мы свяжемся с вами</p>\n' +
    '</div>\n';

  const prevHtml = $( '#inputForm' ).html();

  var wpcf7Elm = document.querySelector( '.wpcf7' );

  $( 'input' ).on( 'focus',function (  ) {
    $(this).removeClass( 'error-2' );
  } );

  $('input[name="tel-87"]').inputFilter(function(value) {
    return /^\d*$/.test(value);
  });

  wpcf7Elm.addEventListener( 'wpcf7submit', function ( event ) {


    const { inputs } = event.detail;
    for ( const input in inputs ) {
      if ( input != 0 ) {
        if ( inputs[input].value.length === 0 ) {
          console.log( inputs[input].name );
          $( 'input[name=' + inputs[input].name + ']' ).addClass( 'error-2' );
        } else {
          $( 'input[name=' + inputs[input].name + ']' ).removeClass( 'error-2' );
        }
      }
    }

    if ( event.detail.status === 'mail_sent' ) {
      $( '#inputForm' ).empty();
      $( '#inputForm' ).append( finishHtml );
      $( '.social-networks' ).css( 'margin-top', '-60px' );

      setTimeout( function () {
        $( '#inputForm' ).empty();
        $( '#inputForm' ).append( prevHtml );
        $( '.social-networks' ).css( 'margin-top', '-90px' );
        $( '#popupCallback' ).magnificPopup( 'close' );

      }, 3000 );

    }

  }, false );

} );