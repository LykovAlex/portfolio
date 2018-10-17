window.onload = function(){
  var
   lineLength = 20, // Колличество линий на поле
   columnLength = 20, // Колличество ячеек в линии
   snake = [], // Змейка собственной персоной
   gameIsRunning, // Состояние игры (игра/пауза)
   pause = false, // Изначально паузы нет
   direction = 'y+', // Направление змейки
   snakeSpeed = 100, // скорость змейки
   goodFood, // Полезная еда
   badFood, // Вредная еда
   countBadFood = 0, // Счётчик вредной еды
   life, // Жизнь
   countLife = 0, // Колличество жизней
   score = 0, // Очки
   k = 0; // Счётчик сторон куба

                                                // Выбираем сложность игры
  var buttonSelectLevel = document.querySelector('.selectLevel');
  buttonSelectLevel.addEventListener('change', select);
  function select(){
    if(this.value == 'lite'){
      snakeSpeed = 150;
    } else if(this.value == 'normal'){
      snakeSpeed = 100;
    } else if(this.value == 'hard'){
      snakeSpeed = 50;
    }
    return snakeSpeed;
  }

                                      // Отрисовываем игровое поле на каждой стороне куба
  createTable('FRONT');
  createTable('BACK');
  createTable('LEFT');
  createTable('RIGHT');
  createTable('TOP');
  createTable('BOTTOM');

                                        // Вешаем на кнопку событие (начало игры)

  var start = document.getElementById('startGame');
  start.addEventListener('click', startGame);


                                        // Начинаем игру
  function startGame(){
    createSnake();         // Создаём и распологаем змейку по середине поля
    gameIsRunning = setInterval(moveSnake, snakeSpeed); // Двигаем змейку
    goodFood = setInterval(createGoodFood, 10000);
    badFood = setInterval(createBadFood, 4500);
    life = setInterval(createLife, 30000);
    addEventListener('keydown', changeDirection); // Управляем змейкой
    start.removeEventListener('click', startGame)
    start.addEventListener('click', restartGame);
  }





                                         // Функция создания и отцентровки змейки
  function createSnake(){
    var x = columnLength / 2;
    var y = lineLength / 2;
    var headSnake = document.getElementsByClassName(x + '-' + (y - 1))[0];
    headSnake.classList.add('bodySnake');
    var bodySnake = document.getElementsByClassName(x + '-' + y)[0];
    bodySnake.classList.add('bodySnake');
    snake.push(headSnake);
    snake.push(bodySnake);
  }


                                           // Функция движения
  function moveSnake(){
    var newBody;
    var snakeClasses = snake[0].getAttribute('class').split(' ');
    var headPosition = snakeClasses[2];
    var snakePosition = snakeClasses[1].split('-');
    var x = +snakePosition[0];
    var y = +snakePosition[1];

                                      // Отслеживаем события клавиатуры для каждой стороны куба
    if(direction == 'y+'){
      directionToMove(x + '-' + (y - 1));
    } else if(direction == 'y-'){
      directionToMove(x + '-' + (y + 1));
    } else if(direction == 'x+'){
      directionToMove((x + 1) + '-' + y);
    } else if(direction == 'x-'){
      directionToMove((x - 1) + '-' + y);
    }
                                       // Если вышли за пределы куба, то переходим на другую сторону
    if(newBody === undefined) {
      newBody = moveToAnotherSide(x, y);

    }
                                          // Если врезались в преграду то заканчиваем игру
    if((snakeClasses.includes('blockX')) || (snakeClasses.includes('blockY'))){
      clearInterval(gameIsRunning);
      return theAnd();
    }


                                    // проверяем попала ли змейка в себя или в еду
    if(!haveBody(newBody)){
      newBody.classList.add('bodySnake');
      snake.unshift(newBody);
      if(haveBadFood(newBody)){
        if(countLife == 0){
          theAnd();
        } else{
          countLife--;
          lifeOnline();
        }
      }
      if(haveGoodFood(newBody)){
        newBody.classList.remove('goodFood');
        return;
      }
      if(haveLife(newBody)){
        newBody.classList.remove('life');
      }
      var removed = snake.splice(-1,1)[0]; // Находим хвост и удаляем если никуда не попала
      removed.classList.remove('bodySnake');
    } else {
        theAnd();
      }
                                                //Функция движения по сторонам куба
      function directionToMove (location){
        if(headPosition == 'FRONT'){
          newBody = document.getElementsByClassName(location)[0];
        } else if(headPosition == 'TOP'){
          newBody = document.getElementsByClassName(location)[4];
        } else if(headPosition == 'BACK'){
          newBody = document.getElementsByClassName(location)[1];
        } else if(headPosition == 'BOTTOM'){
          newBody = document.getElementsByClassName(location)[5];
        } else if(headPosition == 'RIGHT'){
          newBody = document.getElementsByClassName(location)[3];
        } else if(headPosition == 'LEFT'){
          newBody = document.getElementsByClassName(location)[2];
        }
      }

                                              //Функция перехода на другую сторону
      function moveToAnotherSide(x, y) {
        var unit;
        var top = document.querySelector('.top');
        var back = document.querySelector('.back');
        var bottom = document.querySelector('.bottom');
        var left = document.querySelector('.left');
        var right = document.querySelector('.right')
          if (direction == 'y+') {
            moveCubeToUp();
          } else if(direction == 'y-') {
            moveCubeToDown();
          } else if(direction == 'x+') {
            moveCubeToRight();
          } else if (direction == 'x-') {
            moveCubeToLeft();
          }
          return unit;
                                                  // Переход на верхнюю сторону
          function moveCubeToUp(){
            if(headPosition == 'FRONT'){
                unit = document.getElementsByClassName(x + '-' + 19)[4];
                if(y == 0){
                  addBlockY(top);
                }
            } else if(headPosition == 'TOP'){
                unit = document.getElementsByClassName(x + '-' + 19)[1];
                if(y == 0){
                  var reverse = document.querySelector('.back');
                  if(reverse.classList.contains('reverseForBack')){
                    reverse.classList.remove('reverseForBack')
                  }
                  addBlockY(back);
                  deleteBlockY(top);
                }
            } else if(headPosition == 'BACK'){
                unit = document.getElementsByClassName(x + '-' + 19)[5];
                if(y == 0){
                  addBlockY(bottom);
                  deleteBlockY(back);
                }
            } else if(headPosition == 'BOTTOM'){
                unit = document.getElementsByClassName(x + '-' + 19)[0];
                if(y == 0){
                  deleteBlockY(bottom);
                }
            }
          }
                                                    // Переход на нижнюю сторону
          function moveCubeToDown(){
            if(headPosition == 'FRONT'){
              unit = document.getElementsByClassName(x + '-' + 0)[5];
              if(y == 19){
                addBlockY(bottom);
              }
            } else if(headPosition == 'BOTTOM'){
                unit = document.getElementsByClassName(x + '-' + 0)[1];
                if(y == 19){
                  var reverse = document.querySelector('.back');
                  if(reverse.classList.contains('reverseForBack')){
                    reverse.classList.remove('reverseForBack')
                  }
                  addBlockY(back);
                  deleteBlockY(bottom);
                }
            } else if(headPosition == 'BACK'){
                unit = document.getElementsByClassName(x + '-' + 0)[4];
                if(y == 19){
                  addBlockY(top);
                  deleteBlockY(back);
                }
            } else if(headPosition == 'TOP'){
                unit = document.getElementsByClassName(x + '-' + 0)[0];
                if(y == 19){
                  deleteBlockY(top);
                }
            }
          }
                                                   // Переход на правую сторону
          function moveCubeToRight(){
            if(headPosition == 'FRONT'){
              unit = document.getElementsByClassName(0 + '-' + y)[3];
              if(x == 19){
                addBlockX(right);
              }
            } else if(headPosition == 'RIGHT'){
                if(x == 19){
                  var reverse = document.querySelector('.back');
                  reverse.classList.add('reverseForBack');
                  unit = document.getElementsByClassName(0 + '-' + y)[1];
                  addBlockX(back);
                  deleteBlockX(right);
                }
            } else if(headPosition == 'BACK'){
                unit = document.getElementsByClassName(0 + '-' + y)[2];
                if(x == 19){
                  addBlockX(left);
                  deleteBlockX(back);
                }
            } else if(headPosition == 'LEFT'){
                unit = document.getElementsByClassName(0 + '-' + y)[0];
                if(x == 19){
                  deleteBlockX(left);
                }
              }
          }
                                                    // Переход на левую сторону
          function moveCubeToLeft(){
            if(headPosition == 'FRONT'){
              unit = document.getElementsByClassName(19 + '-' + y)[2];
              if(x == 0){
                addBlockX(left);
              }
            } else if(headPosition == 'LEFT'){
              if(x == 0) {
                var reverse = document.querySelector('.back');
                reverse.classList.add('reverseForBack');
                unit = document.getElementsByClassName(19 + '-' + y)[1];
                addBlockX(back);
                deleteBlockX(left);
              }
              unit = document.getElementsByClassName(19 + '-' + y)[1];
            } else if(headPosition == 'BACK'){
                unit = document.getElementsByClassName(19 + '-' + y)[3];
                if(x == 0){
                  addBlockX(right);
                  deleteBlockX(back);
                }
            } else if(headPosition == 'RIGHT'){
                unit = document.getElementsByClassName(19 + '-' + y)[0];
                if(x == 0){
                  deleteBlockX(right);
                }
              }
          }
      }
  }

                                  // Добавляем и удаляем преграду для змейки в зависимости от её местонахождения
  function addBlockY(side){
    for(var i = 0; i <= 19; i++){
      side.children[i].firstChild.classList.add('blockY');
      side.children[i].lastChild.classList.add('blockY');
    }
  }
  function deleteBlockY(side){
    if(side.children[0].firstChild.classList.contains('blockY')){
      for(var i = 0; i <= 19; i++){
        side.children[i].firstChild.classList.remove('blockY');
        side.children[i].lastChild.classList.remove('blockY');
      }
    }
  }
  function addBlockX(side){
    for(var i = 0; i <= 19; i++){
      side.firstChild.children[i].classList.add('blockX');
      side.lastChild.children[i].classList.add('blockX');
    }
  }
  function deleteBlockX(side){
    if(side.firstChild.children[0].classList.contains('blockX')){
      for(var i = 0; i <= 19; i++){
        side.firstChild.children[i].classList.remove('blockX');
        side.lastChild.children[i].classList.remove('blockX');
      }
    }
  }


                                          // Функция обработки нажатия клавиатуры
  function changeDirection(e){
    // console.log(e.keyCode);
    if(e.keyCode == 38 && direction != 'y-'){
      direction = 'y+';
    } else if(e.keyCode == 40 && direction != 'y+'){
      direction = 'y-';
    } else if(e.keyCode == 37 && direction != 'x+'){
      direction = 'x-';
    } else if(e.keyCode == 39 && direction != 'x-'){
      direction = 'x+';
    } else if(e.keyCode == 32) {
      if(pause == false){
        clearInterval(gameIsRunning);
        clearInterval(badFood);
        clearInterval(goodFood);
        clearInterval(life)
        pause = true;
    } else {
        gameIsRunning = setInterval(moveSnake, snakeSpeed);
        goodFood = setInterval(createGoodFood, 10000);
        badFood = setInterval(createBadFood, 4500);
        life = setInterval(createLife, 30000);
        pause = false;
      }
    }
  }

                                 // Проверки никуда ли змейка не врезалась
  function haveBody(unit){
    var check = false;
    if (snake.includes(unit)) {
        check = true;
    }
    return check;
  }

  function haveGoodFood(unit){
      var check = false;
      var unitClasses = unit.getAttribute('class').split(' ');
      if (unitClasses.includes('goodFood')) {
          check = true;
          score++;
          resultOnline();
      }
      return check;
  }

  function haveBadFood(unit){
      var check = false;
      var unitClasses = unit.getAttribute('class').split(' ');
      if (unitClasses.includes('badFood')) {
          check = true;
      }
      return check;
  }



  function haveLife(unit){
      var check = false;
      var unitClasses = unit.getAttribute('class').split(' ');
      if (unitClasses.includes('life')) {
          countLife++;
          check = true;
          lifeOnline();
      }
      return check;
  }


                                              // Создаём жизни
  function createLife(){
    while(true){
      var x = Math.floor(Math.random() * 18) + 1;
      var y = Math.floor(Math.random() * 18) + 1;
      var side = Math.floor(Math.random() * 6);
      var cell = document.getElementsByClassName(+ x + '-' + y)[side];
      var classesCell = cell.getAttribute('class').split(' ');
      if(!classesCell.includes('bodySnake') && !classesCell.includes('badFood') && !classesCell.includes('goodFood') && !classesCell.includes('life')){
        cell.classList.add('life');
        break;
      }
    }
  }

                                    // Создаём хорошую и плохую еду
  function createGoodFood(){
    for(i = 0; i < 6; i++){ // на все стороны куба
      var food = false;
      while(!food){
        var x = Math.floor(Math.random() * 18) + 1;
        var y = Math.floor(Math.random() * 18) + 1;
        var cell = document.getElementsByClassName(+ x + '-' + y)[i];
        var classesCell = cell.getAttribute('class').split(' ');
        if(!classesCell.includes('bodySnake') && !classesCell.includes('badFood')){
          cell.classList.add('goodFood');
          food = true;
        }
      }

      // if(countGoodFood > 12){       // не допускаем больше шести еды на куб
      //   while(true){
      //   var rand = Math.floor(Math.random() * 12)
      //   var del = document.getElementsByClassName('goodFood')[rand];
      //   var oneClassesCell = classesCell[1].split('-').join('');
      //   var classesDel = del.getAttribute('class').split(' ');
      //   var oneClassesDel = classesDel[1].split('-').join('');
      //   if(oneClassesCell != oneClassesDel){ // Проверяем чтобы не удалялась ячейка которая только появилась
      //     del.classList.remove('goodFood');
      //     break;
      //     }
      //   }
      // }
    }
  }

  function createBadFood(){
    for(i = 0; i < 6; i++){
      var food = false;
      while(!food){
        var x = Math.floor(Math.random() * 18) + 1;
        var y = Math.floor(Math.random() * 18) + 1;
        var cell = document.getElementsByClassName(+ x + '-' + y)[i];
        var classesCell = cell.getAttribute('class').split(' ');
        if(!classesCell.includes('bodySnake') && !classesCell.includes('goodFood')){
          cell.classList.add('badFood');
          countBadFood++;
          food = true;
        }
      }
      if(countBadFood > 12){       // не допускаем больше шести препятствий на куб
        while(true){
        var rand = Math.floor(Math.random() * 12)
        var del = document.getElementsByClassName('badFood')[rand];
        var oneClassesCell = classesCell[1].split('-').join('');
        var classesDel = del.getAttribute('class').split(' ');
        var oneClassesDel = classesDel[1].split('-').join('');
        if(oneClassesCell != oneClassesDel){ // Проверяем чтобы не удалялась ячейка которая только появилась
          del.classList.remove('badFood');
          break;
          }
        }
      }
    }
  }
                                        // Рисуем клетки на каждой стороне куба
  function createTable(sideCube){
    var side = document.getElementsByClassName('side')[k];
    for(var i = 0; i < lineLength; i++){
      var line = document.createElement('div');
      line.className = 'line ' + i;
      for(var j = 0; j < columnLength; j++){
        var column = document.createElement('div');
        column.className = 'column ' + j + '-' + i + ' ' + sideCube;
        line.appendChild(column);
      }
      side.appendChild(line);
    }
    k++;
  }

  function resultOnline(){
    var forScore = document.querySelector('.forScore');
    forScore.innerText = 'Колличество очков: ' + (score * 100);
  }
  function lifeOnline(){
    var forLife = document.querySelector('.forLife');
    forLife.innerText = 'Колличество жизней: ' + countLife;
  }

  function restartGame(){
    clearInterval(gameIsRunning);
    clearInterval(badFood);
    clearInterval(goodFood);
    var column = document.getElementsByClassName('column');
    for(var i = 0; i < column.length; i++){
      var clear = column[i].getAttribute('class').split(' ');
      column[i].className = clear[0] +' '+ clear[1] +' '+ clear[2];
    }
    alert('Конец игры\nВаш результат: ' + (score * 100));
    score = 0;
    resultOnline();
    direction = 'y+';
    countBadFood = 0;
    snake = [];
    startGame();
  }

  function theAnd(){
    alert('Конец игры\nВаш результат: ' + (score * 100));
    location.reload();
  }

  var rules = document.querySelector('.rules');
  rules.addEventListener('click', openToRules);
  var readRules = document.querySelector('.readRules');

  function openToRules(){
    if(!(readRules.classList.contains('rulesVisible'))){
      readRules.classList.add('rulesVisible');
    } else{
      readRules.classList.remove('rulesVisible');
    }
  }
}
