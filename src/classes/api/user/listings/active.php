<?php

//active.php
##########GIT Build Data##########
##
## File Changed In GIT Commit:
## 
##    7.5.3-36-gea36ae7
##
##################################

if (!defined('IN_GEO_API')) {
    exit('No access.');
}

//generic error to give in any situation where user/pass/token is not working.
$generic_error = 'The username or user token was incorrect or was not specified, or user is not active; request to get active listings has failed.';

//get the user based on the username and token
if (!isset($args['username']) || !trim($args['username']) || !isset($args['token']) || !trim($args['token'])) {
    //username required!
    return $this->failure(__line__ . $generic_error);
}
$username = trim($args['username']);
$token = trim($args['token']);

if (!$this->checkUserToken($username, $token)) {
    //token is not valid
    return $this->failure($generic_error);
}

$user = geoUser::getUser($username);

if (!$user) {
    //problem getting user?
    return $this->failure("Problem getting information about user.");
}

if ($user->id <= 1 || !$user->status) {
    //do NOT let admin user do anything, or anyone that is disabled...
    return $this->failure($generic_error);
}

//get list of active listings placed by user
$classT = geoTables::classifieds_table;
$query = new geoTableSelect($classT);

$query->where("$classT.`live`=1", 'live')
    ->where("$classT.`seller`={$user->id}")
    ->order("$classT.`date` DESC");

//done with the user
unset($user);

//let common file do all the main stuff
return require API_DIR . 'user/listings/_common.php';
