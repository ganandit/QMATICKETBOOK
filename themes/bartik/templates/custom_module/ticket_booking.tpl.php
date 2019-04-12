
  <?php
      $startDate = "";
      $endDate = "";
      $description = "";
      $nameofmus  = "";
      $expositionId="";
if(!empty($data)) {
    $museumList = $data["museumList"];
    $museumTicket = $data["museumTicket"];

    foreach($museumList as $row) {
      if($row['museum_id'] == $row['selmuseum']){
         $nameofmus =  $row['museum_name'];
      }else{
         
      }
    }
  if(count($museumTicket) > 0){
  $startDatet =  date_create($museumTicket["startDate"]);
  $startDate =  date_format($startDatet,"d-m-Y");
  $startDated =  date_format($startDatet,"Y-m-d");
  $description = $museumTicket["description"];
  $endDate =  date_create($museumTicket["endDate"]);
  $endDate =  date_format($endDate,"d-m-Y");
  $expositionId = $museumTicket["expositionId"];
  $today = date("Y-m-d");
    if(strtotime($startDated) < strtotime($today)){
      $startDate = date("d-m-Y");
    }
 }else{
      $startDate = "";
      $endDate = "";
  }
}    
  
?>   

  <!---------section1--->
  <section class="section">
    <div class="wrapper">
      <div class="row">
        <!---------right section--->
        <div class="ticketboking">
          <div class="panel active" tabindex="0">
            <?php 
             if($description !=""){
            ?>
            <h2 class="mb-4"><?php echo $row['about']; ?> <?php echo $nameofmus; ?></h2>
           <?php
           echo $description;
            }
            ?>
            <input type="hidden"  id="expid"  name="expid" value="">
            <input type="hidden"  id="exppid"  name="exppid" value="">
           
            <!---------datepicker--->
            <div class="caleder">
              <h2><?php echo t("visit_time"); ?></h2>
              <div class="datepicker"></div>
            </div>

          </div>
          <div class="panel two">
            <h2><?php echo t("select_ticket"); ?></h2>
            <p class="mt"><?php echo t("valid_ticket"); ?></p>
            <div class="ticket_selection">

               
  <?php
if (array_key_exists("prices",$museumTicket)) {
       $museumprices = $museumTicket["prices"];
       
        foreach($museumprices as $row) {
     
?>
              <div class="box">
                <article>
                  <h6><?php echo $row['group_name']; ?></h6>
                  <h5>qr<input class="perhead" value="<?php echo $row['amount']; ?>" readonly /></h5>
                    <input class="priceid" min="0" name="priceid[]" id="priceid[]"  value="<?php echo $row['price_group_id']; ?>" type="hidden">
                 <div class="number-input">
                    <button class="down"></button>
                     <input class="quantity" min="0" name="quantity[]" id="quantity[]"  value="0" type="number">
                    <button class="up"></button>
                  </div>
                  <h5 class="qty">qr<input class="tothead" value="0" readonly /></h5>
                  <a class="link" href="javascript:void(0)">+<?php echo t('read_more');?></a>
                </article>
                <div class="hidden_div"><?php echo  $row['code']; ?></div>

              </div>

<?php

        }
}else{
    echo  "<h2>Not Available</h2>";
}
        
                ?>
  
             
              <div class="box total_box" style="margin-bottom:0px;">
                <article>
          
                  <h6><?php echo t('total');?></h6>
                  <h5 class="qty">qr<input class="tosum" value="500" readonly /></h5>
                </article>
              </div>
            </div>
          </div>
          <div class="panel three">
            <h2><?php echo t('user_info_title');?></h2>
            <?php
                  if( !isset($_SESSION["personName"]) ){
                            $personname = "";    
                   }else{
                       $personname = $_SESSION["personName"];
                   }
                  if( !isset($_SESSION["personEmail"]) ){
                            $personEmail = "";    
                   }else{
                       $personEmail = $_SESSION["personEmail"];
                   }    
                   $personmobile ="";
