#!/bin/bash
sudo iwlist wlan0 scan | /usr/local/bin/parsiwl.sh > /tmp/wifiavail.xml
xsltproc /var/www/html/wifi/cleanup.xsl /tmp/wifiavail.xml
