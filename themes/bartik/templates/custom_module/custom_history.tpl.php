 
  <div class="col col-8 col-md-8 purchase_history">
            <h2><?php echo t('purchase_history'); ?></h2>
 <?php
 $datadetails = $data["organisedVisits"];
 $bar="";
 foreach ($datadetails as $value){ 
   $totalAmount = $value["totalAmount"];
   $orderNumber = $value["orderNumber"];
   $periodReservations = $value["periodReservations"];
   if(array_key_exists("barcode",$data)){
    $bar = $data['barcode'][0];

 }

   foreach ($periodReservations as $value2){ 
         $articleCode = $value2["articleCode"];
         $articleName = $value2["articleName"];
         $expositionPeriodFrom =  $value2["expositionPeriodFrom"];
         $expositionPeriodId = $value2["expositionPeriodId"];
         $expositionId = $value2["expositionId"];
         $amount = $value2["amount"];
      ?>

<article class="active">
              <div class="box">
                <h4><?php echo $expositionId; ?></h4>
                <p><?php echo t('lbl_date'); ?> :<label><?php echo $expositionPeriodFrom; ?></label></p>
                <p><?php echo $articleName;?> <label class="qty">qr <?php echo $amount;?></label></p>
              </div>
              <div class=" imgbosxse">
                <?php echo '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$bar.'&choe=UTF-8"  class="img-responsive qrcodesdatea"/>';  ?>
              </div>
              <div class="box one">
                <p><?php echo t('lbl_ticket_id'); ?>  : <?php echo  $orderNumber;?></p>
                <span class="upcoming"><?php echo t('upcoming'); ?> </span>
                <div class="clearfix"></div>
                <!-- <a class="btn">download ticket</a> -->
              </div>
              <div class="clearfix"></div>
            </article>


      <?php   
         
   }
 
 }
 ?>

           
           
           
            <article class="last">
              <div class="box">
                <h4><?php echo t('national_museum_of_qatar'); ?> </h4>
                <p><?php echo t('lbl_date'); ?> :<label>08/03/2018 (Thursday)</label></p>
                <p><?php echo t('lbl_adult'); ?>x 1 <label class="qty">qr 50</label></p>
              </div>
              <div class="box one">
                <p><?php echo t('lbl_ticket_id'); ?>  : NM0Q190</p>
                <span><?php echo t('completed'); ?></span>
                <div class="clearfix"></div>
              </div>
              <div class="clearfix"></div>
            </article>
            <div class="pagination">
              <a href="#" class=""><?php echo t('prev'); ?></a>
              <a href="#" class="active">1</a>
              <a href="#" class="">2</a>
              <a href="#" class="">3</a>
              <a href="#" class="">4</a>
              <a href="#" class="">5</a>
              <a href="#" class="">6</a>
              ....
              <a href="#" class="">25</a>
              <a href="#" class=""><?php echo t('next'); ?></a>

            </div>
            <div class="clearfix"></div>
          </div>
