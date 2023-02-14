# Testing 101

This repository contains code for a workshop on subject of "Testing 101".
It contains various examples of:

* Unit tests
* Integration tests
* Functional tests

## Prerequisites

1. An IDE (e.g. PhpStorm, VS Code, etc.)
2. Docker

## Software used - 2023-02-14

1. Docker Desktop 4.15.0 (93002)
2. Docker version 20.10.21, build baeda1f
3. PhpStorm 2022.3.1, Build #PS-223.8214.64, built on December 22, 2022

## Setup

1. `git clone git@github.com:fuzulus/testing-101.git`
2. `cd docker`
3. `cp .env.dist .env`
   1. Replace the values which are marked as `__replace_me__` with arbitrary values
4. `cp docker-compose.override.yaml.dist docker-compose.override.yaml`
   1. Configure the values per needs, e.g. change ports, container names, etc.
5. `docker compose up -d`
6. `docker compose exec php sh` or `docker compose exec php bash`
7. (inside PHP container) `composer install`

## Tests

// todo