(function() {
  var rotateX = 0;
  var rotateY = 0;
  document.onkeydown = function(e) {
    // console.log(e.keyCode);
    if(e.keyCode === 68) rotateY -= 4
    else if(e.keyCode === 83) rotateX += 4
    else if(e.keyCode === 65) rotateY += 4
    else if(e.keyCode === 87) rotateX -= 4
    document.querySelector('.cube').style.transform =
    'rotateY(' + rotateY + 'deg)'+'rotateX(' + rotateX + 'deg)';
  }
})();
