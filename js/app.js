// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();
var nopinimg = document.querySelectorAll('.nopin img');
 for(var i = 0; nopinimg.length; i++) {
   nopinimg[i].setAttribute('nopin', 'nopin');
 }
