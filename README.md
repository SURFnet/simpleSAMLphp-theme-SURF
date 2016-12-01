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
directory or by using composer.

# License
As this module takes code from simpleSAMLphp which is licensed under the LGPLv2
this module has the same license. See included `COPYING` file.

# Installation
We assume simpleSAMLphp is installed in `/var/www/simplesamlphp`, see the
[installation instructions](http://simplesamlphp.org/docs/1.9/simplesamlphp-install). 

You can install this theme as follows:

    $ cd /var/www/simplesamlphp/modules
    $ git clone https://github.com/SURFnet/simpleSAMLphp-SURFnet.git themeSURFnet

Now you can edit the main configuration file to enable the theme, change the
following line in `/var/www/simplesamlphp/config/config.php`:

    'theme.use'             => 'default',

Into:

    'theme.use'             => 'themeSURFnet:SURFnet',

This should enable the theme. You can only see it in action when there is an
actual login screen with username and password dialog.

# Customization
If you want to use your own logo you need to modify the CSS somewhat. The logo 
included in the distribution has size 128x87. You need to modify 
`www/style.css` in the following places:

    div#header img{
            width: 128px;
            margin: 0 0 0 20px;
    }

Set `width` here to the width of the logo.

    div#header{
            position:relative;
            height: 108px;
    }

Set `height` here to the height of the logo and add 21 to it. So if your logo
has height 44, the height specified here should be `65px`.
