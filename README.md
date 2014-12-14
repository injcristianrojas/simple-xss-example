# Persistent XSS Demo Application

## Introduction

As part of my Software Security classes, I've decided to make this app which
simulates a persistent XSS attack, using a target server made using PHP and
a session-grabbing app made in PHP.

## Working the normal way

### Requirements

* PHP-CLI (Command Line Interface) 5.4.0 or better
* PHP PDO package (for sqlite3 support)

To fulfill these, do the following:

* For RPM-based systems (Fedora, RHEL, CentOS): `sudo yum install php-cli php-pdo`
* For DEB-based systems (Ubuntu, Debian): `sudo apt-get update && sudo apt-get install php5-cli php5-sqlite`

### Usage

Start the session-grabbing server:

```Shell
php -S localhost:8181
```

Then start the target server:

```Shell
cd app
php -S localhost:8282
```

Go to the app at <http://localhost:8282> and have fun!

## Working the Docker way (Beta)

### Requirements

* Docker 1.3.2 or later

### Usage

Start the session-grabbing server. If this is your first time doing it, wait a
while. Docker must grab the php:5.6-apache image first:

```Shell
docker run -it --rm --name xss_grabbing_server -p 8181:80 php:5.6-apache
```

Next, the target server:

```Shell
docker run -it --rm --name xss_target_server -p 8282:80 -v "$(pwd)"/app:/var/www/html php:5.6-apache
```

Now, pay attention at the server logs on the grabbing server, go to
<http://localhost:8282> and have fun!

LICENSE AND AUTHOR
==================

    The MIT License

    Copyright (c) 2014 Cristián Rojas

    Permission is hereby granted, free of charge, to any person obtaining
    a copy of this software and associated documentation files (the "Software"),
    to deal in the Software without restriction, including without limitation
    the rights to use, copy, modify, merge, publish, distribute, sublicense,
    and/or sell copies of the Software, and to permit persons to whom the
    Software is furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included
    in all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
    THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.