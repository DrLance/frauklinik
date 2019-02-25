<div class="popup callback zoom-anim-dialog">
  <div class="popup-inner">
    <h6>У вас остались вопросы?</h6>
    <p>Оставьте заявку и мои коллеги свяжутся с вами</p>
    <form class="popup-form">
      <?php echo do_shortcode( '[contact-form-7 id="337" title="Contact form 1"]' ); ?>
    </form>
    <div class="social-networks">
      <a href=""><img src="<?= get_template_directory_uri() ?>/images/whatsapp.svg" alt=""></a>
      <a href=""><img src="<?= get_template_directory_uri() ?>/images/viber.svg" alt=""></a>
      <a href=""><img src="<?= get_template_directory_uri() ?>/images/telegram.svg" alt=""></a>
      <a href=""><img src="<?= get_template_directory_uri() ?>/images/vk.svg" alt=""></a>
    </div>      
  </div>
  <button title="Close (Esc)" type="button" class="mfp-close">x</button>
  <script>
  //проверка заполненое ли поле
  $('.popup-input').on('keyup',function(){
    var $this = $(this),
    val = $this.val();
    if(val.length >= 1){
      $(this).removeClass('error');
      $(this).removeClass('error-2');
    }
  });

  $(document).on('click','.popup.callback .btn', function(){
    if($('.popup.callback .popup-input').hasClass('error')) {
      $('.popup.callback .popup-input.error').addClass('error-2');
    }
  });

</script>
</div>
