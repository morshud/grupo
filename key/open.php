<?php define('s7V9pz', TRUE); ?>
<?php
if (!ini_get('output_buffering')) {
print('Missing Requirements. Check Grupo Requirements. Enable output_buffering on your hosting server.');
exit;
}
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 1);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 1);
if (!session_id()) {
    session_start();
}
session_regenerate_id();
include "bit.php";
date_default_timezone_set(cnf()["region"]);
include cnf()["door"]."/core/load.php";
load_knob();
?>