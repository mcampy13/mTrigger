
$(document).ready(function(){
      
      
      
      $(window).ready(function() {
            $(".loader").fadeOut("1000");
            $(".loadImage").fadeOut("1000");
            
     });
      
      /* affix the navbar after scroll below header */
     $('#nav').affix({
          
           offset: {
             top: $('header').height()/*-$("#nav").height()+$("#nav").height()*/
           }
           
     });
     
     
     
     /* highlight the top nav as scrolling occurs */
     $('body').scrollspy({ target: '#nav' })
     
     /* smooth scrolling for scroll to top */
     $('.scroll-top').click(function(){
       $('body,html').animate({scrollTop:0},1000);
        
     })
     
     /* smooth scrolling for nav sections */
     $('#nav .navbar-nav li>a').click(function(){
       var link = $(this).attr('href');
       var posi = $(link).offset().top;
       if (link=='#header') {
           posi=$(link).offset().top-20;
       }
       $('head,body,footer,html').animate({scrollTop:posi},800);
        event.preventDefault();   
            })
             
       });
       
       /*Close extended colapsed navbar menu when user clicks outside of the menu*/
       $(document).ready(function () {
         $(document).click(function(event) {
           $(".navbar-collapse").collapse('hide');
         });
       });
       
       /*Overlays texts over images*/
       $(document).ready(function(){
           $(".list > li").mouseenter(function() {
               $(this).find("div").fadeIn();
           }).mouseleave(function(){
                $(this).find("div").fadeOut();
      });
           
      /*script for sending form data to PHP document*/
            $('#submit').on('click', function() {
                  
                  var interest=document.getElementsByName('mTriggerInterest');
                  var fName = $('#fName').val();
                  var lName = $('#lName').val();
                  var Email = $('#Email').val();
                  var City = $('#City').val();
                  var State = $('#State').val();
                  var Comments = $('#Comments').val();
                  var mTriggerInterest = $('#mTriggerInterest').val();
                  var submit = $('#submit').val();
                  var dataString = 'fName=' + fName + '&lName=' + lName + '&Email=' + Email + '&City=' + City + '&State=' + State + '&Comments=' + Comments + '&mTriggerInterest=' +mTriggerInterest + '&submit=' + submit;
                  $.ajax({
                      type: "POST",
                      url: "emailForm.php",
                      data: dataString,
                      
                  });
            });
     
      
            //Disable submit button until first three forms are filed 
            
                $(document).ready(function (){
                    validate();
                    $('#fName, #lName, #Email').change(validate);
                });
                
                function validate(){
                    if ($('#fName').val().length   >   0   &&
                        $('#lName').val().length  >   0   &&
                        $('#Email').val().length    >   0) {
                        $("input[type=submit]").prop("disabled", false);
                    }
                    else {
                        $("input[type=submit]").prop("disabled", true);
                    }
                }
        
      /*JS to  hide excess text*/    
      $(function(){
            var animspeed = 950; // animation speed in milliseconds
           
            var $blockquote = $('.excessText');
            var height = $blockquote.height()+20;
            var mini = $('.excessText p').eq(0).height() /*+ $('.excessText p').eq(1).height() + $('.excessText p').eq(2).height() + $('.excessText p').eq(2).height()*/;
           
            $blockquote.attr('data-fullheight',height+'px');
            $blockquote.attr('data-miniheight',mini+'px');
            $blockquote.css('height',mini+'px');
            
            $('.expand').on('click', function(e){
            $text = $(this).prev();
         
            $text.animate({
              'height': $text.attr('data-fullheight')
            }, animspeed);
            $(this).next('.contract').removeClass('hide');
            $(this).addClass('hide');
            });
         
            $('.contract').on('click', function(e){
            $text = $(this).prev().prev();
         
            $text.animate({
              'height': $text.attr('data-miniheight')
            }, animspeed);
            $(this).prev('.expand').removeClass('hide');
            $(this).addClass('hide');
          });
        });
      
});