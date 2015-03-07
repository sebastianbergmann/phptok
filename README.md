# phptok

`phptok` is a tool for quickly dumping the tokens of a PHP sourcecode file.

## Installation

### PHP Archive (PHAR)

The easiest way to obtain phptok is to download a [PHP Archive (PHAR)](http://php.net/phar) that has all required dependencies of phptok bundled in a single file:

    wget https://phar.phpunit.de/phptok.phar
    chmod +x phptok.phar
    mv phptok.phar /usr/local/bin/phptok

You can also immediately use the PHAR after you have downloaded it, of course:

    wget https://phar.phpunit.de/phptok.phar
    php phptok.phar

### Composer

Simply add a dependency on `sebastian/phptok` to your project's `composer.json` file if you use [Composer](http://getcomposer.org/) to manage the dependencies of your project. Here is a minimal example of a `composer.json` file that just defines a development-time dependency on phptok:

    {
        "require-dev": {
            "sebastian/phptok": "*"
        }
    }

For a system-wide installation via Composer, you can run:

    composer global require 'sebastian/phptok=*'

Make sure you have `~/.composer/vendor/bin/` in your path.

