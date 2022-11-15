# Schema validation meets functional testing

This repository contains code for a talk on subject of "Schema validation meets functional testing".
It is based on functional tests with included schema validation tests.

## Prerequisites

1. An IDE (e.g. PhpStorm, VS Code, etc.)
2. Docker

## Setup

1. `git clone git@github.com:fuzulus/schema-validation-meets-functional-testing.git`
2. `cd docker`
3. `cp .env.dist .env`
4. `cp docker-compose.override.yaml.dist docker-compose.override.yaml`
5. `docker compose up`
6. (inside PHP container) `composer install`

## Run tests

To run tests execute `composer test` inside the PHP container. This will trigger
the creation of a `test` database as well as migrations and fixture load execution.