?>
            <p class="mt"><?php echo t('ticket_email');?></p>
            <div class="sub_wrap">
              <div class="error_div" style="display:none"><?php echo t('fill_fields');?></div>
              <form method="post">
                <div class="form-group">
                  <label><?php echo t('first_name');?> *</label>
                  <input type="text" class="form-control textval" name="tfirstname" id="tfirstname"  value="<?php echo $personname ?>" required />
                </div>
                <div class="form-group">
                  <label><?php echo t('last_name');?> *</label>
                  <input type="text" class="form-control textval" name="tlastname" id="tlastname" value="<?php echo $personname ?>" required />
                </div>
                <div class="form-group">
                  <label><?php echo t('email');?> *</label>
                  <input type="email" class="form-control textval"  name="temail"  id="temail" value="<?php echo $personEmail ?>" required />
                </div>
                <div class="form-group">
                  <label><?php echo t('mobile_number');?> *</label>
                  <select class="form-control select_val" name=" required">
                    <option value="">qatar (+974)</option>
                  </select>
                  <input type="number" class="form-control phone textval" value="<?php echo $personmobile; ?>" name="tmobile"  id="tmobile" required />
                </div>
              </form>
    
              <ul>
                <li><input type="checkbox" class="choosen" checked /><span><?php echo t("note_content") ?><span></li>
                <li><input type="checkbox" class="choosen" checked /><span><?php echo t("note_content2") ?><span></li>
                <li><input type="checkbox" class="choosen" checked /><span><?php echo t("accept_all") ?> <a href="#"><?php echo t("terms_and_conditions") ?></a><span></li>
              </ul>
              <div class="bold">
              <?php echo t('privacy_text1');?> <br>
              <?php echo t("read_our") ?> <a href="#"><?php echo t("privacy_statement") ?></a> <?php echo t("how_to_handle") ?>
              </div>
            </div>
          </div>
          <div class="panel four">
            <h2><?php echo t("please_check_your_order") ?></h2>
            <div class="sub_wrap">
              <div class="box_wrap">
                <h4><?php echo t("date_&_time") ?></h4><a href="" id="change_date_time"><?php echo t("Change") ?></a>
                <p class="date">march 8, 2019</p>
                <p class="time">12:00 pm</p>
              </div>
              <div class="box_wrap">
                <h4><?php echo t("your_information") ?></h4><a href="" id="your_information"><?php echo t("Change") ?></a>
                <p class="name">Jithin francis</p>
                <p class="email">jithin@xyz.com</p>
                <p class="phone">+974 - 01234679</p>
              </div>
              <div class="clearfix"></div>
              <div class="change_tiket">
                <div class="box_wrap">
                  <h4><?php echo t("tickets") ?></h4><a href="" id="change_tiket"><?php echo t("Change") ?></a>
                  <div class="box">
                    <span class="one"><?php echo t('lbl_adult'); ?><label>(12+ years)<label></span>
                    <span class="two">x10</span>
                    <span class="three">qr <label>500</label></span>
                  </div>
                  <div class="box total">
                    <span class="one"><?php echo t('total'); ?></span>
                    <span class="two">qr <label>500</label></span>
                  </div>
                </div>
              </div>
              <div class="change_tiket payment">
                <div class="box_wrap">
                  <h4><?php echo t('payment_method'); ?></h4>
                  <a id="paymenturl"><img  src="themes/bartik/images/qnb.png" class="img-fluid" /></a>
                 </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="row">
        <div class="col col-8 col-md-10" style="margin:0 auto;padding-top:0px;">
          <div class="panel ">
            <div class="paymnet_gateway" onclick="payment_success();">
              <img src="themes/bartik/images/qnb-large.png" class="img-fluid" />
              <h2><?php echo t('payment_gateway'); ?></h2>
            </div>
          </div>
        </div>
        <div class="col col-8 col-md-8" style="margin:0 auto;padding-top:0px;">
          <div class="panel payment">
            <div class="paymnet_suc">
              <div class="img_div">
                <img  src="images/check-mark.png" class="img-fluid" />
              </div>
              <h2><?php echo t('ticket_purchased_successfully'); ?></h2>
              <p><?php echo t('email_check_details'); ?></p>
              <article>
                <h4><?php echo t('national_museum_of_qatar'); ?></h4>
                <span class="one"><?php echo t('lbl_date'); ?>&nbsp:&nbsp&nbsp&nbsp 08/03/2019 (thursday)</span>
                <span class="two"><?php echo t("lbl_ticket_id") ?>&nbsp:&nbsp&nbsp&nbsp NM0Q190</span>
                <div class="clearfix"></div>
                <span class="one"><?php echo t("time") ?>&nbsp:&nbsp&nbsp&nbsp 12:00PM (thursday)</span>
                <div class="clearfix"></div>
              </article>
              <article>
                <span class="one">hathim mohammed</span>
                <div class="clearfix"></div>
                <span class="one"><?php echo t('lbl_adult'); ?> x 1 <label>QR 50</label></span>
                <div class="clearfix"></div>
              </article>
              <article class="last">
                <span class="one"><?php echo t('transactionid'); ?>&nbsp:&nbsp&nbsp&nbsp QNB20192013AZX789A</span>
                <span class="two"><?php echo t('payment_method'); ?>&nbsp:&nbsp&nbsp&nbsp Debit Card</span>
                <div class="clearfix"></div>
                <span class="one"><?php echo t('total_amount');?>&nbsp&nbsp:&nbsp&nbsp&nbsp QR 50</span>
                <div class="clearfix"></div>
              </article>
              <a class="btn print"><?php echo t('print_ticket'); ?> </a>
              <a class="btn"><?php echo t('download'); ?></a>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!---------section2--->
  <section class="section2">
    <div class="wrapper">
      <div class="row">
        <div class="col-md-12 col">
          <h3><?php echo t('please_note');?> :</h3>
          <p><?php echo t('note_content');?> </p>
          </p>
        </div>
      </div>
    </div>
  </section>
  <?php
  $block = module_invoke('footer_ticket', 'block', 'view', 0);
		print $block['content'];
