<?php

   $this->device_types['tuya_motion'] = array(
        'TITLE'=>'Датчик движения Tuya',
        'PARENT_CLASS'=>'SDevices',
        'CLASS'=>'STuyaMotions',
        'DESCRIPTION'=>'Датчик движения Tuya',
        'PROPERTIES'=>array(
            'local_ip'=>array('DESCRIPTION'=>'IP адрес устройства', '_CONFIG_TYPE'=>'text', 'KEEP_HISTORY'=>0, 'DATA_KEY'=>1),
            'local_key'=>array('DESCRIPTION'=>'Ключ устройства', '_CONFIG_TYPE'=>'text', 'KEEP_HISTORY'=>0, 'DATA_KEY'=>1),
            'device_id'=>array('DESCRIPTION'=>'ID устройства', '_CONFIG_TYPE'=>'text', 'KEEP_HISTORY'=>0, 'DATA_KEY'=>1),
            'device_mac'=>array('DESCRIPTION'=>'MAC устройства', '_CONFIG_TYPE'=>'text', 'KEEP_HISTORY'=>0, 'DATA_KEY'=>1),
            'online'=>array('DESCRIPTION'=>'В сети', 'KEEP_HISTORY'=>10),
            'type'=>array('DESCRIPTION'=>'Тип устройства','_CONFIG_TYPE'=>'text', 'KEEP_HISTORY'=>0, 'DATA_KEY'=>1),
            'type_con'=>array('DESCRIPTION'=>'Тип соединения','_CONFIG_TYPE'=>'select','_CONFIG_OPTIONS'=>'wifi=WiFi,bt=Bluetooth,zb=ZigBee'),
			'alarm'=>array('DESCRIPTION'=>'Тревога','DATA_KEY'=>1),
			'pir_state'=>array('DESCRIPTION'=>'Состояние датчика (pir none)'),
			'pir_time'=>array('DESCRIPTION'=>'pir_time','_CONFIG_TYPE'=>'select','_CONFIG_OPTIONS'=>'30s=30s,60s=60s,120s=120s','DATA_KEY'=>1),
			'pir_sensitivity'=>array('DESCRIPTION'=>'pir_sensitivity','_CONFIG_TYPE'=>'select','_CONFIG_OPTIONS'=>'low=low,middle=middle,high=high','DATA_KEY'=>1),
			'pir_state'=>array('DESCRIPTION'=>'pir_state','_CONFIG_TYPE'=>'num','DATA_KEY'=>1),
            'timeout'=>array('DESCRIPTION'=>LANG_DEVICES_MOTION_TIMEOUT,'_CONFIG_TYPE'=>'num','_CONFIG_HELP'=>'SdMotionTimeout'),
            'ignoreNobodysHome'=>array('DESCRIPTION'=>LANG_DEVICES_MOTION_IGNORE,'_CONFIG_TYPE'=>'yesno','_CONFIG_HELP'=>'SdIgnoreNobodysHome'),
            'noTimeNobodysHome'=>array('DESCRIPTION'=>'Отключить изменения статуса "никого нет дома"','_CONFIG_TYPE'=>'yesno','_CONFIG_HELP'=>'SdnoTimeNobodysHome'),
            'resetNobodysHome'=>array('DESCRIPTION'=>LANG_DEVICES_MOTION_RESET,'_CONFIG_TYPE'=>'yesno','_CONFIG_HELP'=>'SdResetNobodysHome'),
            'blocked'=>array('DESCRIPTION'=>'Is blocked', 'DATA_KEY'=>1),
			'motionDetected'=>array('DESCRIPTION'=>'Прием статуса с датчика движения','DATA_KEY'=>1),
            'mqtt_status'=>array('DESCRIPTION'=>'Транслировать в MQTT','_CONFIG_TYPE'=>'yesno'),
            'telegram_status'=>array('DESCRIPTION'=>'Транслировать в Telegram','_CONFIG_TYPE'=>'yesno'),
            'registerEvent_status'=>array('DESCRIPTION'=>'Транслировать в События','_CONFIG_TYPE'=>'yesno'),
        ),
        'METHODS'=>array(
            'motionDetected'=>array('DESCRIPTION'=>'Motion Detected','_CONFIG_SHOW'=>1),
            'blockSensor'=>array('DESCRIPTION'=>LANG_BLOCK_SENSOR,'_CONFIG_SHOW'=>1),
            'unblockSensor'=>array('DESCRIPTION'=>LANG_UNBLOCK_SENSOR,'_CONFIG_SHOW'=>1),
            'pirStateUpdated'=>array('DESCRIPTION'=>'Обновление статуса датчика (pir=1 none=0)'),
        )
    );

@include_once(ROOT.'languages/STuyaMotions_'.SETTINGS_SITE_LANGUAGE.'.php');
@include_once(ROOT.'languages/STuyaMotions_default'.'.php');
