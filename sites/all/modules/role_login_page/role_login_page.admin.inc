<?php

/**
 * @file
 *
 * author: nisith
 */

/**
 * Add login page form.
 */
function _role_login_page_settings($form, &$form_state) {
  $roles_arr = db_select('role', 'r')
      ->fields('r', array('rid', 'name'))
      ->condition('r.name', 'anonymous user', '<>')
      ->execute()
      ->fetchAll();
  $roles = array();
  foreach ($roles_arr as $role_data) {
    $roles[$role_data->rid] = $role_data->name;
  }
  $form['login_page_menu'] = array(
    '#type' => 'fieldset',
    '#title' => t('Add login page'),
    '#collapsible' => FALSE,
  );
  $form['login_page_menu']['loginmenu_url'] = array(
    '#type' => 'textfield',
    '#title' => 'Login page url',
    '#required' => TRUE,
    '#description' => t('URL should exclude the basepath, i.e, "http://example.com". Add the path that should be used after base path, i.e, "user or admin/newconfig"'),
  );
  $form['login_page_menu']['username_label'] = array(
    '#type' => 'textfield',
    '#title' => 'Username label',
  );
  $form['login_page_menu']['password_label'] = array(
    '#type' => 'textfield',
    '#title' => 'Password label',
  );
  $form['login_page_menu']['submit_text'] = array(
    '#type' => 'textfield',
    '#title' => 'Submit button text',
  );
  $form['login_page_menu']['page_title'] = array(
    '#type' => 'textfield',
    '#title' => 'Page title',
  );
  $form['login_page_menu']['redirect_path'] = array(
    '#type' => 'textfield',
    '#title' => 'Redirect path',
    '#description' => t('Path should exclude the basepath, i.e, "http://example.com". Add the path that should be used after base path, i.e, "user or admin/newconfig"'),
  );
  $form['login_page_menu']['roles'] = array(
    '#type' => 'select',
    '#title' => 'Select the user roles allowed to login through this page : ',
    '#options' => $roles,
    '#multiple' => TRUE,
    '#required' => TRUE,
  );
  $form['login_page_menu']['role_mismatch_error_text'] = array(
    '#type' => 'textarea',
    '#title' => 'Role mismatch error text',
  );
  $form['login_page_menu']['invalid_credentials_error_text'] = array(
    '#type' => 'textarea',
    '#title' => 'Invalid credentials error text',
  );
  $form['login_page_menu']['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Create login page',
  );

  return $form;
}

/*
 * Rebuild the menu after adding the login page.
 */

function _role_login_page_settings_cache_clear($url, $type) {
  global $base_url;
  $custom_page = $base_url . '/' . $url;
  if ($type == 'add') {
    drupal_set_message(t('The page <b>@url</b> has been created and is active. This page can now be accessed only as an anonymous user.', array('@url' => $custom_page)));
  }
  elseif ($type == 'update') {
    drupal_set_message(t('The page <b>@url</b> has been updated. This page can now be accessed only as an anonymous user.', array('@url' => $custom_page)));
  }
  elseif ($type == 'delete') {
    drupal_set_message(t('The page <b>@url</b> has been deleted.', array('@url' => $custom_page)));
  }
  // Set a variable to let menu_execute_active_handler() know that menu rebuild is required
  variable_set('menu_rebuild_needed', TRUE);
  drupal_goto('admin/config/login/role_login_settings/list');
}

/*
 * Validation of add login page form.
 */

function _role_login_page_settings_validate($form, &$form_state) {
  global $base_url;
  $url = trim($form_state['values']['loginmenu_url']);
  $complete_url = $base_url . '/' . $url;
  $complete_url = filter_var($complete_url, FILTER_SANITIZE_URL);
  $replacements = array('!', '*', "(", ")", ";", "@", "+", "$", ",", "[", "]");
  $complete_url = str_replace($replacements, '', $complete_url);
  if (!filter_var($complete_url, FILTER_VALIDATE_URL)) {
    form_set_error('loginmenu_url', t("@comurl is not a valid URL", array('@comurl' => $complete_url)));
  }
  $menu_exists = db_query_range("SELECT 1 FROM {menu_links} WHERE link_path = :link_path", 0, 1, array(':link_path' => $url))->fetchField();
  if ($menu_exists) {
    form_set_error('loginmenu_url', t('The menu URL already exists'));
  }
}

/*
 * Submit add login page form.
 */

