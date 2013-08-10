upload:
	rsync -va --delete --include=".htaccess" site/ cvegaevents.com:www/
	ssh cvegaevents.com "chmod -R g-w public_html"