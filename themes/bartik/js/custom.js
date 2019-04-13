$(document).ready(function () {

$("#cemail").change(function () {
  var username = $("#cemail").val();
  $.ajax({url: "verifyusername?username="+username, success: function(result){
	if(result == 'Username already exits'){
	   $('.error_div').show();
	   isValid = false;
	   $('.error_div').text(username+", "+result);
	   $( "#cemail" ).val('');
	   $( "#cemail" ).focus(); 						
	}else{
	   $('.error_div').hide();
	   $('.error_div').text("");
$("#cusername").val(username);		 	
	   $(".next_btn").attr("disabled", false);		
	}
  }});
});

$('#cpass, #cnfpass').change(function () {
  var pass = $('#cpass').val();
  var cpass = $('#cnfpass').val();
  if(pass != '' && cpass != ''){ 
     if(pass == cpass) {
	var verifypass = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*])[a-zA-Z0-9!@#$%&*]+$");
	if(verifypass.test(cpass)){
	   $('.error_div').hide(); $('.error_div').text("");
	}else{
	   $('.error_div').show(); isValid = false;
	   $('.error_div').text("You have to enter at least 6 digit Password. consists of 1 number, 1 special character");
        }
     }else {
       $('.error_div').show();
       isValid = false;
       $('.error_div').text("Password missmatch");
       $('#cpass').val(''); $('#cnfpass').val('');
       $('#cpass').focus();		
    }
  }
});

$("#cemail").change(function () {
  var username = $("#cemail").val();
  $.ajax({url: "verifyusername?username="+username, success: function(result){
        if(result == 'Username already exits'){
           $('.error_div').show();
           isValid = false;
           $('.error_div').text(username+", "+result);
           $( "#cemail" ).val('');
           $( "#cemail" ).focus();
        }else{
           $('.error_div').hide();
           $('.error_div').text("");                  
           $(".next_btn").attr("disabled", false);
        }
  }});
});


jQuery(".img-wrapper").each(function () {
   var imageUrl = jQuery(this).find('img').attr("src");
   jQuery(this).find('img').css("visibility", "hidden");
   jQuery(this).css('background-image', 'url(' + imageUrl + ')').css("background-repeat", "no-repeat").css("background-size", "cover").css("background-position", "50% 50%");
});

//learn more link clikc
$('.learn_more_link').on("click",function(e){
   e.preventDefault();
   $('.learn_more').toggle();
   if($(this).text()=='+ Read More'){
	$(this).text('- Read Less');
   }else{
	$(this).text('+ Read More');
   }
});

//mobile menu
$('.mobile-menu').on("click",function(e){
  e.preventDefault();
  $('header').toggleClass('open');
  $('body').toggleClass('overflow')
});

//membship plan more membership_more_details
$('.membership_more_details').on("click",function(e){
   e.preventDefault();
   $(this).prev().toggle();
});

//add ticket read More
$('.ticket_selection .link').on("click",function(e){
    e.preventDefault();
    $(this).parent().next().toggle();
    if($(this).text()=='+Read More'){
      $(this).addClass('open');
      $(this).text('-Read Less');
    }else{
      $(this).removeClass('open');
      $(this).text('+Read More');
    }
});

//selet no of ticket up
$(".number-input button.up").bind('keyup mouseup', function () {
    this.parentNode.querySelector('input[type=number]').stepUp();
    var $val=$(this).parent().find('input[type=number]').val();
    var $head=$(this).closest('article').find('.perhead').val();
    var $tot=$val*$head;
    $(this).parent().next().find('.tothead').val($tot);
    var sum=0;
    $('.tothead').each(function() {
        sum += Number($(this).val());
    });
    $('.tosum').val(sum);
});
//selet no of ticket down
  $(".number-input button.down").bind('keyup mouseup', function () {
  this.parentNode.querySelector('input[type=number]').stepDown()
  var $val=$(this).parent().find('input[type=number]').val();
  var $head=$(this).closest('article').find('.perhead').val();
  var $tot=$val*$head;
    $(this).parent().next().find('.tothead').val($tot);
    var sum=0;
    $('.tothead').each(function() {
        sum += Number($(this).val());
    });
    $('.tosum').val(sum);
});

$('.quantity').on('change keyup  ',function(){
  var $val=$(this).val();
  var $head=$(this).closest('article').find('.perhead').val();
  var $tot=$val*$head;
    $(this).parent().next().find('.tothead').val($tot);
    var sum=0;
    $('.tothead').each(function() {
        sum += Number($(this).val());
    });
    $('.tosum').val(sum);
});
  //datepicker
  if ($(window).width()<767 ){
    $( ".datepicker" ).datepicker({
        numberOfMonths: 1,
         minDate: new Date(),
         altField: '#ticketDate',
          altFormat: 'd M'
      });
  }else{
    $( ".datepicker" ).datepicker({
        numberOfMonths: 2,
         minDate: new Date(),
         altField: '#ticketDate',
          altFormat: 'd M'
      });
 }




//slick slider musuem list
var  $form= $('.museum_wrap');

$form.slick({
  centerMode: true,
  slidesToShow: 4.7,
  dots:false,
  autoplay:false,
  loop:true,
  responsive: [

    {
      breakpoint: 1700,
      settings: {
        slidesToShow: 3.7
      }
    },
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 2.7
      }
    },
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});