function _role_login_page_settings_submit($form, &$form_state) {
  $url = trim($form_state['values']['loginmenu_url']);
  $replacements = array('!', '*', "(", ")", ";", ":", "@", "+", "$", ",", "[", "]", " ");
  $url = str_replace($replacements, '-', $url);
  $username_label = trim($form_state['values']['username_label']);
  $password_label = trim($form_state['values']['password_label']);
  $submit_text = trim($form_state['values']['submit_text']);
  $page_title = trim($form_state['values']['page_title']);
  $redirect_path = trim($form_state['values']['redirect_path']);
  $role_mismatch_error_text = trim($form_state['values']['role_mismatch_error_text']);
  $invalid_credentials_error_text = trim($form_state['values']['invalid_credentials_error_text']);
  $roles = $form_state['values']['roles'];
  $roles = implode(',', $roles);
  $add_login_url = db_insert('role_login_page_settings')
      ->fields(array(
        "url" => $url,
        "username_label" => $username_label,
        "password_label" => $password_label,
        "submit_text" => $submit_text,
        "page_title" => $page_title,
        "redirect_path" => $redirect_path,
        "role_mismatch_error_text" => $role_mismatch_error_text,
        "invalid_credentials_error_text" => $invalid_credentials_error_text,
        "roles" => $roles,
      ))
      ->execute();
  if ($add_login_url) {
    _role_login_page_settings_cache_clear($url, 'add');
  }
}

/*
 * Login page edit form.
 */

function _role_login_page_settings_edit($form, $form_state, $rl_id) {
  $login_menu_data = db_select('role_login_page_settings', 'rlps')
      ->fields('rlps')
      ->condition('rl_id', $rl_id)
      ->execute()
      ->fetchObject();
  $roles_arr = db_select('role', 'r')
      ->fields('r', array('rid', 'name'))
      ->condition('r.name', 'anonymous user', '<>')
      ->execute()
      ->fetchAll();
  $roles = array();
  foreach ($roles_arr as $role_data) {
    $roles[$role_data->rid] = $role_data->name;
  }
  if ($login_menu_data) {
    $form['login_page_menu'] = array(
      '#type' => 'fieldset',
      '#title' => t('Edit login page'),
      '#collapsible' => FALSE,
    );
    $form['login_page_menu']['loginmenu_url'] = array(
      '#type' => 'textfield',
      '#title' => 'Login page url',
      '#required' => TRUE,
      '#default_value' => $login_menu_data->url,
      '#description' => t('URL should exclude the basepath, i.e, "http://example.com". Add the path that should be used after base path, i.e, "user or admin/newconfig"'),
    );
    $form['login_page_menu']['username_label'] = array(
      '#type' => 'textfield',
      '#title' => 'Username label',
      '#default_value' => $login_menu_data->username_label,
    );
    $form['login_page_menu']['password_label'] = array(
      '#type' => 'textfield',
      '#title' => 'Password label',
      '#default_value' => $login_menu_data->password_label,
    );
    $form['login_page_menu']['submit_text'] = array(
      '#type' => 'textfield',
      '#title' => 'Submit button text',
      '#default_value' => $login_menu_data->submit_text,
    );
    $form['login_page_menu']['page_title'] = array(
      '#type' => 'textfield',
      '#title' => 'Page title',
      '#default_value' => $login_menu_data->page_title,
    );
    $form['login_page_menu']['redirect_path'] = array(
      '#type' => 'textfield',
      '#title' => 'Redirect path',
      '#default_value' => $login_menu_data->redirect_path,
      '#description' => t('Path should exclude the basepath, i.e, "http://example.com". Add the path that should be used after base path, i.e, "user or admin/newconfig"'),
    );
    $form['login_page_menu']['roles'] = array(
      '#type' => 'select',
      '#title' => 'Select the user roles allowed to login through this page : ',
      '#options' => $roles,
      '#multiple' => TRUE,
      '#required' => TRUE,
      '#default_value' => explode(',', $login_menu_data->roles),
    );
    $form['login_page_menu']['role_mismatch_error_text'] = array(
      '#type' => 'textarea',
      '#title' => 'Role mismatch error text',
      '#default_value' => $login_menu_data->role_mismatch_error_text,
    );
    $form['login_page_menu']['invalid_credentials_error_text'] = array(
      '#type' => 'textarea',
      '#title' => 'Invalid credentials error text',
      '#default_value' => $login_menu_data->invalid_credentials_error_text,
    );
    $form['rl_id'] = array(
      '#type' => 'hidden',
      '#default_value' => $login_menu_data->rl_id,
      '#access' => FALSE,
    );
    $form['login_page_menu']['submit'] = array(
      '#type' => 'submit',
      '#value' => 'Update login page',
    );
    return $form;
  }
  else {
    drupal_set_message(t('Invalid login page ID'), 'warning');
    drupal_goto('admin/config/login/role_login_settings/list');
  }
}

