<?php 
//
//
//
  if ($link_type == 'dimmer_timer') {
      if ($status){
        $timer_name = $object . '_switch_timer';
        $action_string = '';
        if ($settings['darktime']) {
            $action_string .= 'if (gg("DarknessMode.active")) {';
        }
		if ($settings['night_mode']) {
		$night = gg("NightMode.active");
		}
		if ($night && $settings['action_level_night'] > 0) {
			$action_string = 'callMethodSafe("' . $object . '.setLevel' . '",array("value"=>"' . $settings['action_level_night'] . '","link_source"=>"' . $device1['LINKED_OBJECT'] . '"));';
		}else{
		$action_string = 'callMethodSafe("' . $object . '.setLevel' . '",array("value"=>"' . $settings['action_level'] . '","link_source"=>"' . $device1['LINKED_OBJECT'] . '"));';
		}
		
        if ($settings['action_delay'] != '') {
            $settings['action_delay'] = (int)processTitle($settings['action_delay']);
			$settings['action_delay_night'] = (int)processTitle($settings['action_delay_night']);
			if ($night) {
            if ($settings['action_delay_night'] > 0) {
                $action_string .= 'setTimeout(\'' . $timer_name . '\',\'' . 'callMethod("' . $object . '.turnOff' . '",array("link_source"=>"' . $device1['LINKED_OBJECT'] . '"));' . '\',' . (int)$settings['action_delay_night'] . ');';
            }
			}else{
			if ($settings['action_delay'] > 0) {
                $action_string .= 'setTimeout(\'' . $timer_name . '\',\'' . 'callMethod("' . $object . '.turnOff' . '",array("link_source"=>"' . $device1['LINKED_OBJECT'] . '"));' . '\',' . (int)$settings['action_delay'] . ');';
			}
        }
        if ($settings['darktime']) {
            $action_string .= '}';
        }
	  }
    }
  } elseif ($link_type == 'switch_timer2') {
      if ($status){
        $timer_name = $object . '_switch_timer';
        $action_string = '';
        if ($settings['darktime']) {
            $action_string .= 'if (gg("DarknessMode.active")) {';
        }
        $action_string .= 'callMethodSafe("' . $object . '.turnOn' . '",array("link_source"=>"' . $device1['LINKED_OBJECT'] . '"));';
        if ($settings['action_delay'] != '') {
            $settings['action_delay'] = (int)processTitle($settings['action_delay']);
            if ($settings['action_delay_night'] > 0) {
			$night = gg("NightMode.active");
			}
			if ($night) {
                $action_string .= 'setTimeout(\'' . $timer_name . '\',\'' . 'callMethod("' . $object . '.turnOff' . '",array("link_source"=>"' . $device1['LINKED_OBJECT'] . '"));' . '\',' . (int)$settings['action_delay_night'] . ');';
			}else{
			if ($settings['action_delay'] > 0) {
                $action_string .= 'setTimeout(\'' . $timer_name . '\',\'' . 'callMethod("' . $object . '.turnOff' . '",array("link_source"=>"' . $device1['LINKED_OBJECT'] . '"));' . '\',' . (int)$settings['action_delay'] . ');';
			}
        }
        }
        if ($settings['darktime']) {
            $action_string .= '}';
        }
	  }
    }
