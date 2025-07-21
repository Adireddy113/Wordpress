<?php
/*
Plugin Name: Simple Contact Plugin
Description: It's Just a simple contact form Plugin with a Shortcode
Version: 1.0
Author: Adireddy
License: GPLv2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: simple-contact-plugin
*/

defined('ABSPATH') or die('U cant access this file in Browser');

add_shortcode('simple_contact', 'simple_contact_plugin');

function simple_contact_plugin() {
ob_start();
contact();
return ob_get_clean();
}

function contact() {
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
echo '<input type ="text" id="name" name="Name"><br><br>';
echo '<label for ="email">Email</label><br>';
echo '<input type ="email" id="email" name="Email"><br><br>';
echo '<label for ="issue"> Explain Issue</label><br>';
echo '<textarea name="issue" rows="10" cols="20"></textarea><br><br>';
echo '<input type ="submit" value="Submit">';
echo '</form>';
}