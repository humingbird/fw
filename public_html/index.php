<?php
require_once(getenv("CONF")."web.conf.php");

require_once WebConf::$home_dir.'framework/Router.php';

$exec = new Router;

?>