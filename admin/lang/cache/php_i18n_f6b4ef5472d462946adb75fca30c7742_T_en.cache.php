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
public static function __callStatic($string, $args) {
    return vsprintf(constant("self::" . $string), $args);
}
}
function T($string, $args=NULL) {
    $return = constant("T::".$string);
    return $args ? vsprintf($return,$args) : $return;
}