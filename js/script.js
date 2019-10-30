function scroll(val, el, timeout, step) {
    var i = 0;
    (function() {
      if (i <= val) {
        setTimeout(arguments.callee, timeout);
        document.getElementById(el).innerHTML = i;
        i = i + step;
      } else {
        document.getElementById(el).innerHTML = val;
      }
    })();
  }
  
scroll(6500, 'shethik-cifra1', 10, 30);
scroll(12, 'shethik-cifra2', 100, 1);
scroll(21, 'shethik-cifra3', 100, 1);
scroll(12, 'shethik-cifra4', 100, 1);