?>
  <!---------fixed div--->
  
  <div class="loader"></div>
  <script>
  
  var st = '<?php echo $startDate;?>';
  if(st == ""){
       $(".datepicker").datepicker({
              beforeShowDay:function(date){
                 return [false, ''];
              }
              
        });
  }else{
      $(".datepicker").datepicker({
        
        onSelect: function(date) {
             getexpid(date,'<?php echo $expositionId;?>');

        },
            dateFormat: 'dd-mm-yy',
            numberOfMonths: 2,
            minDate: '<?php echo $startDate;?>',
            maxDate: '<?php echo $endDate;?>',
        });
    
    }
    buttonclickevent();


function getexpid(stdate,muid){
  $.ajax({url: "getexpositionid?stdate="+stdate+"&mid="+muid, success: function(result){
                    $("#exppid").val(result);
                    $("#expid").val(muid);
          
               
             }});  
}
    
    function buttonclickevent(){
       $("#membeship_next_btn12").on("click",function(){
           var disp = $('.four').css('display');

if(disp == "block"){

  $(".loader").show();
  setTimeout(function() { $(".loader").hide(); }, 5000);                       
  var currentDate = $( ".datepicker" ).datepicker( "getDate" );
$(".datedisp").val(currentDate);

var pricearray = new Array();;
               var qtyarray = new Array();
               
                          //  $(".name").text($("#tfirstname").val()." ".$("#tlastname").val());
                         //   $(".temail").text($("#temail").val());
     
var inps = document.getElementsByName('quantity[]');
var priceidqq = document.getElementsByName('priceid[]');
for (var i = 0; i <inps.length; i++) {
    var inp=inps[i];
    if(inp.value > 0){
        var valll = inp.value;
        var ffff = priceidqq[i].value;
        pricearray.push(ffff);
qtyarray.push(valll);

    }
    expid = $("#expid").val();
    exppid = $("#exppid").val();
    var priceinfo = JSON.stringify(pricearray);
    var qtyinfo = JSON.stringify(qtyarray);
                    $.ajax({url: "booking_recalculateBasket?priceinfo="+priceinfo+"&qtyinfo="+qtyinfo+"&exppid="+exppid+"&expid="+expid, success: function(result){
             
                    var obj = JSON.parse(result);
                    if(obj.isValid){
                       $("#apiuserid").val(obj.clientid);
                       $("#totamnt").text(obj.amount/100);
                       $("#paymenturl").attr("href",obj.baseurl+""+obj.queryurl);
                    //   setTimeout(function() { $(".loader").hide(); }, 5000);   

                    }else{
                     /// alert("Please Try Again");
                      //  location.reload();
                    }

              
               
             }});    
}

           }
       });
    }    
   
   
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
    
