'use strict';

var tinderContainer = document.querySelector('.tinder');
var allCards = document.querySelectorAll('.tinder--card');
var nope = document.getElementById('nope');
var love = document.getElementById('love');

//ajax call to like, dislike or match users
function swipe_action(id,username,love) {
			
			//alert(id);
			$.ajax({
				type: 'post',
				url: '../action/match_action.php',
				data: {
          'love': love,
					'liked_users_id': id,
          'liked_users_name': username
				},
				cache: false,
				success:async function(data) {
          if(data.substring(0,4)=="true"){
					var match_id=await userModule.getUserIdByEmail(data.substring(5)).
            then(result=> {return parseInt(result.id)});
            alertify.notify('you matched '+username, 'success', 5, function() {
                console.log('matched');
            });
            dialogModule.createDialog(match_id);
          }else{
            alertify.notify(data, 'message', 5, function() {
                console.log('not match yet');
            });
            console.log(data);
          }
				}
			});
		}
function initCards(card, index) {
  var newCards = document.querySelectorAll('.tinder--card:not(.removed)');
  //arrange cards in order of their index
  newCards.forEach(function (card, index) {
    card.style.zIndex = allCards.length - index;
    card.style.transform = 'scale(' + (20 - index) / 20 + ') translateY(-' + 30 * index + 'px)';
    card.style.opacity = (10 - index) / 10;
  });
  
  tinderContainer.classList.add('loaded');
}

initCards();

allCards.forEach(function (el) {
  var hammertime = new Hammer(el);
  //moves object in the direction of swipe
  hammertime.on('pan', function (event) {
    el.classList.add('moving');
  });

  hammertime.on('pan', function (event) {
    if (event.deltaX === 0) return;
    if (event.center.x === 0 && event.center.y === 0) return;

    tinderContainer.classList.toggle('tinder_love', event.deltaX > 0);
    tinderContainer.classList.toggle('tinder_nope', event.deltaX < 0);

    var xMulti = event.deltaX * 0.03;
    var yMulti = event.deltaY / 80;
    var rotate = xMulti * yMulti;

    event.target.style.transform = 'translate(' + event.deltaX + 'px, ' + event.deltaY + 'px) rotate(' + rotate + 'deg)';
  });

  hammertime.on('panend', function (event) {
    el.classList.remove('moving');
    tinderContainer.classList.remove('tinder_love');
    tinderContainer.classList.remove('tinder_nope');

    var moveOutWidth = document.body.clientWidth;
    var keep = Math.abs(event.deltaX) < 80 || Math.abs(event.velocityX) < 0.5;

    event.target.classList.toggle('removed', !keep);

    if (keep) {
      event.target.style.transform = '';
    } else {
      var endX = Math.max(Math.abs(event.velocityX) * moveOutWidth, moveOutWidth);
      var toX = event.deltaX > 0 ? endX : -endX;
      var endY = Math.abs(event.velocityY) * moveOutWidth;
      var toY = event.deltaY > 0 ? endY : -endY;
      var xMulti = event.deltaX * 0.03;
      var yMulti = event.deltaY / 80;
      var rotate = xMulti * yMulti;
      var cards = document.querySelectorAll('.tinder--card:not(.removed)');
      var card = cards[0];
      var cardID= el.children[2].value;
      var cardname= el.children[3].value;
      if(event.deltaX>80){
        console.log('liked person '+cardname);
        swipe_action(cardID,cardname,1);
      }else if(event.deltaX<-80){
        console.log('disliked person '+cardname);
        swipe_action(cardID, cardname,0);
      }
      event.target.style.transform = 'translate(' + toX + 'px, ' + (toY + event.deltaY) + 'px) rotate(' + rotate + 'deg)';
      initCards();
    }
  });
});

function createButtonListener(love) {
  return function (event) {
    var cards = document.querySelectorAll('.tinder--card:not(.removed)');
    //body.clientWidth is the entire width of the browser
    var moveOutWidth = document.body.clientWidth * 1.5;

    if (!cards.length) return false;

    var card = cards[0];

    card.classList.add('removed');
    //gets the id of the card in front of pile
    let cardId= card.children[2].value;
    let cardname= card.children[3].value;
    if (love) {
      //keep card at the far right of screen=> out the width of the browser screen
      card.style.transform = 'translate(' + moveOutWidth + 'px, -100px) rotate(-30deg)';
      console.log('liked person '+cardname);
      swipe_action(cardId,cardname,1);
    } else {
      //keep card at the far left of screen=> out the width of the browser screen
      card.style.transform = 'translate(-' + moveOutWidth + 'px, -100px) rotate(30deg)';
      console.log('not my type '+cardname);
      swipe_action(cardId,cardname,0);
    }

    initCards();

    event.preventDefault();
  };
}

var nopeListener = createButtonListener(false);
var loveListener = createButtonListener(true);

nope.addEventListener('click', nopeListener);
love.addEventListener('click', loveListener);
