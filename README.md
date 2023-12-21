
# CS3SP - Coursework Part 2

Part 2 of the coursework for CS3SP. 

*You must develop the SecureApp in any programming language (eg, PHP, Python, Java, etc.) with visual elements and forms*

A secure form has been designed using PHP+MySQL. 

## Prerequisites

Before you begin, ensure you have met the following requirements:

- Linux Operating System
- Apache Web Server
- MySQL Database/MariaDB
- PHP
- Python
- PHP Unit - (https://phpunit.de/manual/6.5/en/installation.html)
- Radamsa - (https://gitlab.com/akihe/radamsa)

## Installation

### Step 1: Install LAMP Stack

Follow the guide provided by [DigitalOcean](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-22-04)

### Step 2: Deploy Your Application

1. Copy your project into the directory you configured in Apache

2. Configure your application to connect to the MySQL database.
    - import "Database/form_data.sql" into phpmyadmin on your ubuntu machine (127.0.0.1/phpmyadmin)
    - Connection to the database is done in [php/connection.php](php/connection.php)

## Tests

### Unit Testing
 - Unit Testing has been done using PHPUnit
 - All PHPUnit tests are located in [tests/phpunit/](tests/phpunit/)
 - Each class has 3 tests which test valid data, invalid data, and empty data

### Fuzzy Testing
 - Fuzzy Testing is done with a python script made by myself located in [test/fuzzy/fuzzyTest.py](test/fuzzy/fuzzyTest.py)
 - Using valid inputs, the script utilizes a program called [Radamsa](https://gitlab.com/akihe/radamsa) (needs to be installed) to create malformed inputs which are then sent to the API which handles the data validation
 - This is repeated 5 times and the data sent to the API & the reponse is printed to console and written to a file named **output-YYYY-MM-DD_HH-MM-SS.txt**

#### Usage
 - Locate to **test/fuzzy**
 - Activate the python virtual environment provided - `source ./fuzzyvenv/bin/activate`
 - Replace the URL on Line 33 with your own URL
 - Run the program - `py fuzzyTest.py`
 - View result in text file



## Usage

Access your application through a web browser:

```
http://localhost:80
```
