#!/bin/bash

sed -ri 's/dbserver/localhost/' /var/www/html/index.php
