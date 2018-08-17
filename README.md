# ls-integration

Run `docker-compose up`

Integrated Payment Provider for Lightspeed eCommerce.

## Providers

Each payment provider will make use of LS eCom's `external_services` endpoint and registers itself to a shop as a payment provider.

The LS eCom application is then aware of the provider and can make sure payments are processed.

### Methods

#### Install
Install LS Coin to your shop `http://0.0.0.0:8087/public/install`