#!/bin/bash
sudo iwlist wlan0 scan | ./parsiwl.sh > /tmp/wifiavail.xml
xsltproc cleanup.xsl /tmp/wifiavail.xml > config.shtml
