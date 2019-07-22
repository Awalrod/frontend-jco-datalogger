#!/bin/bash
set -e
#DEST=/etc/wpa_supplicant/wpa_supplicant.conf
DEST=./test.conf
SRC=/tmp/wphrase.txt
ssid=${1}
phrase=${2}
wpa_passphrase ${ssid} ${phrase} > ${SRC}

if [ $(grep -c ${ssid} ${DEST}) -ne 0 ]
then # if ssid exists
	echo updating
	# use grep and sed here in some fancy way to update passphrase
else
	echo appending
	cat ${SRC} >> ${DEST} 
fi

rm ${SRC}
exit 0