var current = window.location.hash.substr(1);;
if(current !=''){
$('.museum_wrap').slick('slickGoTo', current-1);
$('.museum_wrap .slide').removeClass('active ');
setInterval(function(){
  $form.css('visibility','visible');
  $('.museum_wrap .slide[data-attr = '+current+']').addClass('active ');
}, 500);

}

else{
 $form.css('visibility','visible');
 $('.slick-current').addClass('active');
}



//ticket booking next button click
 $('.next_btn').on("click",function(e){
   e.preventDefault();
   var index=$('.panel:visible').index();
   var curStep=$("div.panel").not(":hidden");
   var textVal = curStep.find(".textval");
   var Select=curStep.find(".select_val");
   var catVal=curStep.find(".choosen");
   var isValid = true;

     //checkbox validation
      if(catVal.length>0){
        if (curStep.find(".choosen:checked").length ==catVal.length)
          {
              $('.error_div').hide();isValid = true;
          }
          else
          {
                $('.error_div').show();isValid = false;
                $(window).scrollTop($('.error_div').offset().top-200);
          }
      }

        //select box validation
        curStep.find(".select_val").removeClass("has-error");

        for(var i=0; i<Select.length; i++){
            var selectValue=Select[i].value;
            if(selectValue==' '){
                isValid = false;
                $(Select[i]).addClass("has-error");
                $('.error_div').show();
                $(window).scrollTop($('.error_div').offset().top-200);
            }
        }

        //textbox validation
          curStep.find(".textval").removeClass("has-error");
          for(var i=0; i<textVal.length; i++){
              var textValue=textVal[i].value;
              if(textValue==''){
                  isValid = false;
                   $(textVal[i]).addClass("has-error");
                   $('.error_div').show();
                   $(window).scrollTop($('.error_div').offset().top-200);
              }
          }

        if (isValid){
          curStep.find(".textval").removeClass("has-error");
          curStep.find(".select_val").removeClass("has-error");
          $('.panel').removeClass("active");
          $('.panel').eq(index+1).addClass("active");
          $(window).scrollTop($('.panel').eq(index+1).offset().top-200);
          $('.widget_head ul li').eq(index+1).addClass("active");
          $('.widget_head ul li').eq(index).addClass("show");
          if((index+1)==1){
              $('.section2').show();
          }
          else{
              $('.section2').hide();
          }
          //payment success
          if(index==3){
            $('.widget_head').hide();
            $('.login_div').hide();
          }
        }

 });
 //ticket booking li redirect
 $('.widget_head ul li').not('.submitbtn').on("click",function(e){
    e.preventDefault();
    var index=$(this).index();

    var curStep=$("div.panel").not(":hidden");
    var textVal = curStep.find(".textval");
    var Select=curStep.find(".select_val");
    var catVal=curStep.find(".choosen");
    var isValid = true;


      //checkbox validation
       if(catVal.length>0){
         if (curStep.find(".choosen:checked").length ==catVal.length)
           {
               $('.error_div').hide();isValid = true;
           }
           else
           {
                 $('.error_div').show();isValid = false;
                 $(window).scrollTop($('.error_div').offset().top-200);
           }
       }

    //select box validation
    curStep.find(".select_val").removeClass("has-error");

    for(var i=0; i<Select.length; i++){
        var selectValue=Select[i].value;
        if(selectValue==' '){
            isValid = false;
            $(Select[i]).addClass("has-error");
             $('.error_div').show();
            $(window).scrollTop($('.error_div').offset().top-200);
        }
    }

    //textbox validation
      curStep.find(".textval").removeClass("has-error");
      for(var i=0; i<textVal.length; i++){
          var textValue=textVal[i].value;
          if(textValue==''){
              isValid = false;
               $(textVal[i]).addClass("has-error");
                $('.error_div').show();
               $(window).scrollTop($('.error_div').offset().top-200);
          }
      }

      if (isValid){
        curStep.find(".textval").removeClass("has-error");
        curStep.find(".select_val").removeClass("has-error");
        $('.panel').removeClass("active");
        $('.panel').eq(index).addClass("active");
        $(window).scrollTop($('.panel').eq(index).offset().top-100);
        if((index)==1){
            $('.section2').show();
        }
        else{
            $('.section2').hide();
        }
      }
 });

 //change date time
 $('#change_date_time').on("click",function(e){
    e.preventDefault();
    $('.panel').removeClass("active");
     $('.panel').eq(0).addClass("active");
});

