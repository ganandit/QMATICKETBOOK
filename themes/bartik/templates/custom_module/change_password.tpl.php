
 <section class="section req_new_pswd">
    <div class="wrapper">
      <div class="row">
        <!---------left section--->
        <div class="col col-md-10" style="margin:0 auto">
          <div class="form_wrap chnage_pswd_div">
            <!---------login-->
            <h2><?php echo t("change_password"); ?></h2>
            <p>
              <?php echo t("change_pwd_email") ?>
            </p>
            <form method="post">
              <div class="">
                <div class='form-group'>
                  <input type="password" name="custpass" id="custpass" class="form-control" placeholder="<?php echo t("new_password") ?>" name="" />
                </div>
                <div class='form-group'>
                  <input type="password"  name="custcpass" id="custcpass"  class="form-control" placeholder="<?php echo t("confirm_password") ?>" name="" />
                </div>
                <a href="booking.html" class="btn cancel"><?php echo t("cancel") ?></a>
                <button type="button" class="btn" onclick="successpassword();"><?php echo t("submit") ?></button>
                <div class="clearfix"> </div>
              </div>
            </form>
          </div>
          <div class="paymnet_suc pswd_change_success" style="display:none;">
            <div class="img_div">
              <img src="themes/bartik/images/check-mark.png" class="img-fluid" />
            </div>
            <h2><?php echo t("password_change_success") ?></h2>
            <p>
                <b style="display:block;margin-bottom:10px;"><?php echo t("confirmation") ?></b>
                <?php echo t("reset_success") ?>
            </p>
              <button type="button" class="btn" onclick="window.location.href = 'home.html'">><?php echo t("lbl_login") ?></button>
                <div class="clearfix"> </div>
          </div>
        </div>

      </div>
    </div>
  </section>
