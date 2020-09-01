<?php if(!defined('s7V9pz')) {die();}?><?php
function gr_list($do) {
    $sofs = $ofs = 0;
    $lmt = $GLOBALS["default"]->aside_results_perload;
    $i = 1;
    $unq = 'YmFldm94';
    $uid = $GLOBALS["user"]['id'];
    $list = null;
    if (!isset($do["type"])) {
        $do["type"] = null;
    }
    if (isset($do["offset"])) {
        $ofs = vc($do["offset"], 'num');
    }
    if (isset($do["soffset"])) {
        $sofs = vc($do["soffset"], 'num');
    }
    if (!isset($do['search']) || isset($do['search']) && strlen($do['search']) < 2) {
        $do['search'] = null;
    } else {
        $do['search'] = vc($do['search']);
    }
    $query = 'UPDATE gr_options SET v2 = (case ';
    $query = $query.'when v2="invisible" then "invisible"';
    $query = $query.'when tms < (CONVERT_TZ(NOW(),@@session.time_zone,"+05:30") - INTERVAL 30 MINUTE) then "offline"';
    $query = $query.'when tms < (CONVERT_TZ(NOW(),@@session.time_zone,"+05:30") - INTERVAL 15 MINUTE) then "idle"';
    $query = $query.'when tms > (CONVERT_TZ(NOW(),@@session.time_zone,"+05:30") - INTERVAL 15 MINUTE) then "online"';
    $query = $query.'end), tms = (case ';
    $query = $query.'when tms < (CONVERT_TZ(NOW(),@@session.time_zone,"+05:30") - INTERVAL 30 MINUTE) then "'.dt().'"';
    $query = $query.'else tms';
    $query = $query.' end) WHERE type="profile" AND v1="status" AND v2="online" OR type="profile" AND v1="status"';
    $query = $query.' AND v2="idle";';

    if ($GLOBALS["default"]->releaseguestuser == 'enable') {
        $query = $query.'UPDATE gr_users us,gr_options op SET us.name=SUBSTRING(MD5(RAND()) FROM 1 FOR 10),';
        $query = $query.'op.tms=(op.tms - INTERVAL 15 MINUTE) WHERE us.role=5 AND ';
        $query = $query.'op.type="profile" AND op.v1="status" AND op.v3=us.id AND op.v2="offline" AND ';
        $query = $query.' op.tms BETWEEN (DATE_SUB(CONVERT_TZ(NOW(),@@session.time_zone,"+05:30"), ';
        $query = $query.'INTERVAL 5 MINUTE)) AND CONVERT_TZ(NOW(),@@session.time_zone,"+05:30");';
    }

    $r = db('Grupo', 'q', $query);
    $list[0] = new stdClass();
    $list[0]->offset = $ofs+$lmt;
    $list[0]->soffset = $sofs;
    $list[0]->shw = 'hde';
    $unq = base64_decode($unq);
    $list[0]->icn = 'gi-plus';
    $list[0]->mnu = 0;
    $list[0]->act = 0;
    if ($do["type"] === "pm") {
        if (isset($GLOBALS["roles"]['privatemsg'][2])) {
            if (isset($GLOBALS["roles"]['users'][4])) {
                $list[0]->shw = 'shw';
                $list[0]->icn = 'gi-users';
                $list[0]->mnu = 'mmenu';
                $list[0]->act = 'users';
            } else if (isset($GLOBALS["roles"]['users'][5])) {
                $list[0]->shw = 'shw';
                $list[0]->icn = 'gi-users';
                $list[0]->mnu = 'mmenu';
                $list[0]->act = 'online';
            }
            $src = '"'.$uid.'-%"';
            $srck = '"%-'.$uid.'"';
            $lsrun = 1;
            while (!empty($lsrun)) {
                $query = 'SELECT max(ms.id) as id,ms.gid,SUBSTRING_INDEX(ms.gid, "-", 1) AS uone,SUBSTRING_INDEX(ms.gid, "-", -1) AS utwo,';
                $query = $query.'(SELECT v2 FROM gr_options WHERE v3=uone AND type="profile" AND v1="name") AS namea,';
                $query = $query.'(SELECT v2 FROM gr_options WHERE v3=utwo AND type="profile" AND v1="name") AS nameb,';
                $query = $query.'(SELECT v2 FROM gr_options WHERE v3=uone AND type="profile" AND v1="status") AS statusa,';
                $query = $query.'(SELECT v2 FROM gr_options WHERE v3=utwo AND type="profile" AND v1="status") AS statusb,';
                $query = $query.'(SELECT count(id) FROM gr_msgs WHERE gid=ms.gid AND id>';
                $query = $query.'(SELECT v3 FROM gr_options WHERE type="lview" AND v1=ms.gid AND v2="'.$uid.'" LIMIT 1)) AS lcount';
                $query = $query.' FROM gr_msgs ms WHERE gid LIKE '.$src.' AND cat="user" ';
                $query = $query.'OR gid LIKE '.$srck.' AND cat="user" GROUP by ';
                $query = $query.'gid ORDER by id DESC  LIMIT '.$lmt.' OFFSET '.$ofs;
                $r = db('Grupo', 'q', $query);
                $lscnt = 0;
                foreach ($r as $v) {
                    $snuid = $v['uone'];
                    $name = $v['namea'];
                    $status = $v['statusa'];
                    if ($v['uone'] == $uid || $v['utwo'] == $uid) {
                        if ($snuid == $uid) {
                            $snuid = $v['utwo'];
                            $name = $v['nameb'];
                            $status = $v['statusb'];
                        }
                        if (empty($do["search"]) || !empty($do["search"]) && strpos($name, $do["search"]) !== false) {
                            $list[$i] = new stdClass();
                            $list[$i]->img = gr_img('users', $snuid);
                            $list[$i]->name = $name;
                            $list[$i]->count = 0;
                            if ($v['lcount'] != 0) {
                                $list[$i]->count = $v['lcount'];
                                $list[$i]->countag = $GLOBALS["lang"]->new;
                            }
                            $list[$i]->sub = $GLOBALS["lang"]->$status;
                            $list[$i]->right = $GLOBALS["lang"]->options;
                            $list[$i]->rtag = 'type="profile" no="'.$snuid.'"';
                            $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                            $list[$i]->oa = $GLOBALS["lang"]->view;
                            $list[$i]->oat = 'class="paj"';
                            $list[$i]->icon = "'status ".$status."'";
                            $list[$i]->id = 'class="loadgroup paj" ldt="user" no="'.$snuid.'"';
                            $i = $i+1;
                            $lscnt = $lscnt+1;
                        }
                    }
                }
                if ($lscnt == count($r)) {
                    $lsrun = 0;
                } else {
                    $ofs = $ofs+$lmt;
                }
            }
        }
    } else if ($do["type"] === "groups") {
        $GLOBALS["default"]->pingroup = vc($GLOBALS["default"]->pingroup, 'num');
        if (isset($do['filtr']) && !empty($do['filtr'])) {
            $GLOBALS["default"]->pingroup = 0;
        }
        if (isset($GLOBALS["roles"]['groups'][1])) {
            $list[0]->shw = 'shw';
            $list[0]->icn = 'gi-plus';
            $list[0]->mnu = 'udolist';
            $list[0]->act = 'group';
        }
        if (isset($do['filtr']) && $do['filtr'] == 'unjoined') {
            $r = array();
        } else if (!empty($GLOBALS["default"]->pingroup) && empty($do['search'])) {
            $query = 'SELECT gr.*,';
            $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=gr.id AND v2="'.$uid.'") AS grjoin,';
            $query = $query.'(SELECT v3 FROM gr_options WHERE type="gruser" AND v1=gr.id AND v2="'.$uid.'" LIMIT 1) AS grole,';
            $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=gr.id) AS grtotal,';
            $query = $query.'(SELECT count(id) FROM gr_msgs WHERE gid=gr.id AND type <> "like" AND type <> "logs" ';
            if ($GLOBALS["default"]->sysmessages == 'disable') {
                $query = $query.'AND type<>"system" ';
            }
            $query = $query.'AND id>(SELECT v3 FROM gr_options WHERE type="lview" AND v1=gr.id AND v2="'.$uid.'" LIMIT 1)) AS lcount';
            $query = $query.' FROM gr_options gr WHERE gr.id='.$GLOBALS["default"]->pingroup.' AND gr.type="group"';
            $query = $query.' || gr.type="group" AND gr.id IN (SELECT gj.v1 FROM gr_options gj WHERE';
            $query = $query.' gj.type="gruser" AND gj.v2="'.$uid.'" AND gj.v1<>"'.$GLOBALS["default"]->pingroup.'") ';
            $query = $query.'ORDER BY gr.id='.$GLOBALS["default"]->pingroup.' DESC, gr.tms DESC LIMIT '.$lmt.' OFFSET '.$ofs;
            $r = db('Grupo', 'q', $query);
        } else {
            $query = 'SELECT gr.*,';
            $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=gr.id AND v2="'.$uid.'") AS grjoin,';
            $query = $query.'(SELECT v3 FROM gr_options WHERE type="gruser" AND v1=gr.id AND v2="'.$uid.'" LIMIT 1) AS grole,';
            $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=gr.id) AS grtotal,';
            $query = $query.'(SELECT count(id) FROM gr_msgs WHERE gid=gr.id AND type <> "like" AND type <> "logs" ';
            if ($GLOBALS["default"]->sysmessages == 'disable') {
                $query = $query.'AND type<>"system" ';
            }
            $query = $query.'AND id>(SELECT v3 FROM gr_options WHERE type="lview" AND v1=gr.id AND v2="'.$uid.'" LIMIT 1)) AS lcount';
            $query = $query.' FROM gr_options gr WHERE gr.type="group" AND gr.v1 LIKE "%'.$do['search'].'%"';
            $query = $query.' AND gr.id IN (SELECT gj.v1 FROM gr_options gj WHERE gj.type="gruser" AND gj.v2="'.$uid.'") ';
            $query = $query.'ORDER BY gr.tms DESC LIMIT '.$lmt.' OFFSET '.$ofs;
            $r = db('Grupo', 'q', $query);
        }
        $lk = $lmt-count($r);
        foreach ($r as $v) {
            $list[$i] = new stdClass();
            $list[$i]->img = gr_img('groups', $v['id']);
            $list[$i]->name = $v['v1'];
            $list[$i]->countag = $list[$i]->count = 0;
            $list[$i]->right = $GLOBALS["lang"]->options;
            $list[$i]->rtag = '';
            $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
            $list[$i]->oa = $GLOBALS["lang"]->view;
            $list[$i]->oat = 'class="paj"';
            $list[$i]->icon = '';
            if (!empty($v['v2'])) {
                $list[$i]->icon = '"gi-lock" data-toggle="tooltip" data-title="'.$GLOBALS["lang"]->protected_group.'"';
            }
            if ($v['v3'] == 'secret') {
                $list[$i]->icon = '"gi-eye-off" data-toggle="tooltip" data-title="'.$GLOBALS["lang"]->secret_group.'"';
            }
            if ($v['id'] == $GLOBALS["default"]->pingroup) {
                $list[$i]->icon = '"gi-check-1" data-toggle="tooltip" data-title="'.$GLOBALS["lang"]->pinned_group.'"';
            }
            if ($v['grjoin'] == 0) {
                $list[$i]->oa = $GLOBALS["lang"]->join;
                $list[$i]->id = 'class="formpop" title="'.$GLOBALS["lang"]->join_group.'" do="group" ldt="group" btn="'.$GLOBALS["lang"]->join.'" act="join" no="'.$v['id'].'"';
                if (!empty($v['v2'])) {
                    $list[$i]->sub = $GLOBALS["lang"]->protected_group;
                }
                if ($v['v3'] == 'secret') {
                    $list[$i]->sub = $GLOBALS["lang"]->secret_group;
                }
                if ($v['v3'] != 'secret' && empty($v['v2'])) {
                    $list[$i]->sub = gr_shnum($v['grtotal'])." ".$GLOBALS["lang"]->members;
                }
            } else if ($v['grole'] == 3 && !isset($GLOBALS["roles"]['groups'][7])) {
                $list[$i]->id = 'class="say" say="'.$GLOBALS["lang"]->banned.'" type="e" no="'.$v['id'].'" ldt="group"';
                $list[$i]->sub = $GLOBALS["lang"]->banned;
            } else {
                if ($v['lcount'] != 0) {
                    $list[$i]->count = $v['lcount'];
                    $list[$i]->countag = $GLOBALS["lang"]->new;
                }
                $list[$i]->sub = gr_shnum($v['grtotal'])." ".$GLOBALS["lang"]->members;
                $list[$i]->id = 'class="loadgroup paj" ldt="group" no="'.$v['id'].'"';
            }
            $i = $i+1;
        }
        if ($lk != 0) {
            $list[0]->soffset = $sofs+$lk;
            $rs = array();
            if (isset($do['filtr']) && $do['filtr'] == 'joined') {
                $rs = array();
            } else if (isset($GLOBALS["roles"]['groups'][6]) && isset($GLOBALS["roles"]['groups'][11])) {
                if (!empty($GLOBALS["default"]->pingroup) && empty($do['search'])) {
                    $query = 'SELECT gr.*,';
                    $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=gr.id) AS grtotal';
                    $query = $query.' FROM gr_options gr WHERE gr.id<>'.$GLOBALS["default"]->pingroup.' AND gr.type="group"';
                    $query = $query.' AND gr.id NOT IN (SELECT gj.v1 FROM gr_options gj WHERE';
                    $query = $query.' gj.type="gruser" AND gj.v2="'.$uid.'" AND gj.v1<>"'.$GLOBALS["default"]->pingroup.'") ';
                    $query = $query.'ORDER BY gr.tms DESC LIMIT '.$lk.' OFFSET '.$sofs;
                    $rs = db('Grupo', 'q', $query);
                } else {
                    $query = 'SELECT gr.*,';
                    $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=gr.id) AS grtotal';
                    $query = $query.' FROM gr_options gr WHERE gr.type="group" AND gr.v1 LIKE "%'.$do['search'].'%"';
                    $query = $query.' AND gr.id NOT IN (SELECT gj.v1 FROM gr_options gj WHERE gj.type="gruser" AND gj.v2="'.$uid.'") ';
                    $query = $query.'ORDER BY gr.tms DESC LIMIT '.$lk.' OFFSET '.$sofs;
                    $rs = db('Grupo', 'q', $query);
                }
            } else if (isset($GLOBALS["roles"]['groups'][11])) {
                if (!empty($GLOBALS["default"]->pingroup) && empty($do['search'])) {
                    $query = 'SELECT gr.*,';
                    $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=gr.id) AS grtotal';
                    $query = $query.' FROM gr_options gr WHERE gr.id<>'.$GLOBALS["default"]->pingroup.' AND gr.type="group"';
                    $query = $query.' AND gr.v3="secret" AND gr.id NOT IN (SELECT gj.v1 FROM gr_options gj WHERE';
                    $query = $query.' gj.type="gruser" AND gj.v2="'.$uid.'" AND gj.v1<>"'.$GLOBALS["default"]->pingroup.'") ';
                    $query = $query.'ORDER BY gr.tms DESC LIMIT '.$lk.' OFFSET '.$sofs;
                    $rs = db('Grupo', 'q', $query);
                } else {
                    $query = 'SELECT gr.*,';
                    $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=gr.id) AS grtotal';
                    $query = $query.' FROM gr_options gr WHERE gr.type="group" AND gr.v1 LIKE "%'.$do['search'].'%"';
                    $query = $query.' AND gr.v3="secret" AND gr.id NOT IN (SELECT gj.v1 FROM gr_options gj WHERE gj.type="gruser" AND gj.v2="'.$uid.'") ';
                    $query = $query.'ORDER BY gr.tms DESC LIMIT '.$lk.' OFFSET '.$sofs;
                    $rs = db('Grupo', 'q', $query);
                }
            } else if (isset($GLOBALS["roles"]['groups'][6])) {
                if (!empty($GLOBALS["default"]->pingroup) && empty($do['search'])) {
                    $query = 'SELECT gr.*,';
                    $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=gr.id) AS grtotal';
                    $query = $query.' FROM gr_options gr WHERE gr.id<>'.$GLOBALS["default"]->pingroup.' AND gr.type="group"';
                    $query = $query.' AND gr.v3!="secret" AND gr.id NOT IN (SELECT gj.v1 FROM gr_options gj WHERE';
                    $query = $query.' gj.type="gruser" AND gj.v2="'.$uid.'" AND gj.v1<>"'.$GLOBALS["default"]->pingroup.'") ';
                    $query = $query.'ORDER BY gr.tms DESC LIMIT '.$lk.' OFFSET '.$sofs;
                    $rs = db('Grupo', 'q', $query);
                } else {
                    $query = 'SELECT gr.*,';
                    $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=gr.id) AS grtotal';
                    $query = $query.' FROM gr_options gr WHERE gr.type="group" AND gr.v1 LIKE "%'.$do['search'].'%"';
                    $query = $query.' AND gr.v3!="secret" AND gr.id NOT IN (SELECT gj.v1 FROM gr_options gj WHERE gj.type="gruser" AND gj.v2="'.$uid.'") ';
                    $query = $query.'ORDER BY gr.tms DESC LIMIT '.$lk.' OFFSET '.$sofs;
                    $rs = db('Grupo', 'q', $query);
                }

            }
            foreach ($rs as $v) {
                $chusers[0] = $v['id'];
                $list[$i] = new stdClass();
                $list[$i]->img = gr_img('groups', $v['id']);
                $list[$i]->name = $v['v1'];
                $list[$i]->countag = $list[$i]->count = 0;
                $list[$i]->right = $GLOBALS["lang"]->options;
                $list[$i]->rtag = 'type="profile" no="'.$chusers[0].'"';
                $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                $list[$i]->oat = 'class="paj"';
                if (!isset($GLOBALS["roles"]['groups'][4]) && !isset($GLOBALS["roles"]['groups'][7])) {
                    $list[$i]->oa = $GLOBALS["lang"]->join;
                    $list[$i]->id = 'class="say" say="'.$GLOBALS["lang"]->denied.'" type="e" no="'.$v['id'].'" ldt="group"';
                } else {
                    $list[$i]->oa = $GLOBALS["lang"]->join;
                    $list[$i]->id = 'class="formpop" title="'.$GLOBALS["lang"]->join_group.'" do="group" ldt="group" btn="'.$GLOBALS["lang"]->join.'" act="join" no="'.$v['id'].'"';
                }
                $list[$i]->icon = '';
                if (!empty($v['v2'])) {
                    $list[$i]->icon = '"gi-lock" data-toggle="tooltip" data-title="'.$GLOBALS["lang"]->protected_group.'"';
                    $list[$i]->sub = $GLOBALS["lang"]->protected_group;
                }
                if ($v['v3'] == 'secret') {
                    $list[$i]->icon = '"gi-eye-off" data-toggle="tooltip" data-title="'.$GLOBALS["lang"]->secret_group.'"';
                    $list[$i]->sub = $GLOBALS["lang"]->secret_group;
                }
                if ($v['v3'] != 'secret' && empty($v['v2'])) {
                    $list[$i]->sub = gr_shnum($v['grtotal'])." ".$GLOBALS["lang"]->members;
                }
                if ($v['v6'] == 'unleavable') {
                    $list[$i]->icon = '"gi-minus-circled-1" data-toggle="tooltip" data-title="'.$GLOBALS["lang"]->unleavable_group.'"';
                }
                $i = $i+1;
            }
        }
    } else if ($do["type"] === "crew") {
        $do["gid"] = vc($do["gid"], 'num');
        $query = 'SELECT us.id,us.v1,op.v2 AS name,us.v3,us.v2,';
        $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=us.v1 AND v2=:uid) AS grjoin,';
        $query = $query.'(SELECT v3 FROM gr_options WHERE type="gruser" AND v1=us.v1 AND v2=:uid LIMIT 1) AS grole,';
        $query = $query.'(SELECT st.v2 FROM gr_options st WHERE st.v3=us.v2 AND st.type="profile" AND st.v1="status") AS status';
        $query = $query.' FROM gr_options us,gr_options op WHERE us.v2=op.v3 AND op.type="profile" AND op.v1="name" AND ';
        $query = $query.'us.type="gruser" AND op.v2 LIKE :search AND us.v1=:gid ';
        $query = $query.'ORDER BY us.v3 DESC,name ASC LIMIT '.$lmt.' OFFSET '.$ofs;
        $data['uid'] = $uid;
        $data['gid'] = $do["gid"];
        $data['search'] = "%".$do["search"]."%";
        $rz = db('Grupo', 'q', $query, $data);
        foreach ($rz as $f) {
            if ($f['grjoin'] != 0 && $f['grole'] != 3 || isset($GLOBALS["roles"]['groups'][7])) {
                $list[$i] = new stdClass();
                $list[$i]->img = gr_img('users', $f['v2']);
                $list[$i]->name = $f['name'];
                $list[$i]->count = 0;
                $list[$i]->sub = $GLOBALS["lang"]->member;
                $sort = 1;
                if ($f['v3'] == 2) {
                    $list[$i]->sub = $GLOBALS["lang"]->admin;
                    $sort = 3;
                } else if ($f['v3'] == 1) {
                    $list[$i]->sub = $GLOBALS["lang"]->moderator;
                    $sort = 2;
                } else if ($f['v3'] == 3) {
                    $list[$i]->sub = $GLOBALS["lang"]->blocked;
                    $sort = 0;
                }
                $list[$i]->right = $GLOBALS["lang"]->options;
                $list[$i]->rtag = 'type="group" no="'.$f['v1'].'"';
                $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                if (isset($GLOBALS["roles"]['groups'][7]) || $f['grole'] == 2) {
                    $list[$i]->oa = $GLOBALS["lang"]->edit;
                    $list[$i]->oat = 'class="formpop" title="'.$GLOBALS["lang"]->roles.'" data-pname="'.$list[$i]->name.'" pn=1 do="group" btn="'.$GLOBALS["lang"]->update.'" act="role" data-usr="'.$f['v2'].'"';
                }
                if ($f['v2'] != $uid) {
                    if (isset($GLOBALS["roles"]['groups'][7]) || $f['grole'] == 2 && $f['v3'] != 2 || $f['grole'] == 1 && $f['v3'] != 2) {
                        $list[$i]->ob = $GLOBALS["lang"]->view;
                        $list[$i]->obt = 'class="vwp" no="'.$f['v2'].'"';
                    } else if (isset($GLOBALS["roles"]['privatemsg'][1])) {
                        $list[$i]->ob = $GLOBALS["lang"]->chat;
                        $list[$i]->obt = 'class="loadgroup paj" ldt="user" no="'.$f['v2'].'"';
                    }
                }
                $norc = 0;
                if ($f['v3'] == 2 && $f['grole'] == 1) {
                    $norc = 1;
                }
                if ($f['v2'] != $uid && $norc == 0) {
                    if (isset($GLOBALS["roles"]['groups'][7]) || $f['grole'] == 2 || $f['grole'] == 1) {
                        if ($f['v3'] == 3) {
                            $list[$i]->oc = $GLOBALS["lang"]->unban;
                            $list[$i]->oct = 'class="deval" act="unblock" data-usid="'.$f['v2'].'"';
                        } else {
                            $list[$i]->oc = $GLOBALS["lang"]->ban;
                            $list[$i]->oct = 'class="deval" act="block" data-usid="'.$f['v2'].'"';
                        }
                    } else {
                        $list[$i]->oc = $GLOBALS["lang"]->view;
                        $list[$i]->oct = 'class="vwp" no="'.$f['v2'].'"';
                    }
                } else {
                    $list[$i]->oc = $GLOBALS["lang"]->view;
                    $list[$i]->oct = 'class="vwp" no="'.$f['v2'].'"';
                }
                $list[$i]->icon = "'status ".$f['status']."'";
                $list[$i]->id = 'class="crew"';
                $i = $i+1;
            }
        }
    } else if ($do["type"] === "alerts") {
        if (isset($GLOBALS["roles"]['groups'][1])) {
            $list[0]->shw = 'shw';
            $list[0]->icn = 'gi-trash';
            $list[0]->mnu = 'udolist';
            $list[0]->act = 'clearallalerts';
        }
        $query = 'SELECT al.v1,al.v2,al.v3,al.type,al.id,al.tms,al.seen,op.v2 AS name FROM gr_alerts al,';
        $query = $query.'gr_options op WHERE al.v3=op.v3 AND op.type="profile" AND op.v1="name" AND ';
        $query = $query.'op.v2 LIKE "%'.$do['search'].'%" AND al.uid="'.$uid.'" ';
        $query = $query.'ORDER BY al.id DESC LIMIT '.$lmt.' OFFSET '.$ofs.';';
        if ($ofs == 0) {
            $query = $query.'UPDATE gr_alerts SET seen=1 WHERE uid="'.$uid.'" AND seen=0;';
        }
        $r = db('Grupo', 'q', $query);
        foreach ($r as $f) {
            $list[$i] = new stdClass();
            $list[$i]->img = gr_img('users', $f['v3']);
            $list[$i]->name = $f['name'];
            $list[$i]->countag = $list[$i]->count = 0;
            $altype = 'alert_'.$f['type'];
            $list[$i]->sub = $GLOBALS["lang"]->$altype;
            $list[$i]->right = $GLOBALS["lang"]->options;
            $list[$i]->rtag = 'type="alert" no="'.$f['id'].'"';
            $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
            if ($f['type'] == 'invitation') {
                $list[$i]->oa = $GLOBALS["lang"]->join;
                $list[$i]->oat = 'class="formpop" title="'.$GLOBALS["lang"]->join_group.'" do="group" btn="'.$GLOBALS["lang"]->join.'" act="join" no="'.$f['v1'].'"';
            } else if ($f['type'] == 'mentioned' || $f['type'] == 'replied' || $f['type'] == 'liked') {
                $list[$i]->oa = $GLOBALS["lang"]->view;
                $list[$i]->oat = 'class="loadgroup paj goback" ldt="group" data-block="crew" msgload="'.$f['v2'].'" no="'.$f['v1'].'"';
            } else if ($f['type'] == 'newmsg') {
                $list[$i]->oa = $GLOBALS["lang"]->view;
                $list[$i]->oat = 'class="loadgroup paj" ldt="user" no="'.$f['v3'].'"';
            }
            $list[$i]->ob = $GLOBALS["lang"]->delete;
            $list[$i]->obt = 'class="deval" act="delete"';
            $list[$i]->icon = '';
            $list[$i]->id = '';
            if ($f['seen'] == 0) {
                $list[$i]->count = 1;
                $list[$i]->id = 'class="active"';
            }
            $i = $i+1;
        }
    } else if ($do["type"] === "users" || $do["type"] === "addgroupuser" && $do["ldt"] != "user") {
        if (!isset($GLOBALS["roles"]['users'][4])) {
            exit;
        }
        if (isset($GLOBALS["roles"]['users'][1])) {
            $list[0]->shw = 'shw';
            $list[0]->icn = 'gi-plus';
            $list[0]->mnu = 'udolist';
            $list[0]->act = 'user';
        }
        if ($do["type"] === "addgroupuser") {
            $query = 'SELECT us.id,us.email,us.role,op.v2 AS name,pr.name AS role,';
            $query = $query.'(SELECT count(id) FROM gr_options WHERE type="deaccount" AND v1="yes" AND v3=us.id) AS deaccount,';
            $query = $query.'(SELECT st.v2 FROM gr_options st WHERE st.v3=us.id AND st.type="profile" AND st.v1="status") AS status';
            $query = $query.' FROM gr_users us,gr_options op,gr_permissions pr WHERE us.id=op.v3 AND op.v2 LIKE "%'.$do['search'].'%"';
            $query = $query.' AND us.id NOT IN (SELECT v2 FROM gr_options WHERE type="gruser" AND v1="'.$do["gid"].'")';
            $query = $query.' AND op.type="profile" AND op.v1="name" AND pr.id=us.role ORDER BY name ASC LIMIT '.$lmt.' OFFSET '.$ofs;
        } else {
            $query = 'SELECT us.id,us.email,us.role,op.v2 AS name,pr.name AS role,';
            $query = $query.'(SELECT count(id) FROM gr_options WHERE type="deaccount" AND v1="yes" AND v3=us.id) AS deaccount,';
            $query = $query.'(SELECT st.v2 FROM gr_options st WHERE st.v3=us.id AND st.type="profile" AND st.v1="status") AS status';
            $query = $query.' FROM gr_users us,gr_options op,gr_permissions pr WHERE us.id=op.v3 AND op.v2 LIKE "%'.$do['search'].'%"';
            $query = $query.' AND op.type="profile" AND op.v1="name" AND pr.id=us.role ORDER BY name ASC LIMIT '.$lmt.' OFFSET '.$ofs;
        }
        $lists = db('Grupo', 'q', $query);
        foreach ($lists as $f) {
            $list[$i] = new stdClass();
            $list[$i]->img = gr_img('users', $f['id']);
            $list[$i]->name = $f['name'];
            $list[$i]->ltype = $do["type"];
            $list[$i]->count = 0;
            $list[$i]->sub = $f["role"];
            if ($f["deaccount"] == 1) {
                $list[$i]->sub = $GLOBALS["lang"]->deactivated;
            }
            $list[$i]->right = $GLOBALS["lang"]->options;
            $list[$i]->rtag = 'type="profile" no="'.$f['id'].'"';

            $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
            $list[$i]->oa = $GLOBALS["lang"]->view;
            $list[$i]->oat = 'class="vwp" no="'.$f['id'].'"';
            if (isset($GLOBALS["roles"]['groups'][12]) && $do["type"] === "addgroupuser") {
                $list[$i]->ob = $GLOBALS["lang"]->add;
                $list[$i]->obt = 'act="addgroupuser"';
                $list[$i]->sub = $f["role"];
            } else {
                if (isset($GLOBALS["roles"]['users'][6])) {
                    $list[$i]->ob = $GLOBALS["lang"]->login;
                    $list[$i]->obt = 'class="deval" act="login"';
                }

                if (isset($GLOBALS["roles"]['users'][3]) || isset($GLOBALS["roles"]['users'][8])) {
                    $list[$i]->oc = $GLOBALS["lang"]->act;
                    $list[$i]->oct = 'class="formpop" pn=2 title="'.$GLOBALS["lang"]->take_action.'" do="profile" btn="'.$GLOBALS["lang"]->confirm.'" act="act"';
                }
                if (isset($GLOBALS["roles"]['users'][9])) {
                    $list[$i]->od = $GLOBALS["lang"]->ip_logs;
                    $list[$i]->odt = 'class="mbopen loadside" xtra="'.$f['id'].'" data-block="lside" act="iplogs" side="lside" zero="0" zval="'.$GLOBALS["lang"]->zero_results.'"';
                }
            }
            $list[$i]->icon = "'status ".$f['status']."'";
            $list[$i]->id = 'class="user"';
            $i = $i+1;
        }
    } else if ($do["type"] === "languages") {
        if (!isset($GLOBALS["roles"]['languages'][4])) {
            exit;
        }
        if (isset($GLOBALS["roles"]['languages'][1])) {
            $list[0]->shw = 'shw';
            $list[0]->icn = 'gi-plus';
            $list[0]->mnu = 'udolist';
            $list[0]->act = 'language';
        }
        $deflang = $GLOBALS["default"]->language;
        $lists = db('Grupo', 's', 'phrases', 'type,short LIKE', 'lang', '%'.$do['search'].'%', 'ORDER BY id DESC LIMIT '.$lmt.' OFFSET '.$ofs);
        foreach ($lists as $f) {
            $list[$i] = new stdClass();
            $list[$i]->img = gr_img('languages', $f['id']);
            $list[$i]->name = $f['short'];
            $list[$i]->count = 0;
            $list[$i]->sub = $GLOBALS["lang"]->language;
            if ($deflang == $f['id']) {
                $list[$i]->sub = $GLOBALS["lang"]->default;
                }
                $list[$i]->right = $GLOBALS["lang"]->options;
                $list[$i]->rtag = 'type="language" no="'.$f['id'].'"';
                $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                if (isset($GLOBALS["roles"]['languages'][2])) {
                    $list[$i]->oa = $GLOBALS["lang"]->edit;
                    $list[$i]->oat = 'class="formpop" title="'.$GLOBALS["lang"]->edit_language.'" do="edit" btn="'.$GLOBALS["lang"]->update.'" act="language" data-no="'.$f['id'].'"';
                    if ($f['full'] != 'hide') {
                        $list[$i]->ob = $GLOBALS["lang"]->hide;
                        $list[$i]->obt = 'class="formpop" title="'.$GLOBALS["lang"]->hide_language.'" data-name="'.$f['short'].'" do="language" btn="'.$GLOBALS["lang"]->hide.'" act="hide" data-no="'.$f['id'].'"';
                    } else {
                        $list[$i]->ob = $GLOBALS["lang"]->show;
                        $list[$i]->obt = 'class="formpop" title="'.$GLOBALS["lang"]->show_language.'" data-name="'.$f['short'].'" do="language" btn="'.$GLOBALS["lang"]->show.'" act="show" data-no="'.$f['id'].'"';
                    }
                }
                if (isset($GLOBALS["roles"]['languages'][3]) && $f['id'] != 1) {
                    $list[$i]->oc = $GLOBALS["lang"]->delete;
                    $list[$i]->oct = 'class="formpop" pn=2 title="'.$GLOBALS["lang"]->confirm.'" data-name="'.$f['short'].'" data-no="'.$f['id'].'" do="language" btn="'.$GLOBALS["lang"]->delete.'" act="delete"';
                }
                $list[$i]->icon = "";
                $list[$i]->id = 'class="language"';
                $i = $i+1;
            }
        } else if ($do["type"] === "complaints") {
            if (!empty($do['search'])) {
                $do['search'] = str_replace('comp#', '', $do['search']);
            }
            $query = 'SELECT cp.*,rl.v3,';
            $query = $query.'(SELECT count(id) FROM gr_options WHERE type="gruser" AND v1=cp.id AND v2="'.$uid.'") AS grjoin';
            $query = $query.' FROM gr_complaints cp,gr_options rl WHERE ';
            if (isset($GLOBALS["roles"]['groups'][7])) {
                $query = $query.'rl.type="gruser" AND rl.v1=cp.gid AND rl.v2="'.$uid.'" ';
                $query = $query.'AND cp.gid="'.$do["gid"].'" AND cp.id LIKE "%'.$do['search'].'%" ';
            } else {
                $query = $query.'rl.type="gruser" AND rl.v1=cp.gid AND rl.v2="'.$uid.'" AND rl.v3=2 AND cp.msid<>0 ';
                $query = $query.'AND cp.gid="'.$do["gid"].'" AND cp.id LIKE "%'.$do['search'].'%" ';
                $query = $query.'OR rl.type="gruser" AND rl.v1=cp.gid AND rl.v2="'.$uid.'" AND rl.v3=1 AND cp.msid<>0 ';
                $query = $query.'AND cp.gid="'.$do["gid"].'" AND cp.id LIKE "%'.$do['search'].'%" ';
                $query = $query.'OR rl.type="gruser" AND rl.v1=cp.gid AND rl.v2="'.$uid.'" AND rl.v3=0 ';
                $query = $query.'AND cp.uid="'.$uid.'" AND cp.gid="'.$do["gid"].'" AND cp.id LIKE "%'.$do['search'].'%" ';
            }
            $query = $query.'ORDER BY cp.id DESC LIMIT '.$lmt.' OFFSET '.$ofs;
            $lists = db('Grupo', 'q', $query);
            foreach ($lists as $f) {
                $list[$i] = new stdClass();
                $list[$i]->img = gr_img('users', $f['uid']);
                $list[$i]->name = "COMP#".$f['id'];
                $list[$i]->count = $list[$i]->countag = 0;
                $list[$i]->sub = $GLOBALS["lang"]->under_investigation;
                $list[$i]->count = 1;
                if ($f['status'] == 2) {
                    $list[$i]->sub = $GLOBALS["lang"]->action_taken;
                    $list[$i]->count = 0;
                } else if ($f['status'] == 3) {
                    $list[$i]->sub = $GLOBALS["lang"]->rejected;
                    $list[$i]->count = 0;
                }
                $list[$i]->right = $GLOBALS["lang"]->options;
                $list[$i]->rtag = 'type="group" no="'.$f['gid'].'"';
                $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;

                $list[$i]->ob = $GLOBALS["lang"]->view;
                $list[$i]->obt = 'class="formpop" title="'.$GLOBALS["lang"]->view_complaint.'" do="group" btn="'.$GLOBALS["lang"]->update.'" act="takeaction" data-no="'.$f['id'].'"';
                if (!empty($f['msid'])) {
                    $list[$i]->oa = $GLOBALS["lang"]->proof;
                    $list[$i]->oat = 'class="turnchat goback" data-block="crew" act="msgs" data-msid="'.$f['msid'].'"';
                }
                $list[$i]->icon = "";
                $list[$i]->id = '';
                $i = $i+1;
            }
        } else if ($do["type"] === "rusers") {
            if (!isset($GLOBALS["roles"]['roles'][3])) {
                exit;
            }
            $do["xtra"] = vc($do["xtra"], 'num');
            $query = 'SELECT us.id,us.email,us.role,op.v2 AS name,';
            $query = $query.'(SELECT st.v2 FROM gr_options st WHERE st.v3=us.id AND st.type="profile" AND st.v1="status") AS status';
            $query = $query.' FROM gr_users us,gr_options op WHERE us.id=op.v3 AND us.role="'.$do["xtra"].'" AND ';
            $query = $query.'op.v2 LIKE "%'.$do['search'].'%" AND op.type="profile" AND op.v1="name"';
            $query = $query.' ORDER BY id DESC LIMIT '.$lmt.' OFFSET '.$ofs;
            $lists = db('Grupo', 'q', $query);
            foreach ($lists as $f) {
                $list[$i] = new stdClass();
                $list[$i]->img = gr_img('users', $f['id']);
                $list[$i]->name = $f['name'];
                $list[$i]->count = 0;
                $list[$i]->sub = $f['email'];
                $list[$i]->right = $GLOBALS["lang"]->options;
                $list[$i]->rtag = 'type="profile" no="'.$f['id'].'"';
                $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                $list[$i]->oa = $GLOBALS["lang"]->view;
                $list[$i]->oat = 'class="vwp" no="'.$f['id'].'"';
                if (isset($GLOBALS["roles"]['users'][6])) {
                    $list[$i]->ob = $GLOBALS["lang"]->login;
                    $list[$i]->obt = 'class="deval" act="login"';
                }
                if (isset($GLOBALS["roles"]['users'][3]) || isset($GLOBALS["roles"]['users'][8])) {
                    $list[$i]->oc = $GLOBALS["lang"]->act;
                    $list[$i]->oct = 'class="formpop" pn=2 title="'.$GLOBALS["lang"]->take_action.'" do="profile" btn="'.$GLOBALS["lang"]->confirm.'" act="act"';
                }
                $list[$i]->icon = "'status ".$f['status']."'";
                $list[$i]->id = 'class="user"';
                $i = $i+1;
            }
        } else if ($do["type"] === "iplogs") {
            if (!isset($GLOBALS["roles"]['users'][9])) {
                exit;
            }
            $do["xtra"] = vc($do["xtra"], 'num');
            $query = 'SELECT id,ip,dev,uid FROM gr_utrack';
            $query = $query.' WHERE uid="'.$do["xtra"].'"';
            $query = $query.' AND ip LIKE "%'.$do['search'].'%"';
            $query = $query.' ORDER BY id DESC LIMIT '.$lmt.' OFFSET '.$ofs;
            $lists = db('Grupo', 'q', $query);
            foreach ($lists as $f) {
                $list[$i] = new stdClass();
                $list[$i]->img = 'gem/ore/grupo/icons/iplog.svg';
                $list[$i]->name = $f['ip'];
                if ($list[$i]->name == '::1') {
                    $list[$i]->name = '127.0.0.1';
                }
                $list[$i]->count = 0;
                $ipxt = ipxtract($f['dev']);
                $list[$i]->sub = $ipxt['os'].' - '.$ipxt['browser'];
                $list[$i]->right = $GLOBALS["lang"]->options;
                $list[$i]->rtag = 'type="iplog" no="'.$f['id'].'"';
                $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                $list[$i]->oa = $GLOBALS["lang"]->delete;
                $list[$i]->oat = 'class="formpop" pn=2 title="'.$GLOBALS["lang"]->confirm.'" data-no="'.$f['id'].'" do="profile" btn="'.$GLOBALS["lang"]->delete.'" act="iplogdelete"';
                $list[$i]->icon = "";
                $list[$i]->id = 'class="user"';
                $i = $i+1;
            }
        } else if ($do["type"] === "lastseen") {
            if (isset($do['gmid']) && !empty($do['gmid'])) {
                $do['gmid'] = vc($do['gmid'], 'num');
                $query = 'SELECT gr.v2,(SELECT op.v2 FROM gr_options op WHERE type="profile" AND op.v1="name" AND op.v3=gr.v2 LIMIT 1) AS name,';
                $query = $query.'(SELECT st.v2 FROM gr_options st WHERE st.v3=gr.v2 AND st.type="profile" AND st.v1="status") AS status,';
                $query = $query.'(SELECT count(cm.id) FROM gr_msgs cm WHERE cm.id="'.$do['gmid'].'" AND cm.uid="'.$uid.'") AS verfy';
                $query = $query.' FROM gr_options gr WHERE gr.type="lview" AND gr.v1="'.$do['gid'].'" AND (SELECT op.v2 FROM ';
                $query = $query.'gr_options op WHERE type="profile" AND op.v1="name" AND op.v3=gr.v2 LIMIT 1) LIKE "%'.$do['search'].'%"';
                $query = $query.' AND CAST(gr.v3 AS SIGNED)>='.$do['gmid'].' AND gr.v2<>"'.$uid.'" ORDER BY name ASC LIMIT '.$lmt.' OFFSET '.$ofs;
                $lists = db('Grupo', 'q', $query);
                foreach ($lists as $f) {
                    if ($f['verfy'] != 0) {
                        $list[$i] = new stdClass();
                        $list[$i]->img = gr_img('users', $f['v2']);
                        $list[$i]->name = $f['name'];
                        $list[$i]->count = 0;
                        $varky = $f['status'];
                        $list[$i]->sub = $GLOBALS["lang"]->$varky;
                        $list[$i]->right = $GLOBALS["lang"]->options;
                        $list[$i]->rtag = 'type="profile" no="'.$f['v2'].'"';
                        $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                        $list[$i]->oa = $GLOBALS["lang"]->view;
                        $list[$i]->oat = 'class="vwp" no="'.$f['v2'].'"';
                        if (isset($GLOBALS["roles"]['privatemsg'][1]) && $f['v2'] != $uid) {
                            $list[$i]->ob = $GLOBALS["lang"]->chat;
                            $list[$i]->obt = 'class="loadgroup paj" ldt="user" no="'.$f['v2'].'"';
                        }
                        $list[$i]->icon = "'status ".$f['status']."'";
                        $list[$i]->id = 'class="user"';
                        $i = $i+1;
                    }
                }
            }
        } else if ($do["type"] === "online") {
            if (!isset($GLOBALS["roles"]['users'][5])) {
                exit;
            }
            $r = db('Grupo', 'q', 'SELECT us.name,st.v3,st.tms,st.v2,op.v2 AS fname FROM gr_options op, gr_options st, gr_users us WHERE st.v3 = op.v3 AND st.v3 = us.id AND st.v3 <> "'.$uid.'" AND op.v2 LIKE "%'.$do['search'].'%" AND st.v1="status" AND st.v2="online" AND st.type="profile" AND op.type="profile" AND op.v1="name" OR st.v3 = op.v3 AND st.v3 = us.id AND st.v3 <> "'.$uid.'" AND op.v2 LIKE "%'.$do['search'].'%" AND st.v1="status" AND st.v2="idle" AND st.type="profile" AND op.type="profile" AND op.v1="name" ORDER BY st.v2 DESC LIMIT '.$lmt.' OFFSET '.$ofs);
            foreach ($r as $f) {
                $list[$i] = new stdClass();
                $list[$i]->img = gr_img('users', $f['v3']);
                $list[$i]->name = $f['fname'];
                $list[$i]->count = 0;
                $list[$i]->sub = '';
                $list[$i]->user = '';
                $list[$i]->sub = '@'.$f['name'];
                $list[$i]->right = $GLOBALS["lang"]->options;
                $list[$i]->rtag = 'type="profile" no="'.$f['v3'].'"';
                $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                $list[$i]->oa = $GLOBALS["lang"]->view;
                $list[$i]->oat = 'class="vwp" no="'.$f['v3'].'"';
                if (isset($GLOBALS["roles"]['privatemsg'][1])) {
                    $list[$i]->ob = $GLOBALS["lang"]->chat;
                    $list[$i]->obt = 'class="loadgroup paj" ldt="user" no="'.$f['v3'].'"';
                }
                if (isset($GLOBALS["roles"]['users'][3]) || isset($GLOBALS["roles"]['users'][8])) {
                    $list[$i]->oc = $GLOBALS["lang"]->act;
                    $list[$i]->oct = 'class="formpop" pn=2 title="'.$GLOBALS["lang"]->take_action.'" do="profile" btn="'.$GLOBALS["lang"]->confirm.'" act="act"';
                }
                $list[$i]->icon = "'status ".$f['v2']."'";
                $list[$i]->id = 'class="online"';
                $i = $i+1;
            }
        } else if ($do["type"] === "roles") {
            if (!isset($GLOBALS["roles"]['roles'][3])) {
                exit;
            }
            if (isset($GLOBALS["roles"]['roles'][1])) {
                $list[0]->shw = 'shw';
                $list[0]->icn = 'gi-plus';
                $list[0]->mnu = 'udolist';
                $list[0]->act = 'role';
            }
            $query = 'SELECT rl.id,rl.name,(SELECT count(*) FROM gr_users us WHERE us.role=rl.id)';
            $query = $query.' AS rcount FROM gr_permissions rl WHERE rl.name LIKE "%'.$do['search'].'%"';
            $query = $query.' ORDER BY name ASC LIMIT '.$lmt.' OFFSET '.$ofs;
            $lists = db('Grupo', 'q', $query);
            foreach ($lists as $f) {
                $list[$i] = new stdClass();
                $list[$i]->img = gr_img('roles', $f['id']);
                $list[$i]->name = $f['name'];
                $list[$i]->count = 0;
                $list[$i]->sub = $f['rcount'].' '.$GLOBALS["lang"]->users;
                $list[$i]->right = $GLOBALS["lang"]->options;
                $list[$i]->rtag = 'type="role" no="'.$f['id'].'"';
                $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                if (isset($GLOBALS["roles"]['roles'][3])) {
                    $list[$i]->oa = $GLOBALS["lang"]->users;
                    $list[$i]->oat = 'class="mbopen loadside" xtra="'.$f['id'].'" data-block="rside" act="rusers" side="rside" zero="0" zval="'.$GLOBALS["lang"]->zero_users.'"';
                }
                if (isset($GLOBALS["roles"]['roles'][2])) {
                    $list[$i]->ob = $GLOBALS["lang"]->edit;
                    $list[$i]->obt = 'class="formpop" title="'.$GLOBALS["lang"]->edit_role.'" do="edit" btn="'.$GLOBALS["lang"]->update.'" act="role" data-name="'.$f['name'].'" data-no="'.$f['id'].'"';
                }
                if (isset($GLOBALS["roles"]['roles'][2])) {
                    $list[$i]->oc = $GLOBALS["lang"]->delete;
                    $list[$i]->oct = 'class="formpop" data-name="'.$f['name'].'" data-no="'.$f['id'].'" title="'.$GLOBALS["lang"]->confirm.'" do="role" btn="'.$GLOBALS["lang"]->delete.'" act="delete"';
                }
                $list[$i]->icon = '';
                $list[$i]->id = '';
                $i = $i+1;
            }
        } else if ($do["type"] === "files") {
            if (!isset($GLOBALS["roles"]['files']['5'])) {
                exit;
            }
            if (isset($GLOBALS["roles"]['files'][1])) {
                $list[0]->shw = 'shw';
                $list[0]->icn = 'gi-upload';
                $list[0]->mnu = 'udolist';
                $list[0]->act = 'uploadfile';
            }
            if (!empty($do['search'])) {
                $do['search'] = stripslashes(str_replace('/', '', $do['search']));
                $dir = 'grupo/files/'.$uid.'/*'.$do['search'].'*';
            } else {
                $dir = 'grupo/files/'.$uid.'/';
            }
            $r = flr('list', $dir);
            $r = array_slice($r, $ofs, $lmt);
            foreach ($r as $f) {
                $list[$i] = new stdClass();
                $list[$i]->img = "gem/ore/grupo/ext/default.png";
                $im = "gem/ore/grupo/ext/".pathinfo($f, PATHINFO_EXTENSION).".png";
                $n = basename($f);
                if (file_exists($im)) {
                    $list[$i]->img = $im;
                }
                $list[$i]->name = explode('-gr-', $n, 2)[1];
                $list[$i]->sub = flr('size', $dir.$n);
                $list[$i]->count = '0';
                $list[$i]->right = $GLOBALS["lang"]->options;
                $list[$i]->rtag = 'type="files" no="'.$n.'"';
                $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                if (isset($GLOBALS["roles"]['files'][4])) {
                    $list[$i]->oa = $GLOBALS["lang"]->share;
                    $list[$i]->oat = 'class="mbopen" data-block="panel" act="share"';
                }
                if (isset($GLOBALS["roles"]['files'][2])) {
                    $list[$i]->ob = $GLOBALS["lang"]->zip;
                    $list[$i]->obt = 'class="deval" act="zip"';
                }
                if (isset($GLOBALS["roles"]['files'][3])) {
                    $list[$i]->oc = $GLOBALS["lang"]->delete;
                    $list[$i]->oct = 'class="formpop" pn=2 title="'.$GLOBALS["lang"]->confirm.'" do="files"  btn="'.$GLOBALS["lang"]->delete.'" act="delete"';
                }
                $list[$i]->icon = "";
                $list[$i]->id = 'class="file"';
                $i = $i+1;
            }
        } else if ($do["type"] === "ufields") {
            if (isset($GLOBALS["roles"]['fields'][4])) {
                if (isset($GLOBALS["roles"]['fields'][1])) {
                    $list[0]->shw = 'shw';
                    $list[0]->icn = 'gi-plus';
                    $list[0]->mnu = 'udolist';
                    $list[0]->act = 'customfield';
                }
                $lists = db('Grupo', 'q', 'SELECT cf.id,cf.cat,cf.type,ph.full,ph.type AS phtype,cf.name,ph.lid FROM gr_profiles cf ,gr_phrases ph WHERE cf.type="gfield" AND ph.full LIKE "%'.$do['search'].'%" AND ph.type="phrase" AND ph.short=cf.name AND ph.lid="'.$GLOBALS["lang"]->userlangid.'" OR cf.type="field" AND ph.full LIKE "%'.$do['search'].'%" AND ph.type="phrase" AND ph.short=cf.name AND ph.lid="'.$GLOBALS["lang"]->userlangid.'" ORDER BY id DESC LIMIT '.$lmt.' OFFSET '.$ofs);
                foreach ($lists as $f) {
                    $list[$i] = new stdClass();
                    $list[$i]->img = gr_img('fields', $f['cat']);
                    $varky = $f['name'];
                    $list[$i]->name = $GLOBALS["lang"]->$varky;
                    $list[$i]->count = 0;
                    $varky = $f['cat'];
                    if ($f['type'] == 'field') {
                        $list[$i]->sub = $GLOBALS["lang"]->$varky.' - ('.$GLOBALS["lang"]->profile.')';
                    } else {
                        $list[$i]->sub = $GLOBALS["lang"]->$varky.' - ('.$GLOBALS["lang"]->group.')';
                    }
                    $list[$i]->right = $GLOBALS["lang"]->options;
                    $list[$i]->rtag = 'type="role" no="'.$f['id'].'"';
                    $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                    if (isset($GLOBALS["roles"]['fields'][2])) {
                        $list[$i]->ob = $GLOBALS["lang"]->edit;
                        $list[$i]->obt = 'class="formpop" title="'.$GLOBALS["lang"]->edit_custom_field.'" do="edit" btn="'.$GLOBALS["lang"]->update.'" act="customfield" data-name="'.$f['name'].'" data-no="'.$f['id'].'"';
                    }
                    if (isset($GLOBALS["roles"]['fields'][3])) {
                        $list[$i]->oc = $GLOBALS["lang"]->delete;
                        $list[$i]->oct = 'class="formpop" data-name="'.$f['name'].'" data-no="'.$f['id'].'" title="'.$GLOBALS["lang"]->confirm.'" do="customfield" btn="'.$GLOBALS["lang"]->delete.'" act="delete"';
                    }
                    $list[$i]->icon = '';
                    $list[$i]->id = '';
                    $i = $i+1;
                }
            }
        } else if ($do["type"] === "cmenu") {
            if (isset($GLOBALS["roles"]['sys'][6])) {
                $list[0]->shw = 'shw';
                $list[0]->icn = 'gi-plus';
                $list[0]->mnu = 'udolist';
                $list[0]->act = 'menuitem';
                $lists = db('Grupo', 'q', 'SELECT cf.id,ph.type AS phtype,cf.v1,ph.lid FROM gr_options cf ,gr_phrases ph WHERE cf.type="menuitem" AND ph.full LIKE "%'.$do['search'].'%" AND ph.type="phrase" AND ph.short=cf.v1 AND ph.lid="'.$GLOBALS["lang"]->userlangid.'" ORDER BY v3 ASC LIMIT '.$lmt.' OFFSET '.$ofs);
                foreach ($lists as $f) {
                    $list[$i] = new stdClass();
                    $list[$i]->img = gr_img('groups', 0);
                    $varky = $f['v1'];
                    $list[$i]->name = $GLOBALS["lang"]->$varky;
                    $list[$i]->count = 0;
                    $list[$i]->sub = $GLOBALS["lang"]->menu_item;
                    $list[$i]->right = $GLOBALS["lang"]->options;
                    $list[$i]->rtag = 'type="cmenu" no="'.$f['id'].'"';
                    $list[$i]->oa = $list[$i]->ob = $list[$i]->oc = 0;
                    $list[$i]->ob = $GLOBALS["lang"]->edit;
                    $list[$i]->obt = 'class="formpop" title="'.$GLOBALS["lang"]->edit_menu_item.'" do="edit" btn="'.$GLOBALS["lang"]->update.'" act="menuitem" data-name="'.$f['name'].'" data-no="'.$f['id'].'"';
                    $list[$i]->oc = $GLOBALS["lang"]->delete;
                    $list[$i]->oct = 'class="formpop" data-name="'.$f['v1'].'" data-no="'.$f['id'].'" title="'.$GLOBALS["lang"]->confirm.'" do="menuitem" btn="'.$GLOBALS["lang"]->delete.'" act="delete"';
                    $list[$i]->icon = '';
                    $list[$i]->id = '';
                    $i = $i+1;
                }
            }
        } else if ($do["type"] === "getuserinfo") {
            $i = 0;
            unset($list[0]);
            $list[$i] = new stdClass();
            $list[$i]->id = vc($do['id'], 'num');
            $list[$i]->edit = 0;
            $list[$i]->btn = $GLOBALS["lang"]->message;
            $list[$i]->tbclass = 'loadgroup';
            $list[$i]->tbattr = 'no="'.$do['id'].'" ldt="user"';
            $list[$i]->msgoffmsg = $list[$i]->msgoff = 0;
            if (isset($do['ldt']) && $do['ldt'] == 'group') {
                $query = 'SELECT gr.v1,gr.v2,gr.v3,gr.v4,gr.v5,gr.v6,gr.tms,';
                $query = $query.'(SELECT count(*) FROM gr_msgs lk WHERE lk.type="like" AND lk.gid="'.$do['id'].'") AS likes,';
                $query = $query.'(SELECT IFNULL((SELECT CASE WHEN tz.v2="Auto" THEN ';
                $query = $query.'(SELECT am.v2 FROM gr_options am WHERE am.type="profile" AND am.v1="autotmz" AND am.v3=tz.v3)';
                $query = $query.' ELSE tz.v2 END AS timz FROM gr_options tz WHERE tz.type="profile" AND tz.v1="tmz" AND tz.v3="'.$uid.'"),';
                $query = $query.'"'.$GLOBALS["default"]->timezone.'")) AS timezone,';
                $query = $query.'(SELECT count(*) FROM gr_options mc WHERE mc.type="gruser" AND mc.v1="'.$do['id'].'") AS mcount';
                $query = $query.' FROM gr_options gr WHERE gr.type="group" AND gr.id="'.$do['id'].'"';
                $query = $query.' LIMIT 1';
                $r = db('Grupo', 'q', $query);
                $list[$i]->img = gr_img('groups', $do['id']);
                $list[$i]->msgoff = 2;
                $list[$i]->uname = $GLOBALS["lang"]->public_group;
                $list[$i]->shares = gr_shnum($r[0]['mcount']);
                $list[$i]->loves = gr_shnum($r[0]['likes']);
                $list[$i]->mna = $GLOBALS["lang"]->hearts;
                $list[$i]->mnb = $GLOBALS["lang"]->members;
                $list[$i]->mnc = $GLOBALS["lang"]->created_on;
                $list[$i]->cp = gr_img('coverpic/groups', $do['id']);
                $list[$i]->tbclass = 'formpop';
                if ($r[0]['v6'] != 'unleavable') {
                    $list[$i]->btn = $GLOBALS["lang"]->leave_group;
                    $list[$i]->tbattr = 'pn="1" title="'.$GLOBALS["lang"]->leave_group.'" do="group" btn="'.$GLOBALS["lang"]->leave_group.'" act="leave"';
                } else {
                    $list[$i]->btn = $GLOBALS["lang"]->report_group;
                    $list[$i]->tbattr = 'class="formpop" pn="1" title="'.$GLOBALS["lang"]->report_group.'" do="group" btn="'.$GLOBALS["lang"]->report.'" act="reportmsg"';
                }
                if (isset($r[0])) {
                    $list[$i]->name = html_entity_decode($r[0]['v1']);
                    if (!empty($r[0]['v2'])) {
                        $list[$i]->uname = $GLOBALS["lang"]->protected_group;
                    }
                    if ($r[0]['v3'] == 'secret') {
                        $list[$i]->uname = $GLOBALS["lang"]->secret_group;
                    }
                } else {
                    $list[$i]->name = $GLOBALS["lang"]->unknown;
                }
                $tms = new DateTime($r[0]['tms']);
            } else {
                $query = 'SELECT us.name AS uname,us.altered,';
                $query = $query.'(SELECT count(*) FROM gr_msgs lk WHERE lk.type="like" AND lk.xtra="'.$do['id'].'") AS likes,';
                $query = $query.'(SELECT count(*) FROM gr_msgs sc WHERE sc.type="file" AND sc.uid="'.$do['id'].'") AS scount,';
                $query = $query.'(SELECT IFNULL((SELECT CASE WHEN tz.v2="Auto" THEN ';
                $query = $query.'(SELECT am.v2 FROM gr_options am WHERE am.type="profile" AND am.v1="autotmz" AND am.v3=tz.v3)';
                $query = $query.' ELSE tz.v2 END AS timz FROM gr_options tz WHERE tz.type="profile" AND tz.v1="tmz" AND tz.v3="'.$uid.'"),';
                $query = $query.'"'.$GLOBALS["default"]->timezone.'")) AS timezone,';
                $query = $query.'(SELECT tms FROM gr_utrack WHERE uid="'.$do['id'].'" LIMIT 1) AS lastlg,';
                $query = $query.'(SELECT v2 FROM gr_options WHERE v3="'.$do['id'].'" AND type="profile" AND v1="name") AS name';
                $query = $query.' FROM gr_users us WHERE us.id="'.$do['id'].'" LIMIT 1';
                $r = db('Grupo', 'q', $query);
                $list[$i]->shares = gr_shnum($r[0]['scount']);
                $list[$i]->loves = gr_shnum($r[0]['likes']);
                $list[$i]->mna = $GLOBALS["lang"]->hearts;
                $list[$i]->mnb = $GLOBALS["lang"]->shares;
                $list[$i]->mnc = $GLOBALS["lang"]->last_login;
                $list[$i]->img = gr_img('users', $do['id']);
                $list[$i]->cp = gr_img('coverpic/users', $do['id']);
                if (isset($GLOBALS["roles"]['users'][2]) && $do['id'] != $uid && $r[0]['uname'] != $unq) {
                    if (isset($r[0]['uname'])) {
                        $list[$i]->edit = 1;
                    }
                }
                if (!isset($GLOBALS["roles"]['privatemsg'][1]) || !isset($r[0]['uname'])) {
                    $list[$i]->msgoff = 2;
                    $list[$i]->msgoffmsg = $GLOBALS["lang"]->denied;
                    if (!isset($usrn['name'])) {
                        $list[$i]->msgoffmsg = $GLOBALS["lang"]->profile_noexists;
                    }
                    $list[$i]->tbclass = 'say';
                    $list[$i]->btn = $GLOBALS["lang"]->message;
                    $list[$i]->tbattr = 'type="e" say="'.$list[$i]->msgoffmsg.'"';

                }
                if ($do['id'] == $uid) {
                    $list[$i]->msgoff = 2;
                    $list[$i]->tbclass = 'editprf';
                    $list[$i]->tbattr = 'type="editprofile"';
                    $list[$i]->btn = $GLOBALS["lang"]->edit_profile;
                }
                $list[$i]->name = $r[0]['name'];
                if (isset($r[0]['uname']) && !empty($r[0]['uname'])) {
                    $list[$i]->uname = '@'.$r[0]['uname'];
                } else {
                    $list[$i]->uname = $GLOBALS["lang"]->unknown;
                }
                if (!empty($r[0]['lastlg'])) {
                    $tms = new DateTime($r[0]['lastlg']);
                } else if (isset($r[0]['uname'])) {
                    $tms = new DateTime($r[0]['altered']);
                } else {
                    $tms = new DateTime();
                }
            }
            $tmz = new DateTimeZone($r[0]['timezone']);
            $tms->setTimezone($tmz);
            $tmst = strtotime($tms->format('Y-m-d H:i:s'));
            $list[$i]->lastlg = $tms->format('d-m-y');
            if ($GLOBALS["default"]->time_format == 24) {
                $list[$i]->lastlgtm = $tms->format('H:i:s');
            } else {
                $list[$i]->lastlgtm = $tms->format('h:i:s a');
            }
            $cfield = 'field';
            $fieldtyp = 'profile';
            if (isset($do['ldt']) && $do['ldt'] == 'group') {
                $cfield = 'gfield';
                $fieldtyp = 'group';
            }
            $query = 'SELECT ds.type as name,ds.v2 as val,ds.id as cat FROM gr_options ds WHERE ds.type="gdescp" AND ds.v1="'.$do['id'].'"';
            $query = $query.' UNION SELECT pr.name,vl.v1,pr.cat';
            $query = $query.' FROM gr_profiles pr,gr_profiles vl WHERE vl.uid="'.$do['id'].'"';
            $query = $query.' AND vl.type="'.$fieldtyp.'" AND vl.name=pr.id AND pr.type="'.$cfield.'"';
            $r = db('Grupo', 'q', $query);
            foreach ($r as $f) {
                $pf = $f['name'];
                $vpf = html_entity_decode($f['val']);
                $list[$pf] = new stdClass();
                $list[$pf]-> cont = $vpf;
                if ($f['name'] == 'gdescp') {
                    $list[$pf]-> name = $GLOBALS["lang"]->description;
                } else {
                    $varky = $f['name'];
                    $list[$pf]-> name = $GLOBALS["lang"]->$varky;
                    if ($f['cat'] == 'datefield') {
                        $list[$pf]-> cont = date("d-M-Y", strtotime($list[$pf]-> cont));
                    }
                }
            }

        } else if ($do["type"] === "memsearch") {
            $i = 0;
            unset($list[0]);
            $do['ser'] = vc($do['ser']);
            if (!empty($do['ser'])) {
                $query = 'SELECT us.id,us.v1,op.v2 AS name,us.v3,us.v2,';
                $query = $query.'(SELECT name FROM gr_users un WHERE un.id=us.v2 LIMIT 1) as uname';
                $query = $query.' FROM gr_options us,gr_options op WHERE ';
                $query = $query.'us.v2=op.v3 AND op.type="profile" AND us.v2<>"'.$uid.'" AND op.v1="name" AND ';
                $query = $query.'us.type="gruser" AND op.v2 LIKE "%'.$do['ser'].'%" AND us.v1="'.$do["gid"].'" ';
                $query = $query.'OR us.v2=op.v3 AND op.type="profile" AND us.v2<>"'.$uid.'" AND op.v1="name" AND ';
                $query = $query.'us.type="gruser" AND op.v4 LIKE "%'.$do['ser'].'%" AND us.v1="'.$do["gid"].'" ';
                $query = $query.'ORDER BY op.v2 ASC LIMIT 5';
                $rs = db('Grupo', 'q', $query);
                foreach ($rs as $f) {
                    $list[$i] = new stdClass();
                    $list[$i]->img = gr_img('users', $f['v2']);
                    $list[$i]->name = $f['name'];
                    $list[$i]->uname = $f['uname'];
                    $i = $i+1;
                }
            }
        }
        $r = json_encode($list);
        gr_prnt($r);
    }
    ?>