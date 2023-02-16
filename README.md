# Testing 101
<img alt="Release" src="https://img.shields.io/github/v/release/fuzulus/testing-101">
<img alt="PHP version" src="https://img.shields.io/badge/php-%5E8.1-blue">
<img alt="Symfony version" src="https://img.shields.io/badge/symfony-%5E6.0-violet">
<br>
<img alt="Commit activity" src="https://img.shields.io/github/commit-activity/m/fuzulus/testing-101">
<img alt="Last commit" src="https://img.shields.io/github/last-commit/fuzulus/testing-101">

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
2. Run `sh scripts/setup.sh` from the root of the repository. This script will:
   1. Setup Docker environment
   2. Setup Docker override
   3. Run Docker compose up
   4. Install all PHP dependencies via Composer

## Tests

This section describes the types of tests covered in the project, their goals and covered targets.
All types of tests have two commands: the Test command and the Coverage command.

The Test command runs all the tests inside a single testsuite.

The Coverage command runs all the tests inside a single testsuite and generates a coverage report.

Available test suites are:

* Unit
* Integration
* Functional

**NOTICE** 

It is recommended to run all the commands inside the PHP Docker container provided.
The container is equipped with all the dependencies necessary to execute the commands. 

### Unit

#### Test command

```shell
composer test:unit
```

#### Coverage command: 

```shell
composer test:coverage:unit
```

The Unit test suite covers mostly the Domain folder. It is a showcase of examples on how to test: entities, value objects, utility services, etc.
The Unit test suite uses mocks for various service dependencies and therefor does not test the integration of the services with the infrastructural layer (e.g. connection to the database).

### Integration

The Integration test suite covers mostly the Application folder. It showcases examples of testing: application level services, command/query handlers, etc.
The Integration test suite does not use mocks (unless connecting to a 3rd party API). It uses all the infrastructure services available to test their integration and cooperation. 

#### Test command

```shell
composer test:integration
```

#### Coverage command:

```shell
composer test:coverage:integration
```

### Functional

#### Test command

```shell
composer test:functional
```

#### Coverage command:

```shell
composer test:coverage:functional
```

The Functional test suite covers mostly the Infrastructure folder. It showcases examples of testing endpoints - the main entrance points to our application.
The Functional test suite does not use mocks (unless connecting to a 3rd party API). It uses all the infrastructure services available to validate that for a given input the endpoint will return an expected output.