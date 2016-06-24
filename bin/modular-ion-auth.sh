#! /bin/bash

echo "

This will install Ion Auth 2 as a HMVC module!

This script will TRY to download the package for you.
-----------------------------------------------------

Good luck..


Hit a key to continue or Ctrl-c to cancel now."


read

## Download the Ion Auth
echo "Get Ion Auth"
wget --no-check-certificate -O benedmunds-ion-auth.zip https://github.com/benedmunds/CodeIgniter-Ion-Auth/zipball/2

## Unpack all the files
echo "Unpack Files"
unzip benedmunds-ion-auth.zip
rm benedmunds-ion-auth.zip

## Get the Dirs
echo "Find Dirs"
IA_DIR=`ls -c1 | grep ^ben`

## Make Welcome Module Dir
echo "Make Modular Welcome Dir"
mkdir -p ../application/modules/welcome/controllers

## Move default welcome controller to the modules dir
echo "Move Welcome Controller into Modules"
mv ../application/controllers/Welcome.php ../application/modules/welcome/controllers/

## Make Welcome Views Dir
echo "Make Welcome Views Dir"
mkdir -p ../application/modules/welcome/views

## Move Welcome View into modular dir
echo "Move Welcome views into modular Welcome Dir"
mv ../application/views/welcome_message.php ../application/modules/welcome/views/

## Rename Ion Auths Dir to Auth
echo "Rename Ion Auth Dir to Auth"
mv $IA_DIR ../application/modules/auth

## Update the Welcome Controller to extend MX_Controller instead of CI_Controller
echo "Update Welcome Controller to extend MX_Controller"
sed -i -e "s/CI_Controller/MX_Controller/" ../application/modules/welcome/controllers/Welcome.php

## Update the default autoload file to include database and session libraries
echo "Update autoload file to include the database and session libraries"
sed -i -e "s/\$autoload\['libraries'] = array()/\$autoload['libraries'] = array('database','session')/" ../application/config/autoload.php

## Update the Ion Auth libraries to use the auth resource
echo "Update Ion Auth Lib to use the Auth Resources"
sed -i -e "s/\$this->load->config('ion_auth', TRUE);/\$this->load->config('auth\/ion_auth', TRUE);/" ../application/modules/auth/libraries/Ion_auth.php
sed -i -e "s/\$this->lang->load('ion_auth');/\$this->lang->load('auth\/ion_auth');/" ../application/modules/auth/libraries/Ion_auth.php
sed -i -e "s/\$this->load->model('ion_auth_model');/\$this->load->model('auth\/ion_auth_model');/" ../application/modules/auth/libraries/Ion_auth.php

## Update the Ion Auth model to use the auth resource
echo "Update the Ion Auth Model to use the Auth Resources"
sed -i -e "s/\$this->load->config('ion_auth', TRUE);/\$this->load->config('auth\/ion_auth', TRUE);/" ../application/modules/auth/models/Ion_auth_model.php
sed -i -e "s/\$this->lang->load('ion_auth')/\$this->lang->load('auth\/ion_auth')/" ../application/modules/auth/models/Ion_auth_model.php

## Update the Auth Controller to extend MX_Controller instead of CI_Controller
echo "Update Auth Controller to extend MX_Controller"
sed -i -e "s/CI_Controller/MX_Controller/" ../application/modules/auth/controllers/Auth.php

## Update the Auth Controller so "$this->data" will be "$data"
echo "Update the Auth Controller to change \$this->data to \$data"
sed -i -e "s/\$this->data/\$data/" ../application/modules/auth/controllers/Auth.php

## Move auth/views files up 1 level
echo "Move auth/views files up 1 level"
mv ../application/modules/auth/views/auth/* ../application/modules/auth/views/

## Remove the auth/views/auth dir
echo "Remove the auth/views/auth dir"
rmdir ../application/modules/auth/views/auth

## Make the routes.php file
echo "Write the modules/auth/config/routes.php file"
echo "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

\$route['auth/(:any)'] = \"auth/\$1\";

/* End of file routes.php */
/* Location: ./application/config/routes.php */


" > ../application/modules/auth/config/routes.php

echo "

*********** DON'T FORGET THESE STEPS ***********
====================================================================

6 more steps:
==================
1) Update the \$config['base_url'] var in application/config/config.php
2) Update the \$config['encryption_key'] var in application/config/config.php
3) Update your application/config/database.php file to work with your database,
4) Run the Ion Auth SQL file located in application/modules/auth/sql.
5) Now rename or move everything from .. into where you set \$config['base_url']

If you put your CodeIgniter files anywhere other than DOC ROOT you need to do step 6:
6)Update the 'RewriteBase' in the .htaccess file in your CodeIgniter Directory to where your CodeIgniter files are.

If your CodeIgniter files ARE IN the DOC ROOT of your webserver, you should be able to run from there like this:
---------------
yourdomain.com
yourdomain.com/auth


If your CodeIgniter files AREN'T IN the DOC ROOT:
Remember to update the RewriteBase to point to your_ci_dir (see below) in the .htaccess file and you should be able to run like this:
--------------------------
yourdomain.com/your_ci_dir
yourdomain.com/your_ci_dir/auth

====================================================================
    YOU SHOULD BE DONE AFTER FOLLOWING THOSE STEPS!

I think you should be up and running!


Hope this all works!


"