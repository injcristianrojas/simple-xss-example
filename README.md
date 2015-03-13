# Persistent XSS Demo Application

## Introduction

As part of my Software Security classes, I've decided to make this app which
simulates a persistent XSS attack, using a target application made using PHP and
a session-grabbing server.

## Requirements

* Docker 1.3.2 or later

## Pre-setup

Usually I teach my classes in a very low bandwidth environment, so I prefer
to ask my students to prep the machines prior to class. If this is your case,
download the image like this:

```Shell
docker pull injcristianrojas/simple-xss-example
```

## Usage

```Shell
docker run -it --rm --name grabber_server -p 8181:80 injcristianrojas/simple-xss-example
```

Next, the victim application:

```Shell
docker run -it --rm --name victim_server --privileged=true -p 8282:80 -v ${PWD}/app:/var/www/ injcristianrojas/simple-xss-example
```

Now, pay attention at the server logs on the grabbing server, go to
<http://localhost:8282> and have fun!

## Getting inside

To get inside either machine, issue:

```Shell
docker exec -it <machine_name> /bin/bash
```

## Standalone use

* PHP-CLI (Command Line Interface) 5.4.0 or better
* PHP PDO package (for sqlite3 support)

To fulfill these, do the following:

* For RPM-based systems (Fedora, RHEL, CentOS): `sudo yum install php-cli php-pdo`
* For DEB-based systems (Ubuntu, Debian): `sudo apt-get update && sudo apt-get install php5-cli php5-sqlite`

Start the session-grabbing server:

```Shell
php -S localhost:8181
```

Then start the target app:

```Shell
cd app
php -S localhost:8282
```

Go to the app at <http://localhost:8282> and have fun!