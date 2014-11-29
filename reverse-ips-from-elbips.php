<?php

// retrieve ELB IPs from file
// this file is generated on cron run
// by a script
$ips_file = "elb-ips.list";
$ips_file_handle = fopen($ips_file, "r") or die("Unable to open file!");
$ips_file_size = filesize($ips_file);
$ips_arr = array();
if ($ips_file_size > 0) {
  $ips_str = fread($ips_file_handle, filesize($ips_file));
  fclose($ips_file_handle);
  $ips_arr = array_filter(explode("\n", $ips_str));
}
array_unshift($ips_arr, '127.0.0.1');
$conf['reverse_proxy_addresses'] = $ips_arr;
?>