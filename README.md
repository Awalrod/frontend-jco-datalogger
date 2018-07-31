![cool pic](./img/logger.png)
# frontend-jco-datalogger
This repo contains a dashboard style web interface for the [jco-datalogger](https://github.com/Awalrod/jco-datalogger) 
utility. 

### Getting Data
```
	var address = document.location.host;
	var streamSocket = new WebSocket("ws://"+address+":7333")
	streamSocket.onopen = function(event){
		var nodeid = 1 // can also be 'all'
		streamSocket.send('nodeid='+nodeid)
	}
	streamSocket.onmessage = function(event){
		data = JSON.parse(event.data)
		// if nodeid = <int>:
		// {x:<int>, y:<int>, z:<int>}
		// if nodeid = 'all'
		// [{x:<int>, y:<int>, z:<int>},{x:<int>, y:<int>,z:<int>},...]
		// 
		// note that nodeied is the index in this list ^^, not the
		// actual canopen nodied
	}
```