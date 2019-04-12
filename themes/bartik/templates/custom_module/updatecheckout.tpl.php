     <?php 
     $bar= "";
     $trans =  $data["vpc_TransactionNo"];
     $ticketid = $data["vpc_ReceiptNo"];
     $ticketid = $data["vpc_ReceiptNo"];
     $vpc_Message = $data["vpc_Message"];
     if(array_key_exists("barcode",$data)){
        $bar = $data['barcode'][0];

     }
     
     ?>
         
         <div class=" payment">
            <div class="paymnet_suc">
              
              <?php
                   if(array_key_exists("barcode",$data)){
               ?>
               <div class="img_div">
                <img src="../themes/bartik/images/check-mark.png" class="img-fluid" />
              </div>
              <h2><?php echo t('ticket_purchased_successfully'); ?></h2>
              <p style="margin-bottom: 15px;"><?php echo t("email_check_details") ?></p>
              <?php echo '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$bar.'&choe=UTF-8"  class="img-responsive qrcodes"/>';  ?>
                <?php
                   }else{
                      echo " <h2>TICKET PURCHASED FAILED!</h2>"; 
                   }  
                   ?>
              <article>
                <h4><?php echo t("national_museum_of_qatar") ?></h4>
                <span class="one"><?php echo t("lbl_date") ?>&nbsp:&nbsp&nbsp&nbsp <?php echo date("d/m/Y");?> (<?php echo date('l'); ?>)</span>
                <span class="two"><?php echo t('lbl_ticket_id'); ?>&nbsp:&nbsp&nbsp&nbsp <?php echo $ticketid; ?></span>
                <div class="clearfix"></div>
                <span class="one"><?php echo t('time'); ?>&nbsp:&nbsp&nbsp&nbsp <?php echo date("H:i:s"); ?> (<?php echo date('l'); ?>)</span>
                <div class="clearfix"></div>
              </article>
              <article style="display:none">
                <span class="one">hathim mohammed</span>
                <div class="clearfix"></div>
                <span class="one">Adult x 1 <label>QR 50</label></span>
                <div class="clearfix"></div>
              </article>
              <article class="last">
                <span class="one"><?php echo t('transactionid'); ?>&nbsp:&nbsp&nbsp&nbsp <?php echo $trans;?></span>
                <span class="two"><?php echo t('payment_method'); ?>&nbsp:&nbsp&nbsp&nbsp Debit Card</span>
                <div class="clearfix"></div>
                <span class="one"><?php echo t('total_amount');?>&nbsp&nbsp:&nbsp&nbsp&nbsp QR <?php echo $data["amount"]; ?></span>
                <div class="clearfix"></div>
              </article>
            
            </div>
          </div>
