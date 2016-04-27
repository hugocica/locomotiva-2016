/*
* jQuery Raptorize Plugin 1.0
* www.ZURB.com/playground
* Copyright 2010, ZURB
* Free to use under the MIT license.
* http://www.opensource.org/licenses/mit-license.php
*
* Cagerize Version
* Author Evandro Carreira
*
* Modified: 06/2014
* Cagerize with Evandrose Version
* By Andre Cupini
*/


(function($) {

  $(document).ready(function(){

    rougeanusimg = $('<img />',
     { id: 'rougeanus',
     src: templateDir+'/images/rougeanus.png', 
     //alt:'Hello, I am Nicolaus, please to meet you!'})
     alt:'Hello, I am Rougeanus Bealissimas with Daniose nervous, please to meet you!'})
    .appendTo($('body'));

    //Append Nicolaus and Style
    rougeanus = $('#rougeanus');
    rougeanus.css({
      "position":"fixed",
      "top": "25%",
      "left" : "0",
      "display" : "none"
    });

  });
  // Animating Code
  function executeOnKonami() {
    rougeanus.fadeIn('fast');
    // Movement Hilarity
    var movement_left = $(window).width() / 0.5;
    rougeanus.animate({
      "left" : "+="+movement_left+'px'
      },
      {
        duration: 12000,
        complete: function() {
          rougeanus.css({
                    "left" : "0",
                    "display" :"none"
                  });
          }
      });
  }
  neededkeys = [38,38,40,40,37,39,37,39,66,65], started = false, count = 0;

  $(document).keydown(function(e){
    key = e.keyCode;
    //Set start to true only if having pressed the first key in the konami sequence.
    if(!started){
      if(key == 38){
        started = true;
      }
    }
    //If we've started, pay attention to key presses, looking for right sequence.
    if(started){
      if(neededkeys[count] == key){
        //We're good so far.
        count++;
      } else {
        //Oops, not the right sequence, lets restart from the top.
        reset();
      }
      if(count == 10){
        //We made it! Put code here to do what you want when successfully execute konami sequence
        executeOnKonami();
        //Reset the conditions so that someone can do it all again.
        reset();
      }
    } else {
      //Oops.
      reset();
    }
  });
  //Function used to reset us back to starting point.
  function reset() {
    started = false; count = 0;
    return;
  }

})(jQuery);

