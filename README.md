# Testing 101
<img alt="Release" src="https://img.shields.io/github/v/release/fuzulus/testing-101">
<img alt="PHP version" src="https://img.shields.io/badge/php-%5E8.1-blue">
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

// todo