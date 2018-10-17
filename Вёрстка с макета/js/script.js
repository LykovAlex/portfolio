$(document).ready(function() {

var time1 = 4,
time2 = 3,
count1 = 0,
count2 = 0,
numb1 = '.numbersCounter',
numb2 = '.thousend',
obj1 = 'p',
obj2 = 'span';

counter(count1, numb1, obj1, time1);
counter(count2, numb2, obj2, time2);

function counter(count, numb, obj, time){
    $(window).scroll(function(){
      $('.counter').each(function(){
        var counterPosition = $(this).offset().top;
        var topWindow = $(window).scrollTop();
        if(counterPosition < topWindow + 400){
          if(count < 1){
            $(numb).addClass('vizible');
            $(obj).each(function(){
            var currentNumber = 1;
            var maxNumber = $(this).attr('count');
            var step = 1000 * time / maxNumber;
            var that = $(this);
            var interval = setInterval(function(){
              if(currentNumber <= maxNumber){
                that.text(currentNumber);
              } else {
                count++;
                clearInterval(interval);
              }
               currentNumber++;
             }, step);
           });
          };
        };
      });
    });
  }

$('.menuIcon').click(function(){
  if($('.sectionMobileMenu').is(':visible')){
    $(this).removeClass('menuButtonActiv')
    $('.sectionMobileMenu').fadeOut(600);
    $('.headerForSlider').css('display', 'block');
} else{
    $(this).addClass('menuButtonActiv')
    $('.sectionMobileMenu').fadeIn(600);
    $('.headerForSlider').css('display', 'none');
  }
})

if(matchMedia){
  var screenWindow = window.matchMedia('(min-width:992px)');
  screenWindow.addListener(changes);
  changes(screenWindow);
}
function changes(screenWindow){
  if(screenWindow.matches){
    $('.sectionMobileMenu').fadeOut(600);
    $('.headerForSlider').css('display', 'block');
    $('.menuIcon').removeClass('menuButtonActiv')
  }
}

var post = document.querySelectorAll('.post');
  for(var i = 0; i < post.length; i++){
    post[i].addEventListener('mouseover', changePostInFooter);
    post[i].addEventListener('mouseout', changePostBackInFooter);
  }

var logo = document.querySelector('.logo');
logo.addEventListener('mouseover', changeIcon);
logo.addEventListener('mouseout', changeIconBack);

var cart = document.querySelector('.cart');
cart.addEventListener('mouseover', changeIcon);
cart.addEventListener('mouseout', changeIconBack);

var search = document.querySelector('.search');
search.addEventListener('mouseover', changeIcon);
search.addEventListener('mouseout', changeIconBack);

var sectionServices = document.querySelectorAll('.sectionServices');
for(var i = 0; i < sectionServices.length; i++){
  sectionServices[i].addEventListener('mouseover', changeSectionServices);
  sectionServices[i].addEventListener('mouseout', changeSectionServicesBack);
}

var project = document.querySelectorAll('.figure');
for(i = 0; i < project.length; i++){
  project[i].addEventListener('mouseover', changeProject);
  project[i].addEventListener('mouseout', changeProjectBack);
}

var posts = document.querySelectorAll('.figurePosts');
for(i = 0; i < posts.length; i++){
  posts[i].addEventListener('mouseover', changePosts);
  posts[i].addEventListener('mouseout', changePostsBack);
}

function changePosts(){
  var img = this.children[0];
  img.classList.add('imgProjectMouseOver');
  var date = this.children[1].children[0];
  date.classList.add('dayLite');
  var month = this.children[1].children[1];
  month.classList.add('monthLite')
  var figcaptionForPosts = this.children[2];
  figcaptionForPosts.classList.add('figcaptionForPostsDark');
  var headPosts = this.children[2].children[0];
  headPosts.classList.add('headPostsLite');
  var textPosts = this.children[2].children[1];
  textPosts.classList.add('textPostsLite');
}

function changePostsBack(){
  var img = this.children[0];
  img.classList.remove('imgProjectMouseOver');
  var date = this.children[1].children[0];
  date.classList.remove('dayLite');
  var month = this.children[1].children[1];
  month.classList.remove('monthLite')
  var figcaptionForPosts = this.children[2];
  figcaptionForPosts.classList.remove('figcaptionForPostsDark');
  var headPosts = this.children[2].children[0];
  headPosts.classList.remove('headPostsLite');
  var textPosts = this.children[2].children[1];
  textPosts.classList.remove('textPostsLite');
}

var left = document.querySelector('.iconArrowleft');
left.addEventListener('click', lastSlide);
var right = document.querySelector('.iconArrowRight');
right.addEventListener('click', nextSlide);
var j = 0;

function lastSlide(){
  var last = posts[j];
  changePostsBack.call(last);
  j--;
  if(j < 0){
    j = 2;
  }
  var next = posts[j];
  changePosts.call(next);
}
function nextSlide(){
  var last = posts[j];
  changePostsBack.call(last);
  j++;
  if(j > 2){
    j = 0;
  }
  var next = posts[j];
  changePosts.call(next);
}
function changePostInFooter(){
  this.children[0].classList.add('subtitleMouseOver');
  this.children[1].classList.add('textMouseOver');
}
function changePostBackInFooter(){
  this.children[0].classList.remove('subtitleMouseOver');
  this.children[1].classList.remove('textMouseOver');
}

function changeProject(){
  var img = this.children[0];
  img.classList.add('imgProjectMouseOver');
  var arrow = this.children[1].children[0];
  arrow.setAttribute('src', 'image/arrowDark.png');
  var figcaption = this.children[1].style.backgroundColor='#362f2d';
  var headProject = this.children[1].children[1];
  headProject.style.color='white';
  var textProject = this.children[1].children[2];
  textProject.style.color='#c7b299';
}
function changeProjectBack(){
  var img = this.children[0];
  img.classList.remove('imgProjectMouseOver');
  var arrow = this.children[1].children[0];
  arrow.setAttribute('src', 'image/arrow.png');
  var figcaption = this.children[1].style.backgroundColor='#fbfaf8';
  var headProject = this.children[1].children[1];
  headProject.style.color='#c7b299';
  var textProject = this.children[1].children[2];
  textProject.style.color='#d1d1d1';
}

function changeSectionServices(){
  var src = this.children[0].getAttribute('src').split('/')[1].split('')[0] + 'a';
  var newSrc = 'image/' + src + '.png';
  this.children[0].setAttribute('src', newSrc);
  this.children[1].style.color = '#c7b299';
  this.children[2].innerText = 'Lorem ipsum dolor sit amet, adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.'
  this.children[3].style.backgroundColor = '#c7b299';
}
function changeSectionServicesBack(){
  var src = this.children[0].getAttribute('src').split('/')[1].split('')[0];
  var newSrc = 'image/' + src + '.png';
  this.children[0].setAttribute('src', newSrc);
  this.children[1].style.color = '#606060';
  this.children[2].innerText = 'Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.'
  this.children[3].style.backgroundColor = '#f1eee9';
}

 function changeIcon(e){
  var src = e.target.getAttribute('src').split('-')[1] = 1;
  var oneSrc = e.target.getAttribute('src').split('-')[0].split('/')[1];
  var newSrc = 'image/' + oneSrc + '-' + src + '.png';
  e.target.setAttribute('src', newSrc);
 }
 function changeIconBack(e){
  var src = e.target.getAttribute('src').split('-')[1] = 0;
  var oneSrc = e.target.getAttribute('src').split('-')[0].split('/')[1];
  var newSrc = 'image/' + oneSrc + '-' + src + '.png';
  e.target.setAttribute('src', newSrc);
 }

});
