<?php if(!defined('s7V9pz')) {die();}?><?php
function gr_install($do) {
    if (pg() == 'install/' || pg() == 'update/') {
        error_reporting(0);
        ob_get_clean();
        if (!extension_loaded('fileinfo') OR !function_exists('mime_content_type')) {
            pr('Requires php fileinfo extension'); exit;
        } else if (isset($do["act"])) {
            if ($do["do"] == "install") {
                $bit = "key/bit.php";
                $cache_folder = 'gem/ore/grupo/cache/';
                $do['email'] = vc(trim($do['email']), 'email');
                $do['username'] = vc($do['username'], 'alphanum');
                $install[0] = new stdClass();
                $install[0]->install = 'invalid';
                $do['encde'] = "1";
                $install[0]->install = 'invalid';
                $do['encde'] = 1;
                
                if (!empty($do['email']) && !empty($do['encde'])) {
                    if (empty($do['site']) && empty($do['username'])) {
                        if (!empty($do['db']) && !empty($do['host']) && !empty($do['user'])) {
                            if (dbc($do, 1)) {
                                if (is_writable($bit)) {
                                    $o = file_get_contents($bit);
                                    $o = preg_replace("/'host' => '([^']+(?='))'/", "'host' => '".$do['host']."'", $o);
                                    $o = preg_replace("/'db' => '([^']+(?='))'/", "'db' => '".$do['db']."'", $o);
                                    $o = preg_replace("/'user' => '([^']+(?='))'/", "'user' => '".$do['user']."'", $o);
                                    $o = preg_replace("/'pass' => '([^']+(?='))'/", "'pass' => '".$do['pass']."'", $o);
                                    file_put_contents($bit, $o);
                                    $sql = file_get_contents('key/install.sql');
                                    $db = new PDO("mysql:host=".$do['host']."; dbname=".$do['db'].";charset=utf8mb4", $do['user'], $do['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
                                    $qr = $db->exec($sql);
                                    $install[0]->install = 'next';
                                } else {
                                    $install[0]->install = 'filepermissions';
                                }
                            } else {
                                $install[0]->install = 'wrongcredentials';
                            }
                        }
                        gdbcnt($do);
                    } else if (!empty($do['username']) && !empty($do['password']) && !empty($do['url'])) {
                        $o = file_get_contents($bit);
                        if (substr($do['url'], -1) != '/') {
                            $do['url'] = $do['url'].'/';
                        }
                        $o = preg_replace('/"url" => "([^"]+(?="))"/', '"url" => "'.$do['url'].'"', $o);
                        file_put_contents($bit, $o);
                        $db['host'] = $do['host'];
                        $db['db'] = $do['db'];
                        $db['user'] = $do['user'];
                        $db['pass'] = $do['pass'];
                        $db['prefix'] = 'gr_';
                        db($db, 'u', 'defaults', 'v2', 'type,v1|,v1', $do['site'], 'default', 'sitename', 'sendername');
                        db($db, 'u', 'defaults', 'v2', 'type,v1', $do['email'], 'default', 'sysemail');
                        usr($db, 'alter', 'name', $do['username'], 1);
                        usr($db, 'alter', 'email', $do['email'], 1);
                        usr($db, 'alter', 'pass', $do['password'], 1);
                        gr_cache('settings');
                        rename('knob/update.php', 'knob/update'.rn(7).'.php');
                        if (!rename('knob/install.php', 'knob/install'.rn(7).'.php')) {
                            @unlink($cache_folder.'csqueries.cch');
                            $install[0]->install = 'renameinstall';
                        } else {
                            $install[0]->install = 'completed';
                        }
                    }
                }
            } else if ($do["do"] == "update") {
                $cache_folder = 'door/grinstall/';
                $install[0] = new stdClass();
                $install[0]->update = 'invalid';
                $do['encde'] = trim($do['encde']);
                $install[0]->update = 'invalid';
                $do['encde'] = 1;
                
                if (!empty($do['encde'])) {
                    $do = cnf('Grupo');
                    $sdumb = file_get_contents($cache_folder.'csquplog.cch');
                    $db = new PDO("mysql:host=".$do['host']."; dbname=".$do['db'].";charset=utf8mb4", $do['user'], $do['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
                    $qr = $db->exec($sdumb);
                    setcookie('actredirect', 'reset/', 0, "/");
                    if (!rename('knob/update.php', 'knob/update'.rn(7).'.php')) {
                        @unlink($cache_folder.'csquplog.cch');
                        $install[0]->update = 'renameupdate';
                    } else {
                        $install[0]->update = 'completed';
                    }
                }
            }
            $r = json_encode($install);
            gr_prnt($r);
            exit;
        }
    } else {
        if (file_exists('knob/install.php')) {
            rt('install');
        } else {
            rt('update');
        }
    }
}
?>