install:
	rsync -avr ./var/www/html/* /var/www/html --exclude="*~" --exclude="\.\#*"