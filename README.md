# CIS1054-Web-Assignment

Welcome to our Website Assignment 2020, this is a Restaurant Website mainly built using php, html, javascript, css and Twig.

Co-authored by: Liam Curmi de Gray, Stefano Schembri, Andrew Magri

# Technologies Used

In order to create a local server the main technology used was **XAMPP** 
XAMPP is an open source software package which contain **Apache** distributions for an Apache Server. It also contains **MYSQL** which was used to store our database and to enable us to interact with it.

To code we mainly used **Visual Studio Code** as it is also open source and fit our purpose to code easier.


# Installing

 - You may download the repository as a zip file
 - We also recommend downloading XAMPP to recreate our process in developing this website
 - Link to download XAMPP can be found here: [Download XAMPP](https://www.apachefriends.org/download.html)

## Configuring XAMPP
Before starting up you are required to copy the following configuration files in the XAMPP folder:

	 - These can be located at: CIS1054-Web-Assignment\XAMPP Config Settings
 - Copy the php.ini file and paste it in C:\xampp\php to replace the existing php.ini file
 
 - Copy the sendmail.ini file and paste it in C:\xampp\sendmail to replace the existing sendmail.ini file
   
 - Copy the my.ini file and paste it in C:\xampp\sql\bin to replace the existing my.ini file

Without setting up these the following features will not work:

 1. Importing the SQL to the PHPMYADMIN Database
 2. The functionality for sending emails

## Setting up the Database
Once the configuration files have been set, the next process is to populate the database

 - Firstly load up XAMPP Control Panel and click on the Admin button on the MYSQL row
 - Once you are viewing the phpmyadmin page, click on new to create a new database
 - Give your new database a name and click on the Create button
 - You will be redirected to the database you have just created
 - Click on Import
 - Click on choose file and select the webassignment.sql which is located at:
	 - CIS1054-Web-Assignment\webassignment.sql
 - Click on go and wait for the schema and data to be implemented

	- Note: If anything where to go wrong check on the php.ini & my.ini configuration file in the XAMPP configuration to make sure the files match


# You're all set!
Once you have finished all the above installation everything should be working as accordingly, feel free to make use of the files to your use

# Disclaimer
The purpose for this repository is to play around with the code and expand upon it for public purposes. We do not tolerate any part of this project to be used for commercial use or for any other student to use as their own assignment. This will infringe upon copyright and plagiarism. 
