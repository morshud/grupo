<?php if(!defined('s7V9pz')) {die();}?><?php
if (!file_exists('knob/install.php') && !file_exists('knob/update.php')) {

    if (!isset($_COOKIE["Grupousrdev"]) || empty($_COOKIE["Grupousrdev"])) {
        $_COOKIE["Grupousrdev"] = $_COOKIE['Grupousrses'] = $_COOKIE["Grupousrcode"] = 0;
    }

    $GLOBALS["default"] = gr_default('var');
    $GLOBALS["default"]->send_email_notification = explode(',', $GLOBALS["default"]->send_email_notification);
    $GLOBALS["default"]->srhst = md5(str_replace('www.', '', $_SERVER['HTTP_HOST']));
    $GLOBALS["user"]['id'] = $GLOBALS["roles"] = $GLOBALS["logged"] = false;

    $query = 'SELECT userid,';
    $query = $query.'coalesce((SELECT v2 as v2 FROM gr_options ';
    $query = $query.'WHERE type="profile" AND v1="language" AND v3=userid LIMIT 1),"'.$GLOBALS["default"]->language.'") AS lang, ';
    $query = $query.'(SELECT role FROM gr_users WHERE id=userid LIMIT 1) AS role ';
    $query = $query.'FROM gr_defaults ';
    $query = $query.'LEFT JOIN (SELECT uid as userid FROM gr_session WHERE id="'.$_COOKIE['Grupousrses'].'" ';
    $query = $query.'AND device="'.$_COOKIE["Grupousrdev"].'" AND code="'.$_COOKIE["Grupousrcode"].'" ORDER BY id DESC LIMIT 1) usid ';
    $query = $query.'ON (v1 = "sitename") WHERE v1="sitename" LIMIT 1;';
    $GLOBALS["grusrlog"] = db('Grupo', 'q', $query)[0];

    if (isset($GLOBALS["grusrlog"]['userid']) && !empty($GLOBALS["grusrlog"]['userid'])) {
        $GLOBALS["user"]['id'] = $GLOBALS["grusrlog"]['userid'];
        $GLOBALS["user"]['active'] = $GLOBALS["logged"] = true;
        $GLOBALS["roles"] = gr_role('var', 0, $GLOBALS["grusrlog"]['role']);
    }
    $GLOBALS["lang"] = gr_lang('var', $GLOBALS["grusrlog"]['lang']);
    $GLOBALS["lang"]->invisible = $GLOBALS["lang"]->offline;
    if (empty($GLOBALS["default"]->timezone) || $GLOBALS["default"]->timezone == 'Auto') {
        $GLOBALS["default"]->timezone = "Australia/Sydney";
    }
    gr_pgtransition();
    if ($GLOBALS["default"]->force_https == 'enable') {
        if (is_https() != true) {
            header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
            exit;
        }
    }
}
?>