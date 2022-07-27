<?php class T {
const language_name = 'English';
const language_type = 'LTR';
const country_code = 'us';
const lang_code = 'en';
const dashboard = 'Dashboard';
const settings = 'Settings';
const generalsettings = 'General Settings';
const modules = 'modules';
const currencies = 'currencies';
const paymentgateways = 'paymentgateways';
const emailsettings = 'emailsettings';
const savechanges = 'Save Changes';
const profile = 'Profile';
const account_details = 'Accoun Details';
const account_details2 = 'Review and update your account information below';
const first_name = 'First Name';
const last_name = 'Last Name';
const email = 'Email';
const password = 'Password';
const mobile = 'Mobile';
const phone = 'Phone';
const country = 'Country Name';
const currency = 'Currency Name';
const city = 'City Name';
const address1 = 'Address 1';
const address2 = 'Address 2';
const select_country = 'Select Country';
const financial_details = 'Financial Details';
const select_currency = 'Select Currency';
const agency_name = 'Agency Name';
const wallet_balance = 'Wallet Balance';
public static function __callStatic($string, $args) {
    return vsprintf(constant("self::" . $string), $args);
}
}
function T($string, $args=NULL) {
    $return = constant("T::".$string);
    return $args ? vsprintf($return,$args) : $return;
}