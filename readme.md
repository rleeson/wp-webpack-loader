# Webpack Asset Loader

PHP library for use in WordPress applications to facilitate development using Webpack Dev Server and deployment of Webpack published assets. Loader provides a systematic method to enqueue scripts and styles produced from Webpack entry points.

## Default Configuration

All assets are registered with the following sets of configuration parameters:

- `Handle Prefixes`: wpwebpack-
- `Script Path`: /assets/dist/js/
- `Static Path`: /assets/dist/static/
- `Style Path`: /assets/dist/css/

## Usage

Register sets of assets associated with a Webpack configuration as follows:

```
use WPWebpackLoader\AssetLoader;
use WPWebpackLoader\Model\LoaderConfiguration;

// Define WPWEBPACK_DEV_ASSETS as a constant in wp-config.php
$assets = new AssetLoader( 
            home_url(), 
            WPWEBPACK_DEV_ASSETS,
            new LoaderConfiguration(
                function_to_get_version(),
                [ 'https://production-site.url/base' ]
            )
        );

```