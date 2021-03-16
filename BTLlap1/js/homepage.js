$(function(){
	var a=$("#footer").offset().top;
      	console.log(a);
      $("#anhem").click(function() {
      	/* Stuff to do every *odd* time the element is clicked */
      	 $("#gacona").addClass('dadi')
      	$("body, html").animate({scrollTop: $("#footer").offset().top },$("#footer").offset().top);
      	return false;
      });

      $("#gacona").click(function() {
          $("#gacona").removeClass('dadi');
      	/* Stuff to do every *odd* time the element is clicked */
      	$("body, html").animate({scrollTop: 0});
      	return false;
      });


      
     var d1=$(".emtao").offset().top;
      console.log(d1);
      $(window).scroll(function(event) {
      var pos_body1 = $('html,body').scrollTop();
      if(pos_body1>=d1-400){
         $('.emtao').addClass('emtaodadi');
      }
      
   });

      var d=$(".anhday").offset().top;
      console.log(d);
      $(window).scroll(function(event) {
      var pos_body = $('html,body').scrollTop();
      if(pos_body>=d-400){
         $('.anhday').addClass('anhdaydadi');
      }
      
   });

var d2=$(".kohien").offset().top;
      console.log(d2);
      $(window).scroll(function(event) {
      var pos_bod = $('html,body').scrollTop();
      if(pos_bod>=d2-400){
         $('.kohien').addClass('kohiendadi');
      }
      
   });


    
});