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
download the php:5.6-apache image like this:

```Shell
docker pull injcristianrojas/simple-xss-example
```

## Usage

Start the session-grabbing server:

```Shell
docker run -it --rm --name xss_grabbing_server -p 8181:80 injcristianrojas/simple-xss-example
```

Next, the target app:

```Shell
docker run -it --rm --name xss_target_server -p 8282:80  injcristianrojas/simple-xss-example
```

Now, pay attention at the server logs on the grabbing server, go to
<http://localhost:8282> and have fun!
