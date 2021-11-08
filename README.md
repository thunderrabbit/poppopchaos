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
** smurf some data per click

* BACKEND:

** Add other stuff I have done here for the api
** Make sure it all works as before
*** e.g. https://bcn.robnugen.com/api/vr1/get_bubbles/ shows 3 bubbles of JSON data
*** and the click bubble POST works as well

* FRONTEND, after backend is working and we don't need any Slim code from here
** Make an empty git repo Pop Pop Chaos Monolith on GH
** Make a git remote for this repo and backup this to the new remote
** Remove link to backup remote so we leave it intact
** make a copy of index.html somewhere outside this repo
** Look up how to remove file history from git repo
** Remove all files but public/ directory
** Remove public/index.php
** If that is chaos, just go back to commit where we started Slim
** cherry-pick commits that only refer to index.html
** ???
** Done!


* Have D3 send bubble create GET requests, perhaps ONE TIME ONLY when setting up the initial game bubbles

* smurf some data per click
* Create endpoints like api/v1/create (to create a bubble)
** Have D3 send bubble create GET requests, perhaps ONE TIME ONLY when setting up the initial game bubbles
** Parse bubble creation from D3

Mouseover to repel nodes. Adapted from mbostock's [talk on force layouts](http://vimeo.com/29458354). Compare to the [canvas version](/mbostock/3231307).
