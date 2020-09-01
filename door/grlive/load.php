<?php if(!defined('s7V9pz')) {die();}?><?php
error_reporting(0);
session_write_close();
ignore_user_abort(false);
if (empty(vc($GLOBALS["default"]->request_timeout, 'num'))) {
    $GLOBALS["default"]->request_timeout = 10;
}
set_time_limit($GLOBALS["default"]->request_timeout+5);
function gr_live() {
    $timeout_in_seconds = $GLOBALS["default"]->request_timeout;
    $start_time = time();
    $inp = explode('/', pg('act/updates'));
    $gid = $ldt = $lastid = $poll = 0;
    $timeout = false;
    $uid = $GLOBALS["user"]['id'];
    $src = '"'.$uid.'-%"';
    $srck = '"%-'.$uid.'"';
    $arg = vc(func_get_args());
    $list = array();
    if (empty($poll) && !empty(vc($inp[0], 'num')) && !empty($inp[1])) {
        $gid = $inp[0];
        $ldt = $inp[1];
        $lastid = $inp[3];
        if ($inp[1] == 'user') {
            $tmpido = $inp[0].'-'.$uid;
            if ($inp[0] > $uid) {
                $tmpido = $uid.'-'.$inp[0];
            }
            $gid = $tmpido;
        }
    }
    while (empty($poll) && !$timeout) {
        $poll = 0;
        $lastseen = 0;
        $timeout = (time() - $start_time) > $timeout_in_seconds;
        $query = 'SELECT ';
        if (!empty($inp[0]) && !empty($inp[1])) {
            $query = $query.'(SELECT count(id) FROM gr_msgs WHERE cat="'.$ldt.'" AND gid="'.$gid.'" ';
            if (!empty($inp[10]) && $inp[10] == 'yes') {
                $query = $query.'AND id=0 ';
            }
            $query = $query.'AND id > '.$lastid.') AS unseenmsgs, ';
            $query = $query.'(SELECT IFNULL((SELECT MIN(CAST(v3 AS SIGNED)) FROM gr_options WHERE type="lview" ';
            $query = $query.'AND v1="'.$gid.'"),0)) AS lastseenmsg,';
            $query = $query.'(SELECT group_concat(concat(op.v2) separator ";") FROM gr_logs typ,gr_options op WHERE typ.type="typing" ';
            $query = $query.'AND op.v3=typ.v2 AND op.type="profile" AND op.v1="name" ';
            $query = $query.'AND typ.v1="'.$gid.'" AND typ.v3 <> "0" AND typ.v2 <> "'.$uid.'" ORDER BY typ.tms DESC LIMIT 3) AS typing,';
            $query = $query.'(SELECT id FROM gr_logs WHERE type="typing" ';
            $query = $query.'AND v1="'.$gid.'" AND v3 <> "0" AND v2 <> "'.$uid.'" ORDER BY tms DESC LIMIT 1) AS typid,';
        }

        if (!empty($inp[2]) && $inp[2] == 'on') {
            $query = $query.'(SELECT group_concat(concat(gid, ",", tunseen) separator ";") ';
            $query = $query.'FROM (SELECT count(ms.id) AS tunseen,ms.gid FROM gr_msgs ms,gr_options op WHERE ';
            $query = $query.'op.v1 = ms.gid AND op.type="lview" AND ms.gid<>"'.$gid.'" AND ms.id > ';
            $query = $query.'op.v3 AND op.v2 = '.$uid.' AND ms.gid LIKE '.$src.' AND ms.cat="user" OR op.v1 = ms.gid AND ';
            $query = $query.'op.type="lview" AND ms.gid<>"'.$gid.'" AND ms.id > op.v3 AND op.v2 = '.$uid.' AND ms.gid LIKE '.$srck.' ';
            $query = $query.'AND ms.cat="user" GROUP by ms.gid ORDER by ms.id DESC) usp ) AS unseenpm,';

            $query = $query.'(SELECT SUM(tunseen) ';
            $query = $query.'FROM (SELECT count(ms.id) AS tunseen,ms.gid FROM gr_msgs ms,gr_options op WHERE ';
            $query = $query.'op.v1 = ms.gid AND op.type="lview" AND ms.gid<>"'.$gid.'" AND ms.id > ';
            $query = $query.'op.v3 AND op.v2 = '.$uid.' AND ms.gid LIKE '.$src.' AND ms.cat="user" OR op.v1 = ms.gid AND ';
            $query = $query.'op.type="lview" AND ms.gid<>"'.$gid.'" AND ms.id > op.v3 AND op.v2 = '.$uid.' AND ms.gid LIKE '.$srck.' ';
            $query = $query.'AND ms.cat="user" GROUP by ms.gid ORDER by ms.id DESC) usp ) AS totunseenpm,';
        }

        $query = $query.'(SELECT group_concat(concat(groupid, ",", tunseen) separator ";") ';
        $query = $query.'FROM (SELECT gp.v1 as groupid,op.v3 as lsv,';
        $query = $query.'(SELECT count(ms.id) FROM gr_msgs ms WHERE ms.gid=gp.v1 AND type <> "like" ';
        if ($GLOBALS["default"]->sysmessages == 'disable') {
            $query = $query.'AND type<>"system" ';
        }
        $query = $query.'AND type <> "logs" AND ms.id > lsv) AS tunseen ';
        $query = $query.'FROM gr_options gp,gr_options op WHERE gp.type="gruser" AND gp.v2="'.$uid.'" ';
        $query = $query.'AND op.v1=gp.v1 AND gp.v1<>"'.$gid.'" AND op.type="lview" AND op.v2="'.$uid.'" AND gp.v3<>3 AND (SELECT count(ms.id) ';
        $query = $query.'FROM gr_msgs ms WHERE ms.gid=gp.v1 AND type <> "like" AND ms.id > op.v3) <> 0 ) usg ) AS unseengroup,';

        $query = $query.'(SELECT SUM(tunseen) ';
        $query = $query.'FROM (SELECT gp.v1 as groupid,op.v3 as lsv,';
        $query = $query.'(SELECT count(ms.id) FROM gr_msgs ms WHERE ms.gid=gp.v1 AND type <> "like" ';
        if ($GLOBALS["default"]->sysmessages == 'disable') {
            $query = $query.'AND type<>"system" ';
        }
        $query = $query.'AND type <> "logs" AND ms.id > lsv) AS tunseen ';
        $query = $query.'FROM gr_options gp,gr_options op WHERE gp.type="gruser" AND gp.v2="'.$uid.'" ';
        $query = $query.'AND op.v1=gp.v1 AND gp.v1<>"'.$gid.'" AND op.type="lview" AND op.v2="'.$uid.'" AND gp.v3<>3 AND (SELECT count(ms.id) ';
        $query = $query.'FROM gr_msgs ms WHERE ms.gid=gp.v1 AND type <> "like" AND ms.id > op.v3) <> 0 ) usg ) AS totunseengroup,';


        $query = $query.'(SELECT count(id) FROM gr_alerts WHERE uid="'.$uid.'" AND seen=0) AS unseenalerts';

        if (!empty(vc($inp[0], 'num')) && !empty($inp[1])) {
            $query = $query.',(SELECT count(cp.id)';
            $query = $query.' FROM gr_complaints cp,gr_options rl WHERE ';
            if (isset($GLOBALS["roles"]['groups'][7])) {
                $query = $query.'cp.status=1 AND rl.type="gruser" AND rl.v1=cp.gid AND rl.v2="'.$uid.'" ';
                $query = $query.'AND cp.gid="'.$gid.'" ';
            } else {
                $query = $query.'cp.status=1 AND rl.type="gruser" AND rl.v1=cp.gid AND rl.v2="'.$uid.'" AND rl.v3=2 AND cp.msid<>0 ';
                $query = $query.'AND cp.gid="'.$gid.'" ';
                $query = $query.'OR cp.status=1 AND rl.type="gruser" AND rl.v1=cp.gid AND rl.v2="'.$uid.'" AND rl.v3=1 AND cp.msid<>0 ';
                $query = $query.'AND cp.gid="'.$gid.'" ';
                $query = $query.'OR cp.status=1 AND rl.type="gruser" AND rl.v1=cp.gid AND rl.v2="'.$uid.'" AND rl.v3=0 ';
                $query = $query.'AND cp.uid="'.$uid.'" AND cp.gid="'.$gid.'"';
            }
            $query = $query.') as unseencomplaints';
        }
        $query = $query.' FROM gr_options WHERE v3="'.$uid.'" AND type="profile" AND v1="name";';
        $query = $query.'DELETE FROM gr_msgs WHERE type = "logs" AND tms < (CONVERT_TZ(NOW(),';
        $query = $query.'@@session.time_zone,"+05:30") - INTERVAL 60 SECOND);';
        $query = $query.'UPDATE gr_logs SET v3=0 WHERE type = "typing" AND tms < (CONVERT_TZ(NOW(),';
        $query = $query.'@@session.time_zone,"+05:30") - INTERVAL 15 SECOND);';

        $query = $query.'UPDATE gr_options SET v2 = (CASE ';
        $query = $query.'WHEN v2="invisible" THEN "invisible"';
        $query = $query.'ELSE "online"';
        $query = $query.' END),tms="'.dt().'" WHERE type="profile" AND v1="status" AND v3="'.$uid.'"';
        $query = $query.' AND tms < (CONVERT_TZ(NOW(),@@session.time_zone,"+05:30") - INTERVAL 300 SECOND);';

        $r = db('Grupo', 'q', $query);

        if (isset($r[0]['unseenmsgs']) && $r[0]['unseenmsgs'] > 0) {
            $gr = array();
            $gr['id'] = $inp[0];
            $gr['from'] = $inp[3];
            $gr['ldt'] = $inp[1];
            $list['msgs'] = new stdClass();
            $list['mdata'] = gr_group('msgs', $gr, 'array');
            if (!empty($list)) {
                if (isset($list['mdata'][0]->nomem) && $list['mdata'][0]->nomem == 1) {
                    $list['msgs']->liveup = 'refresh';
                    $poll = 1;
                } else if (count($list['mdata']) > 2) {
                    $list['msgs']->liveup = 'msgs';
                    $list['msgs']->grlastid = $inp[3];
                    $poll = 1;
                }
            }
        }
        if (!isset($uid) || empty($uid) || isset($GLOBALS["grusrlog"]['role']) && $GLOBALS["grusrlog"]['role'] == 4) {
            $list['msgs']->liveup = 'refresh';
            $poll = 1;
        }
        if (isset($r[0]['lastseenmsg']) && !empty($r[0]['lastseenmsg']) && $r[0]['lastseenmsg'] != $inp[8]) {
            $list['lastseenmsg'] = new stdClass();
            $list['lastseenmsg']->liveup = 'lastseen';
            $list['lastseenmsg']->lastseen = $r[0]['lastseenmsg'];
            $list['lastseenmsg']->gid = $inp[0];
            $poll = 1;
        }
        if (isset($r[0]['typing']) && !empty($r[0]['typing']) && $r[0]['typid'] != $inp[9] || empty($r[0]['typing']) && $inp[9] != 0 && empty($r[0]['typid'])) {
            $list['typing'] = new stdClass();
            $list['typing']->liveup = 'typing';
            $list['typing']->typers = $r[0]['typing'];
            $list['typing']->typid = $r[0]['typid'];
            $list['typing']->gid = $inp[0];
            $poll = 1;
        }

        if (isset($r[0]['unseengroup']) && !empty($r[0]['unseengroup']) && $r[0]['totunseengroup'] != $inp[5]) {
            $list['unseengroup'] = new stdClass();
            $list['unseengroup']->liveup = 'unseengroup';
            $list['unseengroup']->total = $r[0]['totunseengroup'];
            $list['unseengroup']->unseen = $r[0]['unseengroup'];
            $poll = 1;
        }

        if (isset($r[0]['unseenpm']) && !empty($r[0]['unseenpm']) && $r[0]['totunseenpm'] != $inp[5]) {
            $list['unseenpm'] = new stdClass();
            $list['unseenpm']->liveup = 'unseenpm';
            $list['unseenpm']->total = $r[0]['totunseenpm'];
            $list['unseenpm']->unseen = $r[0]['unseenpm'];
            $poll = 1;
        }

        if (isset($r[0]['unseenalerts']) && !empty($r[0]['unseenalerts'])) {
            $list['unseenalerts'] = new stdClass();
            $list['unseenalerts']->liveup = 'unseenalerts';
            $list['unseenalerts']->total = $r[0]['unseenalerts'];
            $poll = 1;
        }

        if (isset($r[0]['unseencomplaints']) && !empty($r[0]['unseencomplaints']) && $r[0]['unseencomplaints'] != $inp[7]) {
            $list['unseencomplaints'] = new stdClass();
            $list['unseencomplaints']->liveup = 'unseencomplaints';
            $list['unseencomplaints']->total = $r[0]['unseencomplaints'];
            $poll = 1;
        }
        if (!empty($poll) || $timeout) {
            break;
        }
        sleep(2);
    }
    header('Content-type: application/json');
    gr_prnt(json_encode($list));
}
?>