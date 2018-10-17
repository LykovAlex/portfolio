var button = document.getElementById('button');
button.addEventListener('click', createBoardTable);
var cell = []; // ячейка
var points = [[],[],[],[]]; // матрица поля
var gamer = 'X'; // игрок который ходит
var goPlayer; // надпись которая выводит чей сейчас ход
var countSteps = 16; // колличество ходов

                                                   // Создаём игровое поле
function createBoardTable(){
  var boardPlay = document.createElement('div');
  boardPlay.className = 'boardPlay';

  goPlayer = document.createElement('p');
  goPlayer.innerText = 'Ходит игрок: ' + gamer;

  button.innerText = "Новая игра";
  button.removeEventListener('click', createBoardTable);
  button.addEventListener('click', restart);

  var wrap = document.getElementById('wrapper');
  wrap.appendChild(goPlayer);
  wrap.appendChild(boardPlay);
                              // Раскладываем поле по оси х у
  for(var i = 0; i < 16; i++){
    cell[i] = document.createElement('div');
    cell[i].className = 'cell';
    cell[i].setAttribute('x', i%4);
    cell[i].setAttribute('y', parseInt(i/4));
    boardPlay.appendChild(cell[i]);
                              // вешаем событие на каждую клетку
    cell[i].addEventListener('click', move);
  }

}
                                                  // Обрабатываем событие клика по игровому полю

  function move(){
                             // Проверяем ячейку на наличие символов
    if(this.innerText == '') {
      this.innerText = gamer;
    } else {
      alert('Поле уже занято!');
      return;
    }
    countSteps--;
                              // С помощью атрибутов узнаём координаты активной клетки
    var x = this.getAttribute('x');
    var y = this.getAttribute('y');
    this.setAttribute('point', gamer);
    points[x][y] = this.getAttribute('point');
                              // Отрисовываем условия при которых игрок выигрывает
    if((points[0][y] == gamer) && (points[1][y] == gamer) && (points[2][y] == gamer) && (points[3][y] == gamer) ||
      (points[x][0] == gamer) && (points[x][1] == gamer) && (points[x][2] == gamer) && (points[x][3] == gamer) ||
      (points[0][0] == gamer) && (points[1][1] == gamer) && (points[2][2] == gamer) && (points[3][3] == gamer) ||
      (points[0][3] == gamer) && (points[1][2] == gamer) && (points[2][1] == gamer) && (points[3][0] == gamer)) {

      theAnd('Победили: ' + gamer + '\nЖелаете сыграть ещё ?');
      return;
    }
    if(!countSteps){
      theAnd('Ничья \nЖелаете сыграть ещё ?');
      return;
    }
                                         // Меняем игроков
    changePlayer();
  }



function changePlayer(){
  if(gamer == 'X') {
    gamer = 'O';
    goPlayer.innerText = 'Ходит игрок: ' + gamer;
  } else {
    gamer = 'X';
    goPlayer.innerText = 'Ходит игрок: ' + gamer;
  }
}

function theAnd(text){
  if(confirm(text)) {
    restart();
  } else {
    location.reload();
  }
}

function restart() {
  gamer = 'X';
  goPlayer.innerText = 'Ходит игрок: ' + gamer;
  points = [[],[],[],[]];
  countSteps = 16;
  for(i = 0; i < cell.length; i++){
    cell[i].innerText = '';
  }
}
