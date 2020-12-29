# About this component

Het Locatie Component implementeert de places en accommodations strategie vanuit schema.org. Het vormt daarmee de basis voor het bijhouden en verhuren van ruimtes en kan in de meest simpele configuratie worden gebruikt voor planningsvraagstukken. Bijvoorbeeld bij gebouwen rondom te reserveren ruimtes zoals (vergader)zalen. Dit component is nadrukkelijk ontworpen om samen met het [PDC](https://github.com/ConductionNL/productenendienstencatalogus) het commercieel verhuren van gehele gebouwen, of ruimtes daarin te faciliteren. Hiermee kan het de technische basis vormen voor appartementen/kamerverhuur platforms, hotel-software of zelfs camping- software. 

## Documentation

- [Installation manual](https://github.com/ConductionNL/locatiescomponent/blob/master/INSTALLATION.md).
- [contributing](https://github.com/ConductionNL/locatiescomponent/blob/master/CONTRIBUTING.md) for tips tricks and general rules concerning contributing to this component.
- [codebase](https://github.com/ConductionNL/locatiescomponent) on github.
- [codebase](https://github.com/ConductionNL/locatiescomponent/archive/master.zip) as a download.

Getting started
-------
Do you want to create your own Commonground component? Take a look at our in depht [tutorial](TUTORIAL.md) on spinning up your own component!

The commonground bundle
-------
This repository uses the power of conductions [commonground bundle](https://packagist.org/packages/conduction/commongroundbundle) for symfony to provide common ground specific functionality based on the [VNG Api Strategie](https://docs.geostandaarden.nl/api/API-Strategie/). Including  

* Build in support for public API's like BAG (Kadaster), KVK (Kamer van Koophandel)
* Build in validators for common dutch variables like BSN (Burger service nummer), RSIN(), KVK(), BTW()
* AVG and VNG proof audit trails
* And [much more](https://packagist.org/packages/conduction/commongroundbundle) .... 

Be sure to read our [design considerations](/design.md) concerning the [VNG Api Strategie](https://docs.geostandaarden.nl/api/API-Strategie/). 

Requesting features
-------
Do you need a feature that is not on this list? don't hesitate to send us a [feature request](https://github.com/ConductionNL/commonground-component/issues/new?assignees=&labels=&template=feature_request.md&title=).  

Staying up to date
-------

## Features
This repository uses the power of the [commonground proto component](https://github.com/ConductionNL/commonground-component) provide common ground specific functionality based on the [VNG Api Strategie](https://docs.geostandaarden.nl/api/API-Strategie/). Including  

* Build in support for public API's like BAG (Kadaster), KVK (Kamer van Koophandel)
* Build in validators for common dutch variables like BSN (Burger service nummer), RSIN(), KVK(), BTW()
* AVG and VNG proof audit trails, Wildcard searches, handling of incomplete date's and underInvestigation objects
* Support for NLX headers
* And [much more](https://github.com/ConductionNL/commonground-component) .... 

## License

Copyright &copy; [Gemeente Utrecht](https://www.utrecht.nl/)  2019 

Licensed under [EUPL](https://github.com/ConductionNL/locatiescomponent/blob/master/LICENSE.md)

## Credits

[![Utrecht](https://raw.githubusercontent.com/ConductionNL/locatiescomponent/master/resources/logo-utrecht.svg?sanitize=true "Utrecht")](https://www.utrecht.nl/)
[![Conduction](https://raw.githubusercontent.com/ConductionNL/locatiescomponent/master/resources/logo-conduction.svg?sanitize=true "Conduction")](https://www.conduction.nl/)



