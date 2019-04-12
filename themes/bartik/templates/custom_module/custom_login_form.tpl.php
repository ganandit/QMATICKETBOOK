
<div class="llogin">
          <div class="form_wrap">
            <!---------login-->
            <h2><?php echo t("ALREADY REGISTERED?") ?></h2>
            <form action="javascript:logincustomer();">
              <span class="error_msg"><img src="themes/bartik/images/error.png" class="img-fluid" /> <?php echo t("error_text") ?></span>
              <div class='form-group'>
                <input type="text" class="form-control username" name="username" id="username"  placeholder="<?php echo t("lbl_username") ?>" required />
              </div>
              <div class='form-group'>

                <input type="password" class="form-control password" id="pass" name="pass" required placeholder="<?php echo t("lbl_password") ?>" />
              </div>
              <div class='form-group'>
                <button type="button" class="btn" onclick="logincustomer()"><?php echo t("lbl_login") ?></button>
              </div>
              <div class='form-group'>
                <a href="request_password" class="req_psw"><?php echo t("Request new password") ?></a>
              </div>
            </form>
          </div>
        </div>
 <script>
      function logincustomer(){
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
           var username = $("#username").val();
           var pass = $("#pass").val();
           if(username !="" && pass !=""){
                $.ajax({url: "loginsubmit?username="+username+"&pass="+pass, success: function(result){
                  if(result == "You are now logged in."){
                        window.location.href = "ticket_booking";
                    }else{
                        location.reload(true);
                    }
                 }});
            }
    
      }
  </script>		