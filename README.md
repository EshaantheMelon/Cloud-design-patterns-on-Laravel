---
services: app-service\web,app-service
platforms: php
initial author: cephalin
modified by: eshaan menon
---

# MEAN.js sample for Azure App Service

This was made from a sample application that you can use to follow along with the tutorial at 
[Build a PHP and MySQL web app in Azure](https://docs.microsoft.com/azure/app-service-web/app-service-web-tutorial-php-mysql). 

This sample application is taken from the official [Laravel sample task list application](https://github.com/laravel/quickstart-basic) and modified minimally to make it work with Azure App Service. For instructions on how to use Laravel, see the official repository. 

Modifications include porting to Laravel for application of the Gatekeeper patten through middleware and usage of a service worker for cache-aside. Made for a university assignment at APU.

## License

See [LICENSE](LICENSE).

## Contributing

This project has adopted the [Microsoft Open Source Code of Conduct](https://opensource.microsoft.com/codeofconduct/). For more information see the [Code of Conduct FAQ](https://opensource.microsoft.com/codeofconduct/faq/) or contact [opencode@microsoft.com](mailto:opencode@microsoft.com) with any additional questions or comments.
 
## Container Managment Update

This project has been modified to fit the requirements of the customer as specified by the DDAC course at APU