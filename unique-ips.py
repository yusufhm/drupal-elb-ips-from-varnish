#!/usr/bin/env python
import sys

# This script reads IPs from the command line
# and returns only the unique ones
ips = []
for ip in sys.stdin:
    ip = ip.strip()
    if ip not in ips:
        print ip
        ips.append(ip)