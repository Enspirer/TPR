$(document).ready(function(){

    $('.first-nav .nav-item').hover(function() {
        $(this).children('.nav-link').addClass('nav-hover');
    }, function(){
        $(this).children('.nav-link').removeClass('nav-hover');
    });


    $('.second-nav .nav-item').hover(function() {
        $(this).children('.line').css({'visibility' : 'visible', 'width' : '100%'});
    }, function(){
        $(this).children('.line').css({'visibility' : 'hidden', 'width' : '0'});
    });



    $('.small-heart').click(function(){
        
        $(".small-heart bi-heart").hide();
        $(".small-heart bi-heart-fill").show();
        
        $("i", this).toggle();
    });


    let color;

    $('#agent-tabs .nav-item').hover(function(){
        color = $(this).children('.nav-link').css('color');
        $(this).css('backgroundColor', color);
        $(this).children('.nav-link').css('color' , 'white');
    }, function(){
        $(this).css('backgroundColor', '');
        $(this).children('.nav-link').css('color' , color);
    });


    
    $('.collapse-button').click(function(){
        
        $(".bi bi-chevron-down").hide();
        $(".bi bi-chevron-up").show();
        
        $(".features i").toggle();
    });


    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()
});