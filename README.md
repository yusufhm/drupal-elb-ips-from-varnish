drupal-elb-ips-from-varnish
===========================

These scripts enable you to populate the `$conf['reverse_proxy_addresses']` in settings.php for a Drupal site.

1. Set up cron job
------------------

Set up a cron job to regularly update the `elb-ips.list` file via `varnishncsa`.

An example job would be:

```
*/15 * * * * varnishncsa -d | grep 'ELB-HealthChecker' | awk '{ print $1 }' | /path/to/repo/unique-ips.py > /path/to/repo/elb-ips.list
```

2. Add code to settings.php
---------------------------

Add the following code at the end of your settings.php to read the `elb-ips.list` file and set the correct reverse proxy IPs:

```php
$ip_list_file = "/path/to/repo/elb-ips.list";
if (file_exists($ip_list_file)) {
  require(ip_list_file);
}
```
