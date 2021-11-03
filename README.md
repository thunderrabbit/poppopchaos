25 Oct 2021

## Pop Pop Chaos

Sentimental Version: Proof of Concept with locally and server-inflating bubbles

Okay basically I tried to pop Slimframework onto this and get:

bcn.robnugen.com/api/v1/     = Slim Framework Hello World
bcn.robnugen.com/api/v1/click_bubble     = Slim Framework bubble clicked
bcn.robnugen.com/index2.html  = https://bl.ocks.org/mbostock/3231298
bcn.robnugen.com             = My attempt at Pop Pop Chaos if I visit

The idea is to have Slim Framework handle api calls and return data for my D3

Next steps?:

* Have Slim access database
** Try this to connect my app to a DB
** Not going to `composer require monolog/monolog` because my web host does logging
** smurf some data per click

* Create endpoints like api/v1/create (to create a bubble)
** Have D3 send bubble create GET requests, perhaps ONE TIME ONLY when setting up the initial game bubbles
** Parse bubble creation from D3


### Directory structure

A good directory structure helps you organize your code,
simplifies setup on the webserver and
increases the security of the entire application.

Plan to use the following
[directory structure](https://odan.github.io/2019/11/05/slim4-tutorial.html)
in the root directory of the project:

    .
    ├── config/             Configuration files
    ├── public/             Web server files (DocumentRoot)
    │   └── .htaccess       Apache redirect rules for the front controller
    │   └── index.php       The front controller
    ├── templates/          Twig templates
    ├── src/                PHP source code (The App namespace)
    ├── tmp/                Temporary files (cache and logfiles)
    ├── vendor/             Reserved for composer
    ├── .htaccess           Internal redirect to the public/ directory
    ├── .gitignore          Git ignore rules
    └── composer.json       Project dependencies and autoloader

In a web application, it is important to distinguish between the public and non-public areas.

The public/ directory serves your application and
will therefore also be directly accessible by
all browsers, search engines and API clients.
All other folders are not public and must not be accessible online.


Mouseover to repel nodes. Adapted from mbostock's [talk on force layouts](http://vimeo.com/29458354). Compare to the [canvas version](/mbostock/3231307).
