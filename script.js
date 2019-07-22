var red = 0, green = 0, blu = 0,
  redstr = '',   greenstr = '',   blustr = '';

function decToHex(n){ return Number(n).toString(16); }

blu = 0;
red = 0;
green = 0;
var timerId = setTimeout(function time() {

  if (red < 16){
    redstr = '0' + decToHex(red);
  }
  else {
    redstr =  decToHex(red);
  };

  if (green < 16){
    greenstr = '0' + decToHex(green);
  }
  else {
    greenstr =  decToHex(green);
  };

  if (blu < 16){
    blustr = '0' + decToHex(blu);
  }
  else {
    blustr =  decToHex(blu);
  };

  red++;
  if (red == 256){
    green += 21;
    red = 0;
  }
  if (green == 252) {
    blu += 42;
    green = 0;
  }
  if (blu == 252) {
    blu = 0;
  }


  let number = '#' + redstr + greenstr + blustr;

  document.body.style.background = number;
  timerId = setTimeout(time,10);
},10);
