<?php
session_destroy(); // destory existing session => logout

die('<meta http-equiv="refresh" content="0; URL=/home">'); // redirect to home page