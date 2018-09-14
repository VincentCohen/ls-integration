# ls-integration

  Run `docker-compose up` or `docker-compose up --build` for a fresh build

Integrated Payment Provider for Lightspeed eCommerce.

## Providers
Each payment provider will make use of LS eCom's `external_services` endpoint and registers itself to a shop as a payment provider.

The LS eCom application is then aware of the provider and can make sure payments are processed.

### Methods
#### Install
Install LS Coin to your shop `http://0.0.0.0:8087/public/install`


`docker exec -t lscoin_www_1 bash`