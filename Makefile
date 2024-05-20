run: stop
	sudo cp -r ./src/* /srv/http
	sudo httpd

stop:
	-sudo pkill httpd

clean:
	sudo rm -rf /srv/http/*
