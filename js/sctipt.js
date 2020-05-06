$( document ).ready(function() {
$('.news-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    nav:false,
    responsive:{
        0:{
            items:1,
        },
        900:{
            items:2,
        },
        1300:{
            items:3,
        }
    }
})

});
function Menu(x) {
    x.classList.toggle("change");
  }