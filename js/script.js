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
  
scroll(6500, 'shethik-cifra1', 20, 30);
scroll(12, 'shethik-cifra2', 300, 1);
scroll(21, 'shethik-cifra3', 250, 1);
scroll(12, 'shethik-cifra4', 300, 1);
