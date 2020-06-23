#!/bin/bash
cd /opt/htlw3-medt-portal
docker build -f /opt/htlw3-medt-portal/Dockerfile -t crumpfhuber/htlw3-medt-portal:latest .
docker rm htlw3-medt-portal -f
docker run -d --name htlw3-medt-portal --hostname="htlw3-medt-portal" --restart=always -v /opt/htlw3-medt-portal/htdocs:/var/www/html -it crumpfhuber/htlw3-medt-portal:latest