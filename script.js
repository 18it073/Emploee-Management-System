function timeToString(time) {
  let diffInHrs = time / 3600000;
  let hh = Math.floor(diffInHrs);

  let diffInMin = (diffInHrs - hh) * 60;
  let mm = Math.floor(diffInMin);

  let diffInSec = (diffInMin - mm) * 60;
  let ss = Math.floor(diffInSec);

  let diffInMs = (diffInSec - ss) * 100;
  let ms = Math.floor(diffInMs);

  let formattedMM = mm.toString().padStart(2, "0");
  let formattedSS = ss.toString().padStart(2, "0");
  let formattedMS = ms.toString().padStart(2, "0");

  return `${formattedMM}:${formattedSS}:${formattedMS}`;
}

// Declare variables to use in our functions below

let startTime;
let elapsedTime = 0;
let timerInterval;

// Create function to modify innerHTML

function print(txt) {
  document.getElementById("display").innerHTML = txt;
}

// Create "start", "pause" and "reset" functions

function start() {
  startTime = Date.now() - elapsedTime;
  timerInterval = setInterval(function printTime() {
    elapsedTime = Date.now() - startTime;
    print(timeToString(elapsedTime));
  }, 10);
  showButton("PAUSE");
}

function pause() {
  clearInterval(timerInterval);
  showButton("PLAY");
}

function reset() {
  clearInterval(timerInterval);
  print("00:00:00");
  elapsedTime = 0;
  showButton("PLAY");
}
function checkinf()
{
  
  $.ajax({
            url: 'insert_timesheet.php',
            type:'post',
            data:{"type":"checkin"}  
          }).done(function(data) {
       console.log(data);
        window.location="index.php";
  });
  showButton("Breakin");
}
function breakinf()
{
  
  clearInterval(timerInterval);
  $.ajax({
            url: 'insert_timesheet.php',
            type:'post',
            data:{"type":"breakin"}  
          }).done(function(data) {
       console.log(data);
       window.location="index.php";
  });
  showBreakinButton("Breakout");
}
function breakoutf()
{
  
  
  $.ajax({
            url: 'insert_timesheet.php',
            type:'post',
            data:{"type":"breakout"}  
          }).done(function(data) {
         console.log(data);
         window.location="index.php";
  });
  showBreakoutButton("Breakin");
}
function checkoutf()
{
  
  clearInterval(timerInterval);
  checkin.style.display="none";
  breakin.style.display="none";
  breakout.style.display="none";
  checkout.style.display="none";
  displaymsg.style.display="inline-block";
  $.ajax({
              url: 'insert_timesheet.php',
              type:'post',
              data:{"type":"checkout"}  
            }).done(function(data) {
         console.log(data);
         window.location="index.php";
    });

}


// Create function to display buttons

function showButton(buttonKey) {
  const buttonToShow = buttonKey === "Breakin" ? breakin : checkin;
  const buttonToHide = buttonKey === "Breakin" ? checkin : breakin;
  buttonToShow.style.visibility = "visible";
  buttonToHide.style.visibility = "hidden";
}
function showBreakinButton(buttonKey) {
  const buttonToShow = buttonKey === "Breakout" ? breakout : breakin;
  const buttonToHide = buttonKey === "Breakout" ? breakin : breakout;
  buttonToShow.style.visibility = "visible";
  buttonToHide.style.visibility = "hidden";
}
function showBreakoutButton(buttonKey) {
  const buttonToShow = buttonKey === "Breakin" ? breakin : breakout;
  const buttonToHide = buttonKey === "Breakin" ? breakout : breakin;
  buttonToShow.style.visibility = "visible";
  buttonToHide.style.visibility = "hidden";
}

// Create event listeners

/*let playButton = document.getElementById("playButton");
let pauseButton = document.getElementById("pauseButton");
let resetButton = document.getElementById("resetButton");

playButton.addEventListener("click", start);
pauseButton.addEventListener("click", pause);
resetButton.addEventListener("click", reset);*/


let checkin = document.getElementById("checkin");
let breakin = document.getElementById("breakin");
let breakout = document.getElementById("breakout");
let checkout = document.getElementById("checkout");
let displaymsg = document.getElementById("displaymsg");

checkin.addEventListener("click", checkinf);
breakin.addEventListener("click", breakinf);
breakout.addEventListener("click", breakoutf);
checkout.addEventListener("click", checkoutf);




