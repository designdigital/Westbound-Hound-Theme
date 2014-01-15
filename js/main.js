$(document).ready(function(){
  var $container = $('.all-posts');
  // initialize
  $container.packery({
    itemSelector: '.post-all'
  });
});