#!/usr/bin/bash
<<<<<<< HEAD

service apache2 stop
python3 -m http.server -d . -b 192.168.100.28 80
service apache2 start

=======
service apache2 stop
python3 -m http.server -d . -b 127.0.0.1 80
service apache2 start
>>>>>>> refs/remotes/origin/fitur-super-admin
