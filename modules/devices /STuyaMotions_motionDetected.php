<?php

$ot = $this->object_title;
if (!isset($params['statusUpdated'])) {
    setTimeout($ot . '_motion_timer_status', '', 3);
}

if (isset($params['VALUE']) && !$params['VALUE'] && !isset($params['statusUpdated'])) {
    $this->setProperty('status', 0);
    return;
}

$motion_timeout = $this->getProperty('timeout'); // seconds timeout
if (!$motion_timeout) {
    $motion_timeout = 20; // timeout by default
}
$nobodysHome = getGlobal('NobodyHomeMode.active');

if (!isset($params['statusUpdated'])) {
    $this->setProperty('status', 1);
}
setTimeout($ot . '_motion_timer', 'setGlobal("' . $ot . '.status", 0);', $motion_timeout);

if ($nobodysHome && $this->getProperty('ignoreNobodysHome')) {
    return;
}

//$this->callMethod('logicAction');
$nobodyhome_timeout = 1 * 60 * 60;
if (defined('SETTINGS_BEHAVIOR_NOBODYHOME_TIMEOUT')) {
    $nobodyhome_timeout = SETTINGS_BEHAVIOR_NOBODYHOME_TIMEOUT * 60;
}

$is_blocked=(int)$this->getProperty('blocked');
if ($is_blocked) {
    return;
}

$resetNobodysHome=$this->getProperty('resetNobodysHome');
$noTimeNobodysHome=$this->getProperty('noTimeNobodysHome');
if ($nobodyhome_timeout && !$resetNobodysHome && !$noTimeNobodysHome) {
    setTimeOut('nobodyHome', "callMethodSafe('NobodyHomeMode.activate');", $nobodyhome_timeout);
} elseif ($resetNobodysHome) {
    clearTimeout('nobodyHome');
}

$linked_room = $this->getProperty('linkedRoom');
if ($linked_room) {
    callMethodSafe($linked_room . '.onActivity', array('sensor' => $ot));
} elseif ($nobodysHome && !$noTimeNobodysHome) {
    callMethodSafe('NobodyHomeMode.deactivate', array('sensor' => $ot, 'room' => $linked_room));
}


//https://connect.smartliving.ru/profile/3195/blog/datchiki-dvijeniya-rabotayut-kak-sistema-bezopasnosti-doma.html
$status=$this->getProperty('status');

if (gg('SecurityArmedMode.active')==1) 
{if ($status == 1)  
 $this->setProperty('alarm', LANG_DEVICES_PENETRATION_INTO_THE_ROOM);
}
if (gg('SecurityArmedMode.active')==0) 
{if ($status == 1)  
 $this->setProperty('alarm', LANG_DEVICES_PROTECTION_DISABLED_SENSOR_IN_OPERATING_STATE);
}
