$(document).ready(function(){

              // Подключаем объект для работы плагина при скролле

  new WOW().init();

            //Ajax для обратной связи
  $('#form').submit(function(){
    $.ajax({
      type: 'POST',
      url: 'mail.php',
      data: $(this).serialize()
    }).done(function(){
      alert('Спасибо за сообщение, постараюсь ответить при первой возможности');
    });
    return false;
  });


              // Обрабатываем нажатие на кнопку меню

  $('.buttonMenu').click(function(){
    $(this).toggleClass('buttonMenuActive');
    if($('.bgButtonMenu').is(':visible')){
      $('.bgButtonMenu').fadeOut(400);
      $('.description').fadeIn(400);
    } else{
      $('.bgButtonMenu').fadeIn(400);
      $('.description').fadeOut(400);
    };
  });

  $('.minMenuString').click(function(){
    $('.bgButtonMenu').fadeOut(400);
    $('.buttonMenu').removeClass('buttonMenuActive');
  });

  if(matchMedia){
    var screenWindow = window.matchMedia('(min-width:900px)');
    screenWindow.addListener(changes);
    changes(screenWindow);
  }
  function changes(screenWindow){
    if(screenWindow.matches){
      $('.bgButtonMenu').fadeOut(400);
      $('.buttonMenu').removeClass('buttonMenuActive');
    }
  }
                  // Анимация ссылок в меню

  var menuString = document.querySelectorAll('.menuString');
  for(var i = 0; i < menuString.length; i++){
    menuString[i].addEventListener('mouseover', addUnderline);
    menuString[i].addEventListener('mouseout', deleteUnderline);
  }

  function addUnderline(){
    var underline = document.createElement('div');
    underline.classList.add('underline');
    this.appendChild(underline);
    var widthString = this.offsetWidth - 12;
    var motion = 0;
    function move(){
      if(motion < widthString){
        underline.style.marginLeft = motion + 'px';
        motion = motion + 1;
      } else {
        motion = 0;
      }
    }
    setInterval(move, 10);
  }

  function deleteUnderline(){
    var div = this.children[0];
    this.removeChild(div);
  }
              // Открываем портфолио при клике

  // $('.subtitleForPortfolio').click(function(){
  //   if($(this).next().is(':visible')){
  //     $(this).next().slideUp(1500);
  //   } else {
  //     $(this).next().slideDown(1500);
  //   }
  // });

});
