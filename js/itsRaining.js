          // number of drops created.
var nbDrop = 858; 

// function to generate a random number range.
function randRange( minNum, maxNum) {
  return (Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum);
}

// function to generate drops
function createRain() {

	for( i=1;i<nbDrop;i++) {
	var dropLeft = randRange(0,1600);
	var dropTop = randRange(-1000,1400);

	$('.rain').append('<div class="drop" id="drop'+i+'"></div>');
	$('#drop'+i).css('left',dropLeft);
	$('#drop'+i).css('top',dropTop);
	}

}

function fadeInImage()
{
    $("#logo").delay(2000).fadeIn(8000,"swing");
}

function moveToCorner()
{
    $("#logo").animate({height: "80px", width: "auto", right: "+=700", bottom: "+=350"},'slow','linear');
}

$("#logo").hide();
$("#one").hide();
$("#two").hide();
$("#three").hide();


fadeInImage();
createRain();
moveToCorner();

$("#one").delay(11000).fadeIn(2500);
$("#one").fadeOut(2500);
$("#two").delay(17000).fadeIn(2500);
$("#two").fadeOut(2500);


$("#three").delay(23000).fadeIn(100);