/*
 * Validation of login page edit form.
 */

function _role_login_page_settings_edit_validate($form, &$form_state) {
  global $base_url;
  $rl_id = $form_state['values']['rl_id'];
  $url = trim($form_state['values']['loginmenu_url']);
  $complete_url = $base_url . '/' . $url;
  $complete_url = filter_var($complete_url, FILTER_SANITIZE_URL);
  $replacements = array('!', '*', "(", ")", ";", "@", "+", "$", ",", "[", "]");
  $complete_url = str_replace($replacements, '', $complete_url);
  if (!filter_var($complete_url, FILTER_VALIDATE_URL)) {
    form_set_error('loginmenu_url', t("@comurl is not a valid URL", array('@comurl' => $complete_url)));
  }
  $menu_exists = db_query_range("SELECT 1 FROM {menu_links} WHERE link_path = :link_path", 0, 1, array(':link_path' => $url))->fetchField();
  $login_page_exists = db_query_range("SELECT 1 FROM {role_login_page_settings} WHERE url = :link_path and rl_id <> :rl_id", 0, 1, array(':link_path' => $url, ':rl_id' => $rl_id))->fetchField();
  $current_data_match = db_query_range("SELECT 1 FROM {role_login_page_settings} WHERE url = :link_path and rl_id = :rl_id", 0, 1, array(':link_path' => $url, ':rl_id' => $rl_id))->fetchField();
  if (!$current_data_match) {
    if ($menu_exists && !$login_page_exists) {
      form_set_error('loginmenu_url', t('The menu URL already exists'));
    }
  }
}

/*
 * Submit edit login page.
 */

function _role_login_page_settings_edit_submit($form, &$form_state) {
  $rl_id = $form_state['values']['rl_id'];
  $url = trim($form_state['values']['loginmenu_url']);
  $replacements = array('!', '*', "(", ")", ";", ":", "@", "+", "$", ",", "[", "]", " ");
  $url = str_replace($replacements, '-', $url);
  $username_label = trim($form_state['values']['username_label']);
  $password_label = trim($form_state['values']['password_label']);
  $submit_text = trim($form_state['values']['submit_text']);
  $page_title = trim($form_state['values']['page_title']);
  $redirect_path = trim($form_state['values']['redirect_path']);
  $role_mismatch_error_text = trim($form_state['values']['role_mismatch_error_text']);
  $invalid_credentials_error_text = trim($form_state['values']['invalid_credentials_error_text']);
  $roles = $form_state['values']['roles'];
  $roles = implode(',', $roles);
  db_update('role_login_page_settings')
      ->fields(array(
        "url" => $url,
        "username_label" => $username_label,
        "password_label" => $password_label,
        "submit_text" => $submit_text,
        "page_title" => $page_title,
        "redirect_path" => $redirect_path,
        "role_mismatch_error_text" => $role_mismatch_error_text,
        "invalid_credentials_error_text" => $invalid_credentials_error_text,
        "roles" => $roles,
      ))
      ->condition('rl_id', $rl_id)
      ->execute();
  _role_login_page_settings_cache_clear($url, 'update');
}

/*
 * Delete custom login page.
 */

function _role_login_page_settings_delete($form, $form_state, $rlid) {
  $form = array();
  $form['rl_id'] = array(
    '#type' => 'value',
    '#value' => $rlid,
    '#access' => FALSE,
  );
  return confirm_form(
      $form, t('Are you sure you want to delete the login page?'), 'admin/config/login/role_login_settings/list', t('This action cannot be undone.'), t('Delete'), t('Cancel')
  );
}

/*
 * Submit login delete page.
 */

function _role_login_page_settings_delete_submit($form, $form_state) {
  $rl_id = $form_state['values']['rl_id'];
  $url = db_query_range("SELECT url FROM {role_login_page_settings} WHERE rl_id = :rl_id", 0, 1, array(':rl_id' => $rl_id))->fetchField();
  $deleted = db_delete('role_login_page_settings')
      ->condition('rl_id', $rl_id)
      ->execute();
  if ($deleted) {
    _role_login_page_settings_cache_clear($url, 'delete');
  }
}
