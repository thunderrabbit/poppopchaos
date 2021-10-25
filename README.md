25 Oct 2021

## Pop Pop Chaos

Sentimintal Version: Pre Alpha Proof of Htaccess Concept

Okay basically I tried to pop Slimframework onto this and get:

bcn.robnugen.com/api/v1/     = Slim Framework Hello World
bcn.robnugen.com/api/v1/click_bubble     = Slim Framework bubble clicked
bcn.robnugen.com/index2.html  = https://bl.ocks.org/mbostock/3231298
bcn.robnugen.com             = My attempt at Pop Pop Chaos if I visit

The idea is to have Slim Framework handle api calls and return data for my D3

Next steps?:

* Get D3 to hit api/v1/click_bubble via click_bubble if a bubble is clicked
* Have Slim return +1 to inflate the bubble

* Have Slim access database
** smurf some data per click

* Create endpoints like api/v1/create (to create a bubble)
** Have D3 send bubble create GET requests, perhaps ONE TIME ONLY when setting up the initial game bubbles
** Parse bubble creation from D3

Mouseover to repel nodes. Adapted from my [talk on force layouts](http://vimeo.com/29458354). Compare to the [canvas version](/mbostock/3231307).
