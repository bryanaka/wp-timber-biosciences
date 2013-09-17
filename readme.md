Biosciences - A Developer's Wordpress Theme
======================================================================

Getting Started
------------------------------------------

You will need:

- Compass
- Node & NPM
- Wordpress and the following plugins
  - Timber (Lib)

Soft Dependancies:
- Advanced Custom Fields (for scientist post type)
- Custom Post Type UI (for scientist post type)

Note: This is a Wordpress theme, so it needs to be placed in the themes directory in order to work.

Run `npm install && bower install`

Styles - Live inside the assets/scss directory. Use `compass compile` to compile the styles and then use `grunt copy`. A more formal build process will be made for this later (with one line builds and developer auto-compile with grunt-watch).

Scripts - Live in the assets/js directory. Unfortunately, wordpress requires you do javascript their way. See their on wp_register_script and wp_enqueue_script

Templates - Live in the views directory. Basically Twig Templates with some extra wordpress stuff thanks to Timber.

Why Timber?
--------------

In the web community, those of us who work in MVC are used to template languages like:

* Ruby's ERB or Haml
* Javascript's Handlebars or Jade
* PHP's Twig or Blade
* Python's Jinga or Shpaml

Instead of building off of a wealth of collective knowledge, Wordpress decided to use it's own format based on PHP functions. It's restrictive, it's confusing, and it's ugly.

[wp]: http://wordpress.org
[timber]: https://github.com/jarednova/timber
[jaradnova]: https://github.com/jarednova
[upstatement]: http://upstatement.com
