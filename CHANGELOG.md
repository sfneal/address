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
