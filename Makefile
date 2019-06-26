# Authors: mcrowe@gcdataconcepts.com
# Copyright (C) 2017,  Gulf Coast Data Concepts
#

CONTROL=src/DEBIAN/control
OUTPUT_PATH = .
SRC=./src
TMP_DIR=$(OUTPUT_PATH)/$(BASENAME)
TARGET=$(OUTPUT_PATH)/$(BASENAME).deb
VERSION = $(shell grep Version $(CONTROL) | awk '{print $$2}')
BASE = $(shell grep Package $(CONTROL) | awk '{print $$2}')
ARCH = $(shell grep Architecture $(CONTROL) | awk '{print $$2}')
BASENAME=$(BASE)_$(VERSION)_$(ARCH)

#TARGET_SRC=DEBIAN/control DEBIAN/postinst usr/bin/upsPowerOff.sh usr/bin/upsStatus.sh usr/bin/upsVbat.sh etc/init.d/ups-monitor lib/systemd/system/systemd-ups-monitor.service
#SRC=$(patsubst %,./src/%,$(TARGET_SRC))
NUL = /dev/null

all: 
	-@mkdir -p $(TMP_DIR) 2>&1 1>$(NUL)
	@mkdir -p tempsrc
	git pull
#	svn checkout http://gcdc-crowe/svn/gcdc1317/debian_pkg/src tempsrc
	rsync -a $(SRC)/* $(TMP_DIR) --exclude=.svn --exclude=*~
	rm -rf tempsrc
	@dpkg-deb --build $(TMP_DIR) $(TARGET)
	

clean:
	@rm -rf $(TMP_DIR)
	@rm -rf $(TARGET)


