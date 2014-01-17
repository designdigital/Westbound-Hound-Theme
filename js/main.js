$(document).ready(function(){
  var $container = $('.all-posts');

  // initialize Packery after all images have loaded
  $container.imagesLoaded( function() {
    $container.packery({
      // options...
      itemSelector: '.post-all'
    });
  });
});