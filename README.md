# Introduction

This project contains a [simpleSAMLphp](http://www.simplesamlphp.org) theme 
based on the design for an identity provider login screen that is optimized 
for use on mobile devices like smart phones and tablets. It was tested on a
variety of devices.

The original design by Stroom can be found on Github Pages, and also in the 
`gh-pages` branch in this repository.
 
[Login Page](http://surfnet.github.com/simpleSAMLphp-SURFnet/index.html), 
[Error Page](http://surfnet.github.com/simpleSAMLphp-SURFnet/storing.html).

The module can be installed in simpleSAMLphp by copying it into the `modules` 
directory.

# Installation
We assume simpleSAMLphp is installed in `/var/www/simplesamlphp`, see the
[installation instructions](http://simplesamlphp.org/docs/1.9/simplesamlphp-install). 

You can install this theme as follows:

    $ cd /var/www/simplesamlphp/modules
    $ git clone https://github.com/SURFnet/simpleSAMLphp-SURFnet.git themeSURFnet
    $ touch /var/www/simplesamlphp/modules/themeSURFnet/enable

Now you can edit the main configuration file to enable the theme, change the
following line in `/var/www/simplesamlphp/config/config.php`:

    'theme.use'             => 'default',

Into:

    'theme.use'             => 'themeSURFnet:SURFnet',

This should enable the theme. You can only see it in action when there is an
actual login screen with username and password dialog.

# Customization

If you want to modify this theme to use your own branding there are a few 
locations where you can modify the code. These will be explained below.

TODO 
