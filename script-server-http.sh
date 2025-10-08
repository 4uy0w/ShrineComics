#!/usr/bin/bash
service apache2 stop
python3 -m http.server -d . -b 127.0.0.1 80
service apache2 start
