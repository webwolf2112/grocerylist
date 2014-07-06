var jumping = false;
function jump() {
                        
  if (!jumping) {
    jumping = true;
    setTimeout(land, 500);
    
  }
}

function land() {
                        
  jumping = false;
}



function draw(){
   
   


var images = [];

loadImage("body");
loadImage("left-arm");
loadImage("right-arm");
loadImage("left-leg");
loadImage("right-leg");
loadImage("top-hat");


function drawSmiley(){
	context.beginPath();
	context.arc(335, 175, 25, 50, Math.PI, false);
	context.strokeStyle = "#000000";
	context.stroke();

}

function drawEllipse(centerX, centerY, width, height) {
	
  context.beginPath();
  
  context.moveTo(centerX, centerY - height/2);
  
  context.bezierCurveTo(
    centerX + width/2, centerY - height/2,
    centerX + width/2, centerY + height/2,
    centerX, centerY + height/2);

  context.bezierCurveTo(
    centerX - width/2, centerY + height/2,
    centerX - width/2, centerY - height/2,
    centerX, centerY - height/2);
 
  context.fillStyle = "black";
  context.fill();
  context.closePath();	
}
  
  
function loadImage(name) {

  images[name] = new Image();
  images[name].onload = function() { 
      resourceLoaded();
  }
  images[name].src = "/games/images/" + name + ".png";
}
  
  
 var totalResources = 6;
var numResourcesLoaded = 0;
var fps = 30;

function resourceLoaded() {

  numResourcesLoaded += 1;
  if(numResourcesLoaded === totalResources) {
    setInterval(redraw, 1000 / fps);
  }
}
  

var canvas = document.getElementById('canvas');
var context = canvas.getContext("2d");
var img = document.getElementById("body");


  
var charX = 245;
var charY = 185;
  
function redraw() {

  var x = charX;
  var y = charY;


                      
  context.drawImage(images["right-leg"], x + 110, y + 60);
  context.drawImage(images["left-leg"], x + 15 , y + 60);
  context.drawImage(images["left-arm"], x -50,y -20  );
  context.drawImage(images["right-arm"], x + 170, y -10);
  context.drawImage(images["body"], x - 10, y - 125 );
  if(jumping){
  
  context.drawImage(images["top-hat"], x + 40, y - 190);
 	}
  else{
  context.drawImage(images["top-hat"], x + 40, y - 170);}
   drawEllipse(x + 67, y - 58 , 20, 30); // Left Eye
  	drawEllipse(x +110, y -58 , 20, 30);
  	drawSmiley();
  	
}

};


window.onload = draw;
  