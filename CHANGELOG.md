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

 
## 1.2.7 - 2021-07-30
- add sfneal/array-helpers explicit composer requirement (previously was indirectly required by sfneal/string-helpers)
- fix sfneal/string-helpers dependency to prevent v2.0 upgrades


## 1.2.8 - 2021-07-30
- fix issue with sfneal/mock-models package interdependency
- bump sfneal/mock-models composer dev requirement min version to v0.8 


## 1.2.9 - 2021-08-03
- bump min sfneal/array-helpers version to v2.0 & refactor use


## 1.2.10 - 2021-08-04
- bump min sfneal/array-helpers version to v3.0 & refactor use 
 

## 1.2.11 - 2021-09-02
- add use of dataProviders for testing `AddressBuilder::whereAddressLike()` method
- add `whereAddressLike()` test method to `AddressBuilderTest`


## 1.2.12 - 2021-09-02
- make `AddressAccessors` model trait that adds 'address' model relationship accessors ('address_1', 'city', etc...)
 
 
## 1.2.13 - 2021-09-02
- make `CityStateAccessors` trait (imported from sfneal/models) & add use in `Address` model


## 2.0.0 - 2024-04-01
- bump sfneal/models to v3.0
- add support for GH actions


## 2.0.1 - 2024-04-01
- cut support for PHP 7
- add support for PHP 8.1, 8.2 & 8.3
- bump test suite dependencies to latest installable versions


## 2.0.2 - 2024-04-01
- bump composer dependencies to latest versions
