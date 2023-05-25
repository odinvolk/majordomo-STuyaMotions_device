<?php

$pir_state=$this->getProperty('pir_state');

if ($pir_state == 1) {
 $this->callmethod('motionDetected');
}
if ($pir_state == "pir") {
 $this->callmethodSafe('motionDetected');
}

$ot = $this->object_title;
$desc = $this->description;
$linked_room=$this->getProperty('linkedRoom');
$status = $this->getProperty('status');
$batteryLevel=$this->getProperty('batteryLevel');
$mqtt_st = $this->getProperty('mqtt_status');
$telegram_st = $this->getProperty('telegram_status');
$registerEvent_st = $this->getProperty('registerEvent_status');

$array = array('status'=>$status,'pirState'=>$pir_state,'batteryLevel'=>$batteryLevel,'linkedRoom'=>$linked_room,'desc'=>$desc);
$json = json_encode($array, JSON_UNESCAPED_UNICODE); //batteryLevel

//Добавляем трансляцию в registerEvent
//if ($registerEvent_st == 1) 
//{
//registerEvent($ot.'/alarm', $json);
//}

//registerEvent($ot, array('status'=>$status,'record_switch'=>$record_switch,'linkedRoom'=>$linked_room,'desc'=>$desc));

//Добавляем трансляцию в MQTT
if ($mqtt_st == 1)
{
include_once(DIR_MODULES . 'mqtt/mqtt.class.php');
 $mqtt = new mqtt();
// $topic = "mjd/26/".$ot."/status"."/";
 $topic = "mjd/26/".$ot;
 $rezult = $mqtt->mqttPublish($topic,$json, 0, 0);//mqttPublish($topic, $value, $qos = 0, $retain = 0);
}

//Добавляем трансляцию в Telegram
if ($telegram_st == 1) 
{
include_once(DIR_MODULES . 'telegram/telegram.class.php');
$telegram_module = new telegram();
$telegram_module->sendMessageToAll($ot."-".$message, null, '', !$isImportant);
}
