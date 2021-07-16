# Changelog

All notable changes to `address` will be documented in this file

## 0.1.0 - 2020-10-28
- initial release


## 0.1.1 - 2020-12-02
- fix min phpunit version


## 0.2.0 - 2020-12-04
- add support for php 8.0


## 0.3.0 - 2021-01-21
- add importing of sfneal/string-helpers helper classes to replace autoloading helper functions


## 0.4.0 - 2021-01-21
- fix use of array-helpers helper functions. 
- bump sfneal/array-helpers min version 


## 0.5.0 - 2021-01-28
- bump sfneal/models min version to 1.0 
- cut support for php7.2 & below


## 1.0.0 - 2021-01-29
- add tests from sfneal/builders package
- bump min orchestra/testbench & phpunit/phpunit
- add AddressFactory and improved test suite
- update documentation


## 1.0.1 - 2021-03-08
- add type hinting to attribute mutator methods
- add $withType param to Address::show() method so that the address type doesn't have to be returned with the string


## 1.1.0 - 2021-04-06
- fix sfneal/models version constraint (^1.0)


## 1.2.0 - 2021-04-07
- bump min sfneal/models version to v2.0
- refactor use of `AbstractModel` to `Model`


## 1.2.1 - 2021-04-08
- optimize Travis CI config & enable code coverage uploading
- bump sfneal/models min version


## 1.2.2 - 2021-04-13
- add `address_full` attribute to `Address` model that returns a full address string
- fix issue with `AddressFactory` polymorphic relationship definition


## 1.2.3 - 2021-04-20
- bump min sfneal/mock-models dev requirement
- add use of sfneal/mock-models test utilities & mock models


## 1.2.4 - 2021-04-22
- fix model factory creation to create 20 `People` each with an `Address`
- fix `addressable()` method return type hinting
- fix issues with sfneal/mock-models dev requirement


## 1.2.5 - 2021-07-12
- refactor test classes to `Feature` test namespace
- make `AddressTest` unit test for testing the `Address` model
- make `AddressBuilderTest` & add sfneal/datum to dev requirements
- make `AddressMutatorsTest` for testing setting city, state pairs
- bump min sfneal/mock-models composer package version to v0.6


## 1.2.6 - 2021-07-16
- fix issue with `AddressServiceProvider` database migration path
