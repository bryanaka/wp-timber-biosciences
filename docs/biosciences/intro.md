Getting Started with the Biosciences Theme
===============================================================================

This theme is based on the Wordpress Plugin called [Timber-Library][gh-timber]. It uses Twig Templates and Timber Objects to fetch the wordpress data and populate the templates. I would highly recommend reviewing the Timber tutorials and documentation **first** because it will provide you **a large majority** of the information that you will actually need to understand what is going on. In combination with the Wordpress Routing Page, you should be able to grasp 90% of what is going on, though the inner workings may feel a bit hand-wavy.

[Timber Overview][timber-overview]  
[Timber Documentation][timber-docs]  
[Timber Tutorials][timber-tuts]  
[Wordpress Routing (aka template hierarchy)][wp-routing]  

Development Tools
-------------------------------------------------------------------------------

Though the following tools are **optional**, they do help develop more effectively and efficently. You can decide whether or not to use them, but deciding to not use them will force you to do a lot more work manually while developing.

### [Grunt.js][grunt]

##### What is it?

This is a task runner that optimizes and builds code. You will need Node.js to use Grunt, which you can find at [nodejs.org][nodejs]. Node isn't used for anything else. To Run it, you just use the command `grunt` in the command line. It was my far off goal to use Grunt for a lot more.

##### What are the Advantages?

You can configure it to run tasks for you automatically, such as reloading changes as you are developing, minimizing and concatenating your javascript and css, compiling SCSS, etc. The point is that it reduces or eliminates you having to think about mundane tasks.

##### What are the Disadvantages?

It has a learning curve attached for configuration. I would honestly drop grunt if the maintainers are not wililng to learn it, since Compass provides enough functionality to handle what Grunt does.

##### Do I have to use it?

If you want to use it, check out the documentation and the Gruntfile. If not, ignore the Gruntfile and Node. Not using it has no adverse side effects, since other systems can be put in place to solve the problems this was solving.

See [Better Wordpress Minify][wp-minify] and [Compass][compass].

### [SCSS][scss]

##### What is it?

This is a CSS precompiler that was presented a while back at a Jingo Board. I used it for ease of development, and because you are still allowed to write regular css if you rather not bother with the SCSS stuff.

##### What are the Advantages?

Too many to name in my opinion. But here are some concrete examples 

- Variables allow a very consistant use of colors, effects, and styles.
- Mixins and Functions help solve cross-browser issues easily
- helps concatenate and minimize code to load more efficently and make the website faster

##### What are the Disadvantages?

Not really a disadvantage, but requires installing Ruby and the sass gem.

If a developer doesn't care about CSS structure, SCSS can sometimes exagerate the bad design. The effect is generally good code becomes better code and bad code becomes worse code.

##### Do I have to use it?

It is pretty easy to grasp, one day or less and you can get the basics down. Like I said, you can also write plain CSS inside your SCSS files and it works just fine. The only real part you have to learn is compiling it, which would probably be best done by [Compass][compass] using it's watch functionality.

The ROI is well worth it, no mater how you try and cut it. If you rather not use it, just ignore the SCSS files, and just use the CSS files. 

### [Compass][compass]

##### What is it?

##### What are the Advantages?

##### What are the Disadvantages?

##### Do I have to use it?




[gh-timber]: https://github.com/jarednova/timber

[grunt]: http://gruntjs.com/
[nodejs]: http://nodejs.org/
[scss]: http://sass-lang.com/documentation/
[compass]: http://compass-style.org/


[timber-overview]: http://www.youtube.com/watch?v=rTLgoY0vrfM
[timber-docs]: https://github.com/jarednova/timber/wiki
[timber-tuts]: https://github.com/jarednova/timber/wiki/Video-Tutorials

[wp-routing]: http://codex.wordpress.org/Template_Hierarchy
[wp-minify]: http://wordpress.org/plugins/bwp-minify/

