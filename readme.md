Biosciences - A Developer's Wordpress Theme
======================================================================

#### Dependancies
[**Wordpress**][wp] - duh  
[**Timber**][timber] - a plugin by [Jarad Novack][jaradnova] + [Upstatement][upstatement]

#### *Wait... You depend on a plugin?*

Some may not agree, but I think the Wordpress code base is confusing and their APIs are a disaster.
What the hell is a the_ID()? ID for a post or a page or a menu? and does 

And don't forget our best friend, the loop. It's crazy.

Luckily, Jarad Novack had a similar take, which is why he created Timber: An object oriented abstraction of the Wordpress Theming API.

Why Timber?
--------------

In the web community, those of us who work in MVC are used to template languages like:

* Ruby's ERB or Haml
* Javascript's Handlebars or Jade
* PHP's Twig or Blade
* Python's Jinga or Shpaml

Instead of building off of a wealth of collective knowledge, Wordpress decided to use it's own format based on PHP functions. It's restrictive, it's confusing, and it's ugly.

Get Started with Timber
-----------------------


[wp]: http://wordpress.org
[timber]: https://github.com/jarednova/timber
[jaradnova]: https://github.com/jarednova
[upstatement]: http://upstatement.com
