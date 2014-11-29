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
