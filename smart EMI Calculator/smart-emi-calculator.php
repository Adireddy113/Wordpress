<?php
/*
Plugin Name: Smart EMI Calculator
Description: A Simple and secure shortcode based EMI Calculator Plugin.
Version: 1.0
Author: Adireddy
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: smart-emi-calculator
*/

defined('ABSPATH') or die ('No Script is Running');

add_shortcode('smart_emi_calculator', 'smart_emi_calculator_shortcode');

function smart_emi_calculator_shortcode() {
ob_start();
smart_emi_calculator_form();
return ob_get_clean();
}

function smart_emi_calculator_form() {
echo '<h2> Smart EMI Calculator </h2>';
echo '<form method="POST">';
echo '<label for ="loan_amount">Loan Amount</label><br>';
echo '<input type ="number" name="loan_amount" required><br><br>';
echo '<label for ="interest_rate">Interest Rate</label><br>';
echo '<input type ="number" name="interest_rate" required><br><br>';
echo '<label for ="loan_tenure">Tenure (years)</label><br>';
echo '<input type ="number" name="loan_tenure" required><br><br>';
echo '<input type ="submit" name="calculate_emi" value ="Calculate EMI">';
echo '</form>';

if(isset($_POST['calculate_emi'])) {
$P =intval(sanitize_text_field($_POST['loan_amount']));
$R =intval(sanitize_text_field($_POST['interest_rate']));
$T =intval(sanitize_text_field($_POST['loan_tenure']));
$r=$R / (12*100);
$n=$T*12;
if($r==0) {
$emi =$P /$n;
}
else {
$emi = ($P*$r * pow(1+$r,$n)) / (pow(1+$r,$n) -1);
}
$emi = round($emi,2);
echo "<h3>Your EMI is : " .number_format($emi, 2). " per month</h3>";
}
}