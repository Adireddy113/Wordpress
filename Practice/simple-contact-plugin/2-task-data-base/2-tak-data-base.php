<?php
/*
Plugin Name: 1 Task Basic Form
Description: It's Just a simple contact form Plugin with a Shortcode
Version: 1.0
Author: Adireddy
License: GPLv2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: 1-task-basic-form
*/

defined('ABSPATH') or die('U cant access this file in Browser');

register_activation_hook(__FILE__,'scp_table');

function scp_table() {
global $wpdb;
$table_name=$wpdb->prefix .'form_details';
$charset_collate=$wpdb->get_charset_collate();

$sql="CREATE TABLE $table_name (
id INT(10) NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
issue TEXT NOT NULL,
submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id)
) $charset_collate;";

require_once(ABSPATH .'wp-admin/includes/upgrade.php');
dbDelta($sql);
}

add_shortcode('simple_contact_form', 'simple_contact');


function simple_contact() {
ob_start();
form_handle();
return ob_get_clean();
}

function form_handle(){
global $wpdb;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['my_form'])) {
$sname =sanitize_text_field($_POST['name']);
$semail=sanitize_email($_POST['email']);
$sissue=sanitize_textarea_field($_POST['issue']);

if(!empty($sname) && !empty($semail) && !empty($sissue)) {
$table_name= $wpdb->prefix . 'form_details';
$wpdb->insert($table_name, array(
'name' => $sname,
'email' => $semail,
'issue' => $sissue
));
echo '<p>Thank You for Contacting us</p>';
} 
else
{
echo '<p> Details are missing</p>';
}
}

echo '<style>
h2 {
text-align:center;
}
form {
text-align:center;
}
</style>';

echo '<h2> Simple Contact Form </h2>';
echo '<form method="POST">';
echo '<label for ="name">Name</label><br>';
echo '<input type ="text" id="name" name="name"><br><br>';
echo '<label for ="email">Email</label><br>';
echo '<input type ="email" id="email" name="email"><br><br>';
echo '<label for ="issue"> Explain Issue</label><br>';
echo '<textarea id="issue" name="issue" rows="10" cols="20"></textarea><br><br>';
echo '<input type ="submit" value="Submit" name="my_form">';
echo '</form>';
}