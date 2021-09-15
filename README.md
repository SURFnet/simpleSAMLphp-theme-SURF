# Introduction
This project contains a [simpleSAMLphp](https://www.simplesamlphp.org) theme 
based on the design for an identity provider login screen that is optimized 
for use on mobile devices like smart phones and tablets. It was tested on a
variety of devices.

The original design by Stroom can be found on Github Pages, and also in the 
`gh-pages` branch in this repository.
 
[Login Page](https://surfnet.github.io/simpleSAMLphp-theme-SURF/index.html), 
[Error Page](https://surfnet.github.io/simpleSAMLphp-theme-SURF/storing.html).

The module can be installed in simpleSAMLphp by copying it into the `modules` 
directory or by using composer.

# License
As this module takes code from simpleSAMLphp which is licensed under the LGPLv2.1
or later, this module has the same license. See included `COPYING` file.

# Installation
We assume simpleSAMLphp is installed in `/var/www/simplesamlphp`, see the
[installation instructions](https://simplesamlphp.org/docs/stable/simplesamlphp-install).

You can install this theme as follows:

    $ cd /var/www/simplesamlphp/modules
    $ git clone https://github.com/SURFnet/simpleSAMLphp-theme-SURF.git themesurf

Now you can edit the main configuration file to enable the theme, change the
following line in `/var/www/simplesamlphp/config/config.php`:

    'theme.use'             => 'default',

Into:

    'theme.use'             => 'themesurf:surf',

This should enable the theme. You can only see it in action when there is an
actual login screen with username and password dialog.
