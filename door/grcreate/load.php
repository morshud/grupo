<?php if(!defined('s7V9pz')) {die();}?><?php
function gr_create() {
    $uid = $GLOBALS["user"]['id'];
    $arg = func_get_args();
    if ($arg[0] === 'group') {
        if (!gr_role('access', 'groups', '1')) {
            exit;
        }
        if (!empty($arg[1]['name'])) {
            $passw = 0;
            if (empty($arg[1]['password'])) {
                $passw = $arg[1]['password'] = 0;
            } else if (isset($GLOBALS["roles"]['groups'][15])) {
                $passw = md5($arg[1]['password']);
            }
            $cr = db('Grupo', 's,count(*)', 'options', 'type,v1', 'group', strtolower($arg[1]['name']))[0][0];
            if ($cr == 0) {
                $ncode = $code = rn(6).rn(4);;
                if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
                    $ext = pathinfo($_FILES['img']['name'])['extension'];
                    $ncode = $code.'.'.$ext;
                }
                if (!empty($arg[1]['visibility']) && isset($GLOBALS["roles"]['groups'][14])) {
                    $arg[1]['visibility'] = 'secret';
                }
                if (!empty($arg[1]['sendperm'])) {
                    $arg[1]['sendperm'] = 'adminonly';
                }
                if (!empty($arg[1]['unleavable']) && isset($GLOBALS["roles"]['groups'][13])) {
                    $arg[1]['unleavable'] = 'unleavable';
                }
                $r = db('Grupo', 'i', 'options', 'type,v1,v2,v3,v4,v5,v6,tms', 'group', $arg[1]['name'], $passw, $arg[1]['visibility'], rn(6), $arg[1]['sendperm'], $arg[1]['unleavable'], dt());
                if (!empty($arg[1]['description'])) {
                    db('Grupo', 'i', 'options', 'type,v1,v2,tms', 'gdescp', $r, $arg[1]['description'], dt());
                }
                $dt = array();
                $dt['id'] = $r;
                $dt['msg'] = 'created_group';
                if (isset($GLOBALS["roles"]['groups'][15])) {
                    $dt['password'] = $arg[1]['password'];
                }
                gr_group('join', $dt, 1);
                gr_group('sendmsg', $dt, 1, 1);
                if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
                    $icon = $r.'-gr-'.$code;
                    if (flr('upload', 'img', 'grupo/groups/', $icon, 'jpg,jpeg,png,gif', 1, 1)) {
                        flr('resize', 'grupo/groups/'.$icon.'.'.$ext, 0, 150, 150, 1);
                    }
                }
                if (!empty($_FILES['cpic']['name'])) {
                    $bg = $r.'-gr-'.rn(10);
                    $ext = pathinfo($_FILES['cpic']['name'])['extension'];
                    foreach (glob("gem/ore/grupo/coverpic/groups/".$r."-gr-*.*") as $filename) {
                        unlink($filename);
                    }
                    if (flr('upload', 'cpic', 'grupo/coverpic/groups/', $bg, 'jpg,jpeg,png,gif', 0, 1)) {
                        flr('resize', 'grupo/coverpic/groups/'.$bg.'.'.$ext, 0, 400, 216, 1);
                    }

                }
                gr_prnt('$(".swr-grupo .lside > .tabs > ul > li[act=groups]").attr("list",'.$dt['id'].').trigger("click");say("'.$GLOBALS["lang"]->created.'","s");$(".grupo-pop").fadeOut();');
            } else {
                gr_prnt('say("'.$GLOBALS["lang"]->already_exists.'");');
            }
        } else {
            gr_prnt('say("'.$GLOBALS["lang"]->invalid_value.'");');
        }
    } else if ($arg[0] === 'menuitem') {
        if (gr_role('access', 'sys', '6')) {
            $arg[1]['ltext'] = vc($arg[1]['ltext'], 'strip');
            $arg[1]['morder'] = vc($arg[1]['morder'], 'num');
            $arg[1]['url'] = vc($arg[1]['url'], 'url');
            if (!empty($arg[1]['ltext']) && !empty($arg[1]['url'])) {
                if (empty($arg[1]['morder'])) {
                    $arg[1]['morder'] = 0;
                }
                $r = db('Grupo', 'i', 'options', 'type,v2,v3,tms', 'menuitem', $arg[1]['url'], $arg[1]['morder'], dt());
                $shrt = "mni_".vc($r, 'num');
                db('Grupo', 'u', 'options', 'v1', 'type,id', $shrt, 'menuitem', $r);
                $dlng = db('Grupo', 's', 'phrases', 'type', 'lang');
                foreach ($dlng as $dl) {
                    db('Grupo', 'i', 'phrases', 'type,short,full,lid', 'phrase', $shrt, $arg[1]['ltext'], $dl['id']);
                    gr_cache('languages', $dl['id']);
                }
                gr_prnt('say("'.$GLOBALS["lang"]->created.'","s");window.location.href = "";$(".grupo-pop").fadeOut();');
            } else {
                gr_prnt('say("'.$GLOBALS["lang"]->invalid_value.'");');
            }
        }
    } else if ($arg[0] === 'language') {
        if (gr_role('access', 'languages', '1')) {
            $arg[1]['name'] = vc($arg[1]['name'], 'strip');
            if (!empty($arg[1]['name'])) {
                $cr = db('Grupo', 's,count(*)', 'phrases', 'type,short', 'lang', strtolower($arg[1]['name']))[0][0];
                if ($cr == 0) {
                    $ncode = $code = rn(6).rn(4);;
                    if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
                        $ext = pathinfo($_FILES['img']['name'])['extension'];
                        $ncode = $code.'.'.$ext;
                    }
                    $lgid = $r = db('Grupo', 'i', 'phrases', 'type,short', 'lang', $arg[1]['name']);
                    $dlng = db('Grupo', 's', 'phrases', 'lid,type', 1, 'phrase');
                    foreach ($dlng as $dl) {
                        db('Grupo', 'i', 'phrases', 'type,short,full,lid', 'phrase', $dl['short'], $dl['full'], $r);
                    }
                    if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
                        $icon = $r.'-gr-'.$code;
                        if (flr('upload', 'img', 'grupo/languages/', $icon, 'jpg,jpeg,png,gif', 1, 1)) {
                            flr('resize', 'grupo/languages/'.$icon.'.'.$ext, 0, 150, 150, 1);
                        }
                    }
                    gr_cache('languages', $lgid);
                    gr_prnt('say("'.$GLOBALS["lang"]->created.'","s");menuclick("mmenu","languages");$(".grupo-pop").fadeOut();window.location.href = "";');
                } else {
                    gr_prnt('say("'.$GLOBALS["lang"]->already_exists.'");');
                }
            } else {
                gr_prnt('say("'.$GLOBALS["lang"]->invalid_value.'");');
            }
        }
    } else if ($arg[0] === 'customfield') {
        if (gr_role('access', 'fields', '1')) {
            $arg[1]['name'] = vc($arg[1]['name'], 'strip');
            $arg[1]['ftype'] = vc($arg[1]['ftype'], 'alpha');
            if (!empty($arg[1]['name']) && !empty($arg[1]['ftype'])) {
                $opts = $req = 0;
                $shrt = trim(preg_replace('/\s+/', ' ', $arg[1]['name']));
                $shrt = "cf_".strtolower(str_replace(" ", "_", $shrt));
                $chkcf = db('Grupo', 's', 'phrases', 'short', $shrt);
                if (count($chkcf) > 0) {
                    gr_prnt('say("'.$GLOBALS["lang"]->already_exists.'");');
                } else if ($arg[1]['ftype'] == 'dropdownfield' && empty($arg[1]['options'])) {
                    gr_prnt('say("'.$GLOBALS["lang"]->invalid_value.'");');
                } else {
                    if (!empty($arg[1]['required']) && !empty($arg[1]['addtosignup'])) {
                        $req = 3;
                    } else if (!empty($arg[1]['addtosignup'])) {
                        $req = 2;
                    } else if (!empty($arg[1]['required'])) {
                        $req = 1;
                    }
                    if ($arg[1]['ftype'] == 'dropdownfield' && !empty($arg[1]['options'])) {
                        $opts = $arg[1]['options'];
                    }
                    $catfield = 'field';
                    if (!empty($arg[1]['category'])) {
                        $catfield = 'gfield';
                    }
                    $r = db('Grupo', 'i', 'profiles', 'type,name,cat,v1,req', $catfield, 'cf_', $arg[1]['ftype'], $opts, $req);
                    $shrt = "cf_".vc($r, 'num');
                    db('Grupo', 'u', 'profiles', 'name', 'type,cat,id', $shrt, $catfield, $arg[1]['ftype'], $r);
                    $dlng = db('Grupo', 's', 'phrases', 'type', 'lang');
                    foreach ($dlng as $dl) {
                        db('Grupo', 'i', 'phrases', 'type,short,full,lid', 'phrase', $shrt, $arg[1]['name'], $dl['id']);
                        gr_cache('languages', $dl['id']);
                    }
                    gr_prnt('say("'.$GLOBALS["lang"]->created.'","s");menuclick("mmenu","ufields");$(".grupo-pop").fadeOut();');
                }
            } else {
                gr_prnt('say("'.$GLOBALS["lang"]->invalid_value.'");');
            }
        }
    } else if ($arg[0] === 'role') {
        if (!gr_role('access', 'roles', '1')) {
            exit;
        }
        $arg[1]['name'] = vc($arg[1]['name'], 'strip');
        if (isset($arg[1]["name"]) && !empty($arg[1]["name"])) {
            if (!isset($arg[1]['group'])) {
                $arg[1]['group'] = null;
            } else {
                $arg[1]['group'] = implode(',', $arg[1]['group']);
            }
            if (!isset($arg[1]['files'])) {
                $arg[1]['files'] = null;
            } else {
                $arg[1]['files'] = implode(',', $arg[1]['files']);
            }
            if (!isset($arg[1]['users'])) {
                $arg[1]['users'] = null;
            } else {
                $arg[1]['users'] = implode(',', $arg[1]['users']);
            }
            if (!isset($arg[1]['languages'])) {
                $arg[1]['languages'] = null;
            } else {
                $arg[1]['languages'] = implode(',', $arg[1]['languages']);
            }
            if (!isset($arg[1]['sys'])) {
                $arg[1]['sys'] = null;
            } else {
                $arg[1]['sys'] = implode(',', $arg[1]['sys']);
            }
            if (!isset($arg[1]['roles'])) {
                $arg[1]['roles'] = null;
            } else {
                $arg[1]['roles'] = implode(',', $arg[1]['roles']);
            }
            if (!isset($arg[1]['features'])) {
                $arg[1]['features'] = null;
            } else {
                $arg[1]['features'] = implode(',', $arg[1]['features']);
            }
            if (!isset($arg[1]['fields'])) {
                $arg[1]['fields'] = null;
            } else {
                $arg[1]['fields'] = implode(',', $arg[1]['fields']);
            }
            if (!isset($arg[1]['autodel']) || empty(vc($arg[1]['autodel'], 'num'))) {
                $arg[1]['autodel'] = "Off";
            }
            if (!isset($arg[1]['autounjoin']) || empty(vc($arg[1]['autounjoin'], 'num'))) {
                $arg[1]['autounjoin'] = "Off";
            }
            if (!isset($arg[1]['privatemsg'])) {
                $arg[1]['privatemsg'] = null;
            } else {
                $arg[1]['privatemsg'] = implode(',', $arg[1]['privatemsg']);
            }
            if (isset($arg[1]['delofflineuser']) && !empty($arg[1]['delofflineuser'])) {
                if ($arg[1]['privatemsg'] == null) {
                    $arg[1]['privatemsg'] = 10;
                } else {
                    $arg[1]['privatemsg'] = $arg[1]['privatemsg'].',10';
                }
            }
            $r = db('Grupo', 'i', 'permissions', 'name,groups,files,users,features,languages,sys,roles,fields,privatemsg,autodel,autounjoin', $arg[1]["name"], $arg[1]['group'], $arg[1]['files'], $arg[1]['users'], $arg[1]['features'], $arg[1]['languages'], $arg[1]['sys'], $arg[1]['roles'], $arg[1]['fields'], $arg[1]['privatemsg'], $arg[1]['autodel'], $arg[1]['autounjoin']);
            if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
                $code = rn(6).rn(4);;
                $ext = pathinfo($_FILES['img']['name'])['extension'];
                $icon = $r.'-gr-'.$code;
                if (flr('upload', 'img', 'grupo/roles/', $icon, 'jpg,jpeg,png,gif', 1, 1)) {
                    flr('resize', 'grupo/roles/'.$icon.'.'.$ext, 0, 150, 150, 1);
                }
            }
            gr_cache('roles');
            gr_prnt('say("'.$GLOBALS["lang"]->created.'","s");menuclick("mmenu","roles");$(".grupo-pop").fadeOut();');
        } else {
            gr_prnt('say("'.$GLOBALS["lang"]->invalid_value.'");');
        }
    } else if ($arg[0] === 'user') {
        if (!gr_role('access', 'users', '1')) {
            exit;
        }
        $arg[1]['name'] = vc($arg[1]['name'], 'strip');
        if (empty($arg[1]["fname"])) {
            $arg[1]["name"] = '';
        }
        $role = 3;
        if (isset($arg[1]["role"]) && !empty($arg[1]["role"])) {
            $role = $arg[1]["role"];
        }
        $reg = usr('Grupo', 'register', $arg[1]["name"], $arg[1]["email"], $arg[1]["pass"], $role);
        if ($reg[0]) {
            $id = $reg[1];
            gr_data('i', 'profile', 'name', $arg[1]["fname"], $id, $arg[1]["name"], gr_usrcolor());
            if ($role == 1) {
                gr_mail('verify', $id, 0, rn(5), 1);
            }
            gr_prnt('say("'.$GLOBALS["lang"]->created.'","s");menuclick("mmenu","users");$(".grupo-pop").fadeOut();');
            $grjoin = $GLOBALS["default"]->autogroupjoin;
            if (!empty($grjoin)) {
                $cr = gr_group('valid', $grjoin);
                if ($cr[0]) {
                    gr_data('i', 'gruser', $grjoin, $id, 0);
                    $dt = array();
                    $dt['id'] = $grjoin;
                    $dt['msg'] = 'joined_group';
                    gr_group('sendmsg', $dt, 1, 1, $id);
                }
            }
            if ($arg[1]["sent"] == 1) {
                gr_mail('signup', $id, 0, rn(5), 1);
            }
        } else {
            if ($reg[1] === 'invalid') {
                $reg[1] = $GLOBALS["lang"]->invalid_value;
            } else if ($reg[1] === 'exist') {
                $reg[1] = $GLOBALS["lang"]->already_exists;
            }
            gr_prnt('say("'.$reg[1].'");');
        }
    }
}
?>