//change information for ticket bookimg
$('#your_information').on("click",function(e){
   e.preventDefault();
   $('.panel').removeClass("active");
    $('.panel').eq(2).addClass("active");
});

//change ticket
$('#change_tiket').on("click",function(e){
   e.preventDefault();
   $('.panel').removeClass("active");
    $('.panel').eq(1).addClass("active");
});

//membership plan next button click
$('#membeship_next_btn').on("click",function(e){
   e.preventDefault();
   var index=$('.panel:visible').index();

   var curStep=$("div.panel").not(":hidden");
   var textVal = curStep.find(".textval");
   var Select=curStep.find(".select_val");
   var radioVal=curStep.find(".radiobtn");
   var catVal=curStep.find(".choosen");
   var isValid = true;

   //checkbox validation
   if(catVal.length>0){
      if (curStep.find(".choosen:checked").length ==catVal.length){
                $('.error_div').hide();isValid = true;
      }else{
                  $('.error_div').show();isValid = false;
                  $(window).scrollTop($('.error_div').offset().top+300);
      }
   }

   //radio validation
   if(radioVal.length>0){
      if (curStep.find(".radiobtn:checked").length ==1){
                $('.error_div').hide();isValid = true;
      }else{
                  $('.error_div').show();isValid = false;
                  $(window).scrollTop($('.error_div').offset().top+300);
      }
   }

   //select box validation
   curStep.find(".select_val").removeClass("has-error");

          for(var i=0; i<Select.length; i++){
              var selectValue=Select[i].value;
              if(selectValue==' '){
                  isValid = false;
                  $(Select[i]).addClass("has-error");
                  $('.error_div').show();
                  $(window).scrollTop($('.error_div').offset().top+300);
              }
          }

          //textbox validation
            curStep.find(".textval").removeClass("has-error");
            for(var i=0; i<textVal.length; i++){
                var textValue=textVal[i].value;
                if(textValue==''){
                    isValid = false;
                     $(textVal[i]).addClass("has-error");
                     $('.error_div').show();
                     $(window).scrollTop($('.error_div').offset().top+300);
                }
            }

          if (isValid){
            curStep.find(".textval").removeClass("has-error");
            curStep.find(".select_val").removeClass("has-error");
            $('.panel').removeClass("active");
            $('.panel').eq(index+1).addClass("active");
            $('.widget_head ul li').eq(index+1).addClass("active");
            $('.widget_head ul li').eq(index).addClass("show");
            if($('.panel').eq(index+1).hasClass("payment")){
              $('.membership_head').hide();
            }
            if(index==2){
              $('.membership_head').hide();
              $('.membeship_body').css('margin-bottom','0px')
            }
          }

   });

   //change information for membership plan
   $('#member_change_information').on("click",function(e){
      e.preventDefault();

   });
   //change plan for membership plan
   $('#change_plan').on("click",function(e){
      e.preventDefault();
      $('.panel').removeClass("active");
       $('.panel').eq(0).addClass("active");
   });


