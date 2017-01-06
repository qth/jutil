# jutil
DevOps Utilities You May Find Useful

1. rbc (Reboot checker)
   * On RHEL 7 / CentOS 7 / Fedora requires: coreutils gawk hostname lsof mailx rpm sed util-linux
   * Default is to check if the system needs to be rebooted
   * Add a flag to alert via email, log to syslog, or to reboot the system if required
   * Tested on Fedora / RHEL

2. libreswan-key-to-conf
   * Take a list of names, IPs, and RSA public keys and output libreswan configuration
   * A separate IPSec SA is created between each of the hosts listed in the input file
   * Growth is #conf_items = (num_hosts*(num_hosts-1))/2
   * Tested on RHEL 7

3. dnscheck
   * This is a simple utility designed to check DNS server health over time
   * Output can be graphed with gnuplot
   * Designed to be run from cron and STDOUT redirected to a file:
   
    ```*/5 * * * *  /home/user/bin/dnscheck <DNS SERVER IP> >> /home/user/bin/dns-stats```
    
