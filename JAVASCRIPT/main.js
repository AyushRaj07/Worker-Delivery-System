var shiftWindow = function() { scrollBy(0, -80) };
if (location.hash) shiftWindow();
window.addEventListener("hashchange", shiftWindow);

var slide = document.getElementById("slide");
var up = document.getElementById("up");
var down = document.getElementById("down");

let x = 0;

up.onclick = function()
{   
    if(x > "-900"){
        x = x - 300;
        slide.style.top = x + "px";
    }
    
}

down.onclick = function()
{   
    if(x < "0"){
        x = x + 300;
        slide.style.top = x + "px";
    }
    
}