 document.addEventListener("DOMContentLoaded",function(){
 	var nut=document.querySelectorAll(".chuyenslide ul li");
 	var slide=document.querySelectorAll(".cacslide ul li")
 	autoSlide();

 	var thoigian=setInterval(function(){ autoSlide()},4000);
 	
 	for (var i = 0; i < nut.length; i++) {

 		nut[i].addEventListener('click',function(){
 			clearInterval(thoigian);
 			for (var i = 0; i < nut.length; i++) {
 				nut[i].classList.remove("kichhoat");
 			}
 			this.classList.add("kichhoat");


 			var nutkichhoat=this;
 			var vitrinut=0;
 			for (var vitrinut = 0; nutkichhoat=nutkichhoat.previousElementSibling; vitrinut++) {
 			}
 			
 			for (var i = 0; i < slide.length; i++) {
 				slide[i].classList.remove("active");
 				slide[vitrinut].classList.add("active");
 			}
 			

 		})

 	}
 	

 	function autoSlide(){
 		var slideht =document.querySelector(".cacslide ul li.active");
 		var vitrislide=0;
 		for (var vitrislide = 0; slideht=slideht.previousElementSibling; vitrislide++) {
 			
 		}
 		if (vitrislide<(slide.length-1)) {

 			for (var i = 0; i < slide.length; i++) {
 				slide[i].classList.remove("active");
 				nut[i].classList.remove("kichhoat")
 			}
 			slide[vitrislide].nextElementSibling.classList.add("active");
 			nut[vitrislide].nextElementSibling.classList.add("kichhoat");
 		}else{
 			for (var i = 0; i < slide.length; i++) {
 				slide[i].classList.remove("active");
 				nut[i].classList.remove("kichhoat")
 			}
 			slide[0].classList.add("active");
 			nut[0].classList.add("kichhoat");
 		}
 	}
 	

 },false);