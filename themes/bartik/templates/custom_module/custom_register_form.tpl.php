<section class="section membeship_body">
  <div class="wrapper">
	<div class="panel active">
		<h2 class="mt-4"><?php echo t("pass_type"); ?></h2>
		<div class="error_div" style="display:none;margin-top:30px;"><?php echo t("pass_type_error"); ?></div>
		<div class="row">
		<?php
		$form = drupal_get_form ( "user_register_form" );
		if(!empty($data)) {
		   $membershipList =  $data["membershipList"];
		   $kk =0;
		   foreach($membershipList as $row) {
			$kk = $kk +1;
		?>               

		<div class="col col-md-6">
		  <div class="pastype">
		    <h4>QR <?php echo $row['price'];  ?></h4>
		    <input type="radio" name="membership" class="radiobtn"  onclick="getplanvalue('<?php echo $row['id'];  ?>','<?php echo $row['name'];  ?>','<?php echo $row['price'];  ?>','<?php echo $row['name'];  ?>')"/>
		    <label for="membership1"></label>
		    <h2><?php echo $row['name'];  ?></h2>
		    <a class="btn selectplan" onclick="getplanvalue('<?php echo $row['id'];  ?>','<?php echo $row['name'];  ?>','<?php echo $row['price'];  ?>','<?php echo $row['name'];  ?>')"><?php echo t("pass_select"); ?></a>
		    <div class="box-img one"> </div>
		  </div>
		</div>
		<?php
			}
		} ?>            
		<input type="hidden" name="selmembership"  id="selmembership" value="" />
		</div>
	</div>

	<div class="panel">
		<div class="row">
		<div class="">
		   <h2 class="mt-4"><?php echo t("account_details") ?></h2>
		   <p class="mt"><?php echo t("enter_profile") ?></p>
		   <div class="sub_wrap">
		   <div class="error_div" style="display:none"><?php echo t("fill_fields") ?></div>
		   <div class="fieldvalidation" style="display:none"> </div>	
		   <form method="post">
			<div class="row">

				<!-- <div class="col col-md-6">
					<div class='form-group'>
					<label><?php #echo t("lbl_username") ?> *</label>
					<input type="text" class="form-control textval" name="cusername" id="cusername" required />
					</div>
				</div> -->
				
				<div class="col col-md-12">
					<div class="form-group">
					<label><?php echo t("email") ?>  *</label>
					<input type="email" class="form-control textval" name="cemail" id="cemail" required />
					</div>
				</div>

				<div class="col col-md-6">
					<div class="form-group">
					<label><?php echo t("lbl_password") ?> *</label>
					<input type="password" min-length="6" class="form-control textval" name="cpass" id="cpass" required />
					</div>
				</div>

				<div class="col col-md-6">
					<div class="form-group">
					<label><?php echo t("confirm_password") ?>*</label>
					<input type="password" class="form-control textval" name="cnfpass" id="cnfpass" required />
					</div>
				</div>

			</div>


			<?php
				$countryname = array();  
                		if(!empty($data)) {
                   			$countryList =  $data["countryList"];
				        $titleList = $data["titleList"];
				}
			?>

			<div class="row">
				<div class="col col-md-12">   <h4><?php echo t("about_you") ?></h4></div>

				<div class="col col-md-6">
					<div class="form-group">
					<label><?php echo t("title") ?></h4> *</label>
                                        <select class="form-control full-width  select_val" name="ctitle" id="ctitle">
                                        <option value="">Select</option>
                                        <?php foreach($titleList as $t){?>
                                        <option value="<?php echo strtolower($t);?>"><?php echo $t;?></option>
                                        <?php }?>
                                        </select>
					</div>
				</div>

				<div class="col col-md-6">
					<div class="form-group">
					<label><?php echo t("first_name") ?> *</label>
					<input type="text" class="form-control textval" name="firstname" id="firstname" required />
					</div>
				</div>

				<div class="col col-md-6">
					<div class="form-group">
					<label><?php echo t("last_name") ?> *</label>
					<input type="text" class="form-control textval" name="lastname" id="lastname" required />
					</div>
					<div class="form-group">
					<label><?php echo t("street") ?> *</label>
					<input type="text" class="form-control textval" name="street" id="street" required />
					</div> 
				</div>

				<div class="col col-md-6">
					<div class="form-group">
					<label><?php echo t("city") ?> *</label>
					<input type="text" class="form-control textval" name="city" id="city" required />
					</div>   
					<div class="form-group">
					<label><?php echo t("zip") ?> *</label>
					<input type="text" class="form-control textval" name="zipcode" id="zipcode" required />
					</div>  
				</div>

				<div class="col col-md-6">
					<div class="form-group">
					<label><?php echo t("residence") ?> *</label>
					<select class="form-control full-width  select_val" name="country" id="country">
					<option value="">Select</option>
					<?php foreach($countryList as $k){?>
					<option value="<?php echo strtolower($k);?>"><?php echo $k;?></option>
					<?php }?>
					</select>
					</div>
				</div>

				<div class="col col-md-6">
					<div class="form-group">
					<label><?php echo t("nationality") ?> *</label>
					<select class="form-control full-width select_val" name="nationality" id="natioanlity">
                                        <option value="">Select</option>
                                        <?php foreach($countryList as $k){?>
                                        <option value="<?php echo strtolower($k);?>"><?php echo $k;?></option>
                                        <?php }?>
					</select>
					</div>
				</div>

				<div class="col col-md-6">
					<div class="form-group">
					<label><?php echo t("country_code") ?> *</label>
					<select class="form-control full-width select_val" name="countrycode" id="countrycode">
					<option value="">qatar (+974)</option>
					</select>
					</div>
				</div>

				<div class="col col-md-6">
					<div class="form-group">
					<label><?php echo t("mobile_number") ?> *</label>
					<input type="number" class="form-control phone textval" name="mobile" id="mobile" max="13" required />
					</div>
				</div>
			</div>

			<br />
			<h4><?php echo t("newsletter") ?></h4>
			<ul class="newsleter_ul">
			    <li><input type="checkbox" class="choosen" checked /><span><?php echo t("newsletterchk") ?><span></li>
			    <li><input type="checkbox" class="choosen" checked /><span><?php echo t("accept_all") ?> <a href="#"><?php echo t("terms_and_conditions") ?></a><span></li>
			</ul>
		   </form>
		   </div>
		</div>
		</div>
		</div>
	</div>

	<div class="panel four">
		<div class="row">
		<div class="col col-md-8">
			<h2 class="mt-4"><?php echo t("please_check_your_order") ?></h2>
			<div class="sub_wrap">
				<input type="text" name="apiuserid" id="apiuserid" value="">
				<div class="box_wrap">
				   <h4><?php echo t("select_info")?></h4><a href="" id="member_change_information"><?php echo t("Change")?></a>
				   <p class="name" id="username_input2">fname</p>
				   <p class="email" id="username_email">jithin@xyz.com</p>
				   <p class="phone" id="username_phone">+974 - 01234679</p>
				</div>
				<div class="clearfix"></div>
				<div class="change_tiket">
					<div class="box_wrap">
					   <h4><?php echo t("plan") ?></h4><a href="" id="change_plan"><?php echo t("Change") ?></a>
					   <div class="box membership" style="border:0px;margin:0px;padding:0px;">
						<img src="../themes/bartik/images/plan.png" class="img-fluid" />
						<span class="one" id="planname"><label></span>
						<span class="three">qr <label id="plancost"></label></span>
					   </div>

					   <div class="box total">
						<span class="one"><?php echo t('total'); ?></span>
						<span class="two">qr <label id="totalcost"></label></span>
					   </div>
					</div>
				</div>
				<div class="change_tiket payment">
					<div class="box_wrap">
					   <h4><?php echo t('payment_method'); ?></h4>
					   <a href="" id="paymenturl">
					   <img src="themes/bartik/images/qnb.png" class="img-fluid"></a>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

	<div class="panel payment">
		<div class="row">
			<div class="col col-8 col-md-10" style="margin:0 auto;">
			<div class="paymnet_suc">
			   <div class="img_div">
			      <img src="themes/bartik/images/check-mark.png" class="img-fluid">
			   </div>
			   <h2><?php echo t('membership_success'); ?></h2>
			   <p><?php echo t('email_check_details'); ?></p>
			   <article>
			   	<div class="row">
					<div class="col col-md-6">
					<p id="username_input3">Hathim Muhammed</p>
					<p class="pass" id="plannamedisp"></p>
					<p><?php echo t('payment_method'); ?>&nbsp:&nbsp&nbsp Debit Card</p>
					<p><?php echo t('transactionid'); ?>&nbsp:&nbsp&nbsp QNB20192013AZX789A</p>
					<p><?php echo t('total_amount');?>&nbsp&nbsp:&nbsp&nbsp&nbsp QR50</p>
					</div>
					<div class="col col-md-6">
						<img src="themes/bartik/images/mem.png" class="img-fluid" />
					</div>
				</div>
			   </article>
			   <a class="btn" href="login.html"><?php echo t('lbl_login');?></a>
			</div>
			</div>
		</div>
	</div>
</section>


  <!--fixed div-->
<?php
  $block = module_invoke('footer_user', 'block', 'view', 0);
  print $block['content'];
?>
  
<div class="loader"></div>

<script>
   function getplanvalue(membership,planname,price,planid){
       $("#planname").html(planname);
       $(".plannamecls").val(planname);
       $(".plannamecls").html(planname);
       $("#plannamedisp").html(planname);
       $("#plancost").html(price);
       $("#totalcost").html(price);
       $("#selmembership").val(membership);
    //   changevalue();
       buttonclickevent();
       
   }
  function registercustomer(){
	var cemail = $("#cemail").val();
	var cpass = $("#cpass").val();
	var country = $("#country").val();
	var cusername = $("#cusername").val();
	var firstname = $("#firstname").val();
	var lastname = $("#lastname").val();
	var mobile = $("#mobile").val();
	var street = $("#street").val();
	var city = $("#city").val();
	var zipcode = $("#zipcode").val();
	var amount = $("#totalcost").html();
	var memebership = $("#selmembership").val();
	var apiuserid = $("#apiuserid").val();

        $.ajax({url: "savecustomer?apiuserid="+apiuserid+"&memebership="+memebership+"&amount="+amount+"&cemail="+cemail+"&cpass="+cpass+"&country="+country+"&cusername="+cusername+"&firstname="+firstname+"&lastname="+lastname+"&mobile="+mobile+"&street="+street+"&city="+city+"&zipcode="+zipcode, success: function(result){
                //alert(result);
            if(result == "Username already exits"){
                   $( "#member_change_information" ).trigger( "click" );
                   $("#membeship_next_btn").show();
            }else{
                   var obj = JSON.parse(result);
                   $("#apiuserid").val(obj.clientid);
                   $("#paymenturl").attr("href",obj.baseurl+""+obj.queryurl);
            }
        }});
    
   } 
   
   function buttonclickevent(){
       $("#membeship_next_btn").on("click",function(){
           var disp = $('.four').css('display');
           if(disp == "block"){
               $(".loader").show();
                setTimeout(function() { $(".loader").hide(); }, 5000);
               registercustomer();
           }
       });
   }
   function changevalue(){
        $("#firstname").blur(function()  {
          $("#username_input2").html($("#firstname").val()+" "+$("#lastname").val());
          $("#fusername_input2").html($("#firstname").val()+" "+$("#lastname").val());
          $("#username_input3").html($("#firstname").val()+" "+$("#lastname").val());
          $("#fusername_input3").html($("#firstname").val()+" "+$("#lastname").val());
        });
       $("#lastname").blur(function()  {
          $("#username_input2").html($("#firstname").val()+" "+$("#lastname").val());
          $("#fusername_input2").html($("#firstname").val()+" "+$("#lastname").val());
          $("#username_input3").html($("#firstname").val()+" "+$("#lastname").val());
          $("#fusername_input3").html($("#firstname").val()+" "+$("#lastname").val());
        });   
       $("#cemail").blur(function()  {
          $("#username_email").html($("#cemail").val());
          $("#fusername_email").html($("#cemail").val());
        });
       $("#mobile").blur(function()  {
          $("#username_phone").html($("#countrycode").val()+" "+$("#mobile").val());
          $("#fusername_phone").html($("#countrycode").val()+" "+$("#mobile").val());
        });            
   }
   
//   $('#membeship_next_btn').click(function() {
//     	$(".loader").show();
//           setTimeout(function() { $(".loader").hide(); }, 3000);
//     })
      
    </script>
    
    <style>
        
      .loader {
  display:none;
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('https://i.stack.imgur.com/FhHRx.gif') 50% 50% no-repeat rgb(249,249,249);
}
    </style>
