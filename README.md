php-mysql-backup
================

A php script used to backup your project's files and mysql databases. The backups are archived as zip
files, and sent to an dropbox account.

This script is ideal to run cronjob backups.

## Features

* Multiple projects can be backed up at once
* Backup of multiple directories per project
* Backup of multiple databases per project
* Password protection of backup files (.zip)
* Detailed logs

## Requirements

1. This script can only be used in Unix systems (Linux/Mac), as we are using the zip command of the system.
2. The function exec() should be available as we use it to zip our backups.
3. The cURL extension is required if you want to use the dropbox uploader.

## Instructions

1. Copy config.ini.php to config.php
2. Edit config.php to define your projects to be backed up
3. run cron.php using the command line or a web server