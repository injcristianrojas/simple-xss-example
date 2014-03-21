# Persistent XSS Demo Application

## Introduction

As part of my Software Security classes, I've decided to make this app which
simulates a persistent XSS attack, using a target server made using PHP and
a session-grabbing app made in Python.

## Requirements

* Python 2.7 or better
* PHP-CLI (Command Line Interface) 5.4.0 or better

## Usage

Start the session-grabbing server:

```Shell
python receiver_server/server.py
```

Then start the target server:

```Shell
cd sender_app
php -S localhost:8282
```

Go to the app at http://localhost:8282 and Have fun!