install:
	mkdir -p /var/www/html/data
	rsync -avr ./var/www/html/* /var/www/html --exclude="*~" --exclude="\.\#*"

