  
  <div class="museum_wrap">
  <?php
global $base_url; 
if(!empty($data)) {
    $museumList = $data["museumList"];
    $museumTicket = $data["museumTicket"];
    $mm = 0;
      foreach($museumList as $row) {
         if($row['museum_id'] == $row['selmuseum']){
            $clsdis = 'style="background:#ffc200 !important;color:#000 !important"';
         }else{
            $clsdis = 'style="background:#79aafa !important;color:#fff !important"';
             
         }
          echo '<div class="slide" '.$clsdis.' data-attr='.$row['museum_id'].'>';
          echo '<a href="'.$base_url.'/ticket_booking?mid='.$row["museum_id"].'">'.$row['museum_name'].'</a>';
          echo "</div>";
          $mm++;

      }
    //  print_r($museumTicket);
      

  }    
  
  if(count($museumTicket) > 0){

  $startDate =  date_create($museumTicket["startDate"]);
  $startDate =  date_format($startDate,"d-m-Y");
  
  $endDate =  date_create($museumTicket["endDate"]);
  $endDate =  date_format($endDate,"d-m-Y");
  }else{
      $startDate = "";
      $endDate = "";
  }
  
?>    
  
  </div>