<?php
function custom_module_theme() {
 $path_to_theme = drupal_get_path('theme', variable_get('theme_default', 'bartik'));
 $themes = array(); 

$themes['custom_register_form'] = array(
'template' => 'custom_register_form',
'path' => $path_to_theme . '/templates/custom_module/', 
);
$themes['request_password'] = array(
'template' => 'request_password',
'path' => $path_to_theme . '/templates/custom_module/', 
);

$themes['custom_login_form'] = array(
'template' => 'custom_login_form',
'path' => $path_to_theme . '/templates/custom_module/', 
);
$themes['listmusume'] = array(
'template' => 'listmusume',
'path' => $path_to_theme . '/templates/custom_module/', 
);

$themes['custom_edit_form'] = array(
'template' => 'custom_edit_form',
'path' => $path_to_theme . '/templates/custom_module/', 
);

$themes['custom_history'] = array(
'template' => 'custom_history',
'path' => $path_to_theme . '/templates/custom_module/', 
);
$themes['ticket_booking'] = array(
'template' => 'ticket_booking',
'path' => $path_to_theme . '/templates/custom_module/', 
);
$themes['updatecheckout'] = array(
'template' => 'updatecheckout',
'path' => $path_to_theme . '/templates/custom_module/', 
);
$themes['change_password'] = array(
'template' => 'change_password',
'path' => $path_to_theme . '/templates/custom_module/', 
);

    return $themes;
}
?>