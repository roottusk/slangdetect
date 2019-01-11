<?php
//Getting All words into an array
$defaultfile=file_get_contents("default.json");
$defaults=json_decode(base64_decode($defaultfile),true);			//We want it to be associative array




