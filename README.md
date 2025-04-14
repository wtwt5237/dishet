# DisHet Website

This document describes the required software and package to deploy the website, and details to modify the file paths and the database configuration file.

## Project Directory Structure
```
1. remoteR setting and related model
/home/user/remoteR
├── remoteR.pl
├── utility.pl
├── perl.log
├── dishet
├── other models
└── ......

2. web portal folder
/home/user/html/dishet


3. database setting folder
/var/www/dbincloc/dishet.inc
```

## Model Installation
You can download model and check out required dependencies at https://cran.r-project.org/web/packages/DisHet/index.html.

### R Package Version:
The followings are required R package. Please install the following package by running the command `install.packages("packagename")` in R or downloading the package tar files from https://cran.r-project.org/src/contrib/Archive/ and running the command `R CMD INSTALL packagename_version.tar.gz` in system terminal.
1. library(matrixStats) 
2. library(gtools)
3. library("RColorBrewer")
4. library("gplots")
5. library(ggplot2)
6. library(gridExtra)
7. library(argparse) Depends: library(proto). Potential package depends: findpython, getopt, rjson

check https://cran.r-project.org/web/packages/DisHet/index.html to learn more 

## Website Installation:
The followings are the steps to install the website.

### Data Import
Create a mysql database for remoteR. Import `dishet.sql` into this database.

## remoteR Settings
1. open 'remoteR' folder and check the file 'remoteR.pl' to confirm if 'dishet' is added and path is correct.
if not, add the following codes at the end of file:
```
if($software eq "dishet") {
    require "your_path_to_dishet.pl";
    pMTnet($jobid);
}
```

2. Open crontab edit file with the command.
```
crontab -e
```

3. Add the following codes at the end of file, which means ``remoteR.pl`` will be executed every 3 seconds.

```
remoter_path=your_path_to_remoteR_folder //example: /home/hostname/remoteR
remoter_host=your_db_ip_address 
remoter_usr=your_db_username
remoter_passwd=your_db_password
remoter_db=your_db_name

* * * * * cd $remoter_path; perl remoteR.pl
* * * * * sleep 3; cd $remoter_path; perl remoteR.pl
* * * * * sleep 6; cd $remoter_path; perl remoteR.pl
* * * * * sleep 9; cd $remoter_path; perl remoteR.pl
* * * * * sleep 12; cd $remoter_path; perl remoteR.pl
* * * * * sleep 15; cd $remoter_path; perl remoteR.pl
* * * * * sleep 18; cd $remoter_path; perl remoteR.pl
* * * * * sleep 21; cd $remoter_path; perl remoteR.pl
* * * * * sleep 24; cd $remoter_path; perl remoteR.pl
* * * * * sleep 27; cd $remoter_path; perl remoteR.pl
* * * * * sleep 30; cd $remoter_path; perl remoteR.pl
* * * * * sleep 33; cd $remoter_path; perl remoteR.pl
* * * * * sleep 36; cd $remoter_path; perl remoteR.pl
* * * * * sleep 39; cd $remoter_path; perl remoteR.pl
* * * * * sleep 42; cd $remoter_path; perl remoteR.pl
* * * * * sleep 45; cd $remoter_path; perl remoteR.pl
* * * * * sleep 48; cd $remoter_path; perl remoteR.pl
* * * * * sleep 51; cd $remoter_path; perl remoteR.pl
* * * * * sleep 54; cd $remoter_path; perl remoteR.pl
* * * * * sleep 57; cd $remoter_path; perl remoteR.pl
```

