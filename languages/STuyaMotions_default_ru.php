<?php

$dictionary=array(
   'DEVICES_MOTION_NOTIME' => 'Отключить изменения статуса "никого нет дома"',
   'DEVICES_LINK_SET_LEVEL_TIMER' => 'Установить яркость на время',
   'DEVICES_LINK_SET_LEVEL_DESCRIPTION' => 'Установить яркость другого устройства на время, в зависимости от день/ночь',
   'DEVICES_LAMP_LEVEL' => 'Яркость',
   'DEVICES_LAMP_LEVEL_NIGHT' => 'Яркость ночью',
   'DEVICES_NIGHTMODE_LEVEL' => 'Разная яркость и время день/ночь',
   'DEVICES_LINK_SWITCH_TIMER_PARAM_ACTION_DELAY_DAY' => 'Включить на время (секунд)',
   'DEVICES_LINK_SWITCH_TIMER_PARAM_ACTION_DELAY_NIGHT' => 'Включить ночью на время (секунд)',
   'LANG_DEVICES_PROTECTION_DISABLED_SENSOR_IN_OPERATING_STATE' => 'ля ля ля',
   'LANG_DEVICES_PENETRATION_INTO_THE_ROOM' => 'ла ла ла',
   
); 

foreach ($dictionary as $k=>$v) {
 if (!defined('LANG_'.$k)) {
  define('LANG_'.$k, $v);
 }
}

?>
