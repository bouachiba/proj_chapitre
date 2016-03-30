<?php
session_destroy();

session_regenerate_id(true);
header('location:http://chapitre.local');