//add widget heiht as margin bottom of please not div
  if($(window).width()<767){
    var widget_height=$('.widget_head').height();
    $('.section2').css('margin-bottom',widget_height);
    $('.membeship_body').css('margin-bottom',widget_height);
  }
  else{
    var widget_height=$('.widget_head').height()+20;
    $('.section2').css('margin-bottom',widget_height);
    $('.membeship_body').css('margin-bottom',widget_height);
  }


//login form validation
$('.form_wrap input').on('keyup change',function () {
      if ( ! $(this).val() ) {
        $(this).addClass("has-error");
      }
      else{
        $(this).removeClass("has-error");
      }
   });


   $(".widget_head ul ").not('.submitbtn').hover(
  function() {
    $( '.details_div' ).slideDown();
  }, function() {
    $( '.details_div' ).slideUp();
  }
);

$('.widget_head ul').hover(function()
  {
      $('.details_div').fadeIn();

  }, function()
  {
      $('.details_div').fadeOut();

  });
//membership checkbox

$('.selectplan').click(function(){
  $(this).parent().find('.radiobtn').prop("checked", 'checked');

});

});





//fixe slider on top of header on scroll
//var fixmeTop = $('.museum_wrap').offset().top;
 var fixmeTop = '10';

$(window).scroll(function() {
    var currentScroll = $(window).scrollTop();
    if (currentScroll >= fixmeTop) {
        $('.museum_wrap').addClass('fixed');
    } else {
        $('.museum_wrap').removeClass('fixed');;
    }
});

//paymnt succes div

function payment_success(){

  $('.panel').removeClass("active");
  $('.panel.payment').addClass("active");
  $('.widget_head').hide();
  $('.login_div').hide();
}

function loginform_validation(){
  if($('.username').val()==''){
    $('.username').addClass("has-error");
    $('.error_msg').fadeIn();
  }
  else{
    $('.username').removeClass("has-error");
    $('.error_msg').hide();
  }

  if($('.password').val()==''){
    $('.password').addClass("has-error");
    $('.error_msg').fadeIn();
  }
  else{
    $('.password').removeClass("has-error");
      $('.error_msg').hide();
  }
}

function changepassword(){
    $('.emaildiv').hide();
  $('.hiddendiv').fadeIn();
}
function successpassword(){

  var custpass = $("#custpass").val();
  var custcpass = $("#custcpass").val();
  if(custpass == custcpass){
       $.ajax({url: "updatepassword?custpass="+custpass, success: function(result){
         if(result == "success"){
              $('.chnage_pswd_div').hide();
              $('.pswd_change_success').fadeIn();
          }else{
            $('.chnage_pswd_div').hide();
            $('.pswd_change_success').fadeIn();
          }
        }});
   }


}
function changeplan(){
  $('.panel').removeClass("active");
   $('.panel').eq(0).addClass("active");
}
