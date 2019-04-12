    <div class="col col-8 col-md-8">
            <h2><?php echo t('account_details');  ?></h2>
            <p class="mt"><?php echo t('enter_profile');  ?></p>
            <div class="sub_wrap">
         
 <form method="post">
                <div class="row">
                  <div class="col col-md-12">
                    <div class="form-group">
                      <label><?php echo t('Email');  ?> *</label>
                      <input type="email" class="form-control" name="" required />
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="form-group">
                      <label><?php echo t('password');  ?>  *</label>
                      <input type="password" class="form-control" name="" required />
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="form-group">
                      <label><?php echo t('confirm_password');  ?> *</label>
                      <input type="password" class="form-control" name="" required />
                    </div>
                  </div>
                </div>
                <br />
                <h4><?php echo t('about_you');  ?> </h4>

                <div class="row">
                  <div class="col col-md-12">
                    <div class="form-group">
                      <label><?php echo t('title');  ?>  *</label>
                      <input type="text" class="form-control" name="" required />
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="form-group">
                      <label><?php echo t('first_name');  ?> *</label>
                      <input type="text" class="form-control" name="" required />
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="form-group">
                      <label><?php echo t('last_name');  ?> *</label>
                      <input type="text" class="form-control" name="" required />
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="form-group">
                      <label><?php echo t('country');  ?> *</label>
                      <select class="form-control full-width " name=" required">
                        <option value="">qatar</option>
                        <option value="">qatar</option>
                        <option value="">qatar</option>
                      </select>
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="form-group">
                      <label><?php echo t('nationality');  ?>  *</label>
                      <select class="form-control full-width " name=" required">
                        <option value="">qatar</option>
                        <option value="">qatar</option>
                        <option value="">qatar</option>
                      </select>
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="form-group phone-group">
                      <label><?php echo t('mobile_number');  ?>  *</label>
                      <select class="form-control" name=" required">
                        <option value="">qatar (+974)</option>
                        <option value="">qatar (+974)</option>
                        <option value="">qatar (+974)</option>
                      </select>

                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="form-group phone-group">
                      <input type="number" class="form-control phone" name="" required />
                    </div>
                  </div>
                </div>

                <br />
                <h4><?php echo t('newsletter');  ?> </h4>
                <ul class="newsleter_ul">
                  <li><input type="checkbox" checked /><span><?php echo t('newsletterchk');  ?><span></li>
                  <li><input type="checkbox" class="choosen" checked=""><span><a><?php echo t('terms');  ?></a><span></span></span></li>
                </ul>
                <button type="submit" class="btn edit_submit"><?php echo t('submit');  ?></button>
              </form>
			  </div>
			  </div>