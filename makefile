install:
	rsync -avr ./var/www/html/* /var/www/html --exclude="*~" --exclude="\.\#*"
	mkdir -p /var/www/html/data