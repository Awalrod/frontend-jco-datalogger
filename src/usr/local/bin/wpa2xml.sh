#!/bin/bash

## print header lines

#echo ""
#echo " mac                 essid         frq   chn qual   lvl  enc"
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"
echo "<wpa_config>"
net=0

while IFS= read -r line; do

	if [[ $line =~ network ]]
	then
		echo "	<network>"
		net=1
		continue
	fi

	if [ $net == 0 ]
	then
		echo ${line}	
	else
		## test line contenst and parse as required
		#quotes=${line#*'"'}; line=${line%'"'*}
		quotes=`echo "$line" | awk -F'"' '{print $2}'`

		if [[ "$line" =~ ssid ]]
		then
			echo "		<ssid>${quotes}</ssid>"
			continue
		fi
		if [[ "$line" =~ psk ]] 
		then 
			echo "		<psk>${quotes}</psk>"
			continue
		fi
		if [[ $line =~ } ]]
		then
			echo "	</network>"
			net=0
			continue
		fi
	fi
done
echo "</wpa_config>"
