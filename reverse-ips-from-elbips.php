<?php

// retrieve ELB IPs from file
// this file is generated on cron run
// by a script
$ips_file = "elb-ips.list";
$ips_arr = array();

$script_dir = dirname(__FILE__);
$complete_file_name = $script_dir . "/" . $ips_file;
$ips_file_handle = @fopen($complete_file_name, "r");
if ($ips_file_handle !== false) {
  $ips_file_size = filesize($complete_file_name);
  if ($ips_file_size > 0) {
    $ips_str = fread($ips_file_handle, $ips_file_size);
    fclose($ips_file_handle);
    $ips_arr = array_filter(explode("\n", $ips_str));
  }
}
else {
  die('Could not read file :(');
}
array_unshift($ips_arr, '127.0.0.1');
$conf['reverse_proxy_addresses'] = $ips_arr;
?>