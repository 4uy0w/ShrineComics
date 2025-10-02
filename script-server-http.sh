#!/usr/bin/bash

service apache2 stop
python3 -m http.server -d . -b 192.168.100.28 80
service apache2 start

