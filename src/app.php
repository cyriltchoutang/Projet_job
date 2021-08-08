<?php

/************************************
Entry point of the project.
To be run from the command line.
************************************/
include_once('link_connection.php');



echo sprintf("Starting...\n");


/* import jobs from regionsjob.xml and jobteaser.xml */
$jobsImporter = new JobsImporter(SQL_HOST, SQL_USER, SQL_PWD, SQL_DB, [RESSOURCES_DIR . 'regionsjob.xml', RESSOURCES_DIR . 'jobteaser.xml']);
//$jobsImporter = new JobsImporter(SQL_HOST, SQL_USER, SQL_PWD, SQL_DB, RESSOURCES_DIR . 'regionsjob.xml');

include_once('vue.php');