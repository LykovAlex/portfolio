$(document).ready(function(){

                        // Подключаем объект для работы плагина при скролле

new WOW().init();

                                      // Функция для Parallax
  $(window).scroll(function(){
    var st = $(this).scrollTop();
    $('.titleForHeader').css({'transform' : 'translate(-50%,-' + st + '%)'});
  });

                                      // Ajax для обратной связи
  $('#form').submit(function(){
    $.ajax({
      type: 'POST',
      url: 'mail.php',
      data: $(this).serialize()
    }).done(function(){
      alert('Благодарю за сообщение, я Вам отвечу при первой возможности');
    });
    return false;
  });

                                      // Accordion in menu

  $('.noteText').hide().prev().click(function(){
    $('.noteText').not(this).slideUp();
    $(this).next().not(':visible').slideDown();
  });



                                        // Кнопка меню
  $('.menu-icon').on('click', function(e){
    e.preventDefault();
    $(this).toggleClass('menu-button');
    $('.menu').toggleClass('menu-activ');
  })

  if(matchMedia){
    var screenWindow = window.matchMedia('(min-width:898px)');
    screenWindow.addListener(changes);
    changes(screenWindow);
  }
  function changes(screenWindow){
    if(screenWindow.matches){
      $('.menu-icon').removeClass('menu-button');
      $('.menu').removeClass('menu-activ');
    }
  }

});
