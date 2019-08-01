#!/bin/bash

## print header lines

#echo ""
#echo " mac                 essid         frq   chn qual   lvl  enc"
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"
echo "<wlan_devices>"
while IFS= read -r line; do

    ## test line contenst and parse as required
    [[ "$line" =~ Address ]] && mac=${line##*ss: }
    [[ "$line" =~ \(Channel ]] && { chn=${line##*nel }; chn=${chn:0:$((${#chn}-1))}; }
    [[ "$line" =~ Frequen ]] && { frq=${line##*ncy:}; frq=${frq%% *}; }
    [[ "$line" =~ Quality ]] && { 
        qual=${line##*ity=}
        qual=${qual%% *}
        lvl=${line##*evel=}
        lvl=${lvl%% *}
    }
    [[ "$line" =~ Encrypt ]] && enc=${line##*key:}
    [[ "$line" =~ ESSID ]] && {
        essid=${line##*ID:}
        essid2=`echo $essid | tr -d \"`
#        echo ${essid2}
        printf "<device>\n\t<mac>$mac</mac>\n\t<ssid>"
        echo -n ${essid2}
        printf "</ssid>\n\t<freq>$frq</freq> <ch>$chn</ch><qual>$qual</qual><level>$lvl</level>\n\t<encoding>$enc</encoding>\n</device>\n"  # output after ESSID
    }

done
echo "</wlan_devices>"
