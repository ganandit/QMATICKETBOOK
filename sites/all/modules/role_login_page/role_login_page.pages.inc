<?php

/**
 * @file
 *
 * author: nisith
 */

/**
 * List of login page settings.
 */
function _role_login_page_settings_list() {
  global $base_url;
  $login_menu_arr = db_select('role_login_page_settings', 'rlps')
      ->fields('rlps')
      ->execute()
      ->fetchAll();
  $rows = array();
  foreach ($login_menu_arr as $login_menu_data) {
    $roles_arr = explode(',', $login_menu_data->roles);
    $username_label = (($login_menu_data->username_label) ? $login_menu_data->username_label : '-');
    $password_label = (($login_menu_data->password_label) ? $login_menu_data->password_label : '-');
    $edit_url = '<a href="' . $base_url . '/admin/config/login/role_login_settings/edit/' . $login_menu_data->rl_id . '">Edit</a>';
    $delete_url = '<a href="' . $base_url . '/admin/config/login/role_login_settings/delete/' . $login_menu_data->rl_id . '">Delete</a>';
    $rows[] = array(
      $login_menu_data->url,
      _role_login_page_get_role_names($roles_arr),
      $username_label,
      $password_label,
      $edit_url . ' / ' . $delete_url,
    );
  }
  $header = array('Login url', 'Roles', 'Username label', 'Password label', 'Operations');
  $output = '';
  $output .= '<a href="' . $base_url . '/admin/config/login/role_login_settings" style="float:right;">Add login page</a>';
  $output .= theme('table', array('header' => $header, 'rows' => $rows));
  return $output;
}

/**
 * Fetch the role names from the role IDs.
 */
function _role_login_page_get_role_names($rids) {
  $role_query = db_select('role', 'r')
      ->fields('r', array('name'));
  $role_query->condition('r.rid', $rids, 'IN');
  $roles = $role_query->execute()->fetchAll();
  $role_names_arr = array();
  foreach ($roles as $roledata) {
    $role_names_arr[] = $roledata->name;
  }
  $role_names = implode(',', $role_names_arr);
  return $role_names;
}
