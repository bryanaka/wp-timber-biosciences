
/*!
 * WPFireShell Gruntfile
 * Based on FireShell
 * http://getfireshell.com
 * @author Todd Motto
 * @subauthor Bryan Robles
 */

/**
 * Grunt module
 */
module.exports = function(grunt) {
    'use strict';
    /**
     * Dynamically load npm tasks
     */
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    /**
     * FireShell Grunt config
     */
    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        /**
         * Set app project paths
         */
        app: {
            assets: 'assets',
            bower: '<% app.assets %>/vendor',
            styles: '<%= app.assets %>/scss',
            js: '<%= app.assets %>/js'
        },

        /**
         * Traverse your files and auto-generate an appropriate modernizr file
         * https://github.com/Modernizr/grunt-modernizr
         */
        modernizr: {
            "devFile": "<%= app.bower %>/modernizr/modernizr.js",
            "outputFile": "<% app.js %>/modernizr-custom.js",
            "extra" : {
                "shiv" : true,
                "printshiv" : false,
                "load" : true,
                "mq" : true,
                "cssclasses" : true
            },
            // Based on default settings on http://modernizr.com/download/
            "extensibility" : {
                "addtest" : false,
                "prefixed" : false,
                "teststyles" : false,
                "testprops" : false,
                "testallprops" : false,
                "hasevents" : false,
                "prefixes" : false,
                "domprefixes" : false
            },
        
            // By default, source is uglified before saving
            "uglify" : true,
        
            // Define any tests you want to implicitly include.
            // Only including tests that apply to IE 8 and up
            // "tests" : [],
            "tests": [ 'cssgradients',
                       'opacity',
                       'touch',
                       'fontface',
                       'borderradius',
                       'boxshadow',
                       'inlinesvg',
                       'draganddrop',
                       'svg',
                       'input',
                       'inputtypes',
                       'cssanimations',
                       'canvas',
                       'csstransforms3d'
                    ],
        
            // By default, this task will crawl your project for references to Modernizr tests.
            // Set to false to disable.
            "parseFiles" : true,
        
            // When parseFiles = true, this task will crawl all *.js, *.css, *.scss files, except files that are in node_modules/.
            // You can override this by defining a "files" array below.
            // "files" : [],
        },

        /**
         * Project banner
         * Dynamically appended to CSS/JS files
         * Inherits text from package.json
         */
        tag: {
            banner: '/*!\n' + ' * <%= pkg.name %>\n' + ' * <%= pkg.title %>\n' + ' * <%= pkg.url %>\n' + ' * @author <%= pkg.author %>\n' + ' * @version <%= pkg.version %>\n' + ' * Copyright <%= pkg.copyright %>. <%= pkg.license %> licensed.\n' + ' */\n'
        },


        /**
         * JSHint
         * https://github.com/gruntjs/grunt-contrib-jshint
         * Manage the options inside .jshintrc file
         */
        jshint: {
            files: ['src/js/*.js'],
            options: {
                jshintrc: '.jshintrc'
            }
        },

        /**
         * Concatenate JavaScript files
         * https://github.com/gruntjs/grunt-contrib-concat
         * Imports all .js files and appends project banner
         */
        concat: {
            dev: {
                files: {
                    '<%= project.app %>/js/scripts.min.js': '<%= project.js %>'
                }
            },
            options: {
                stripBanners: true,
                nonull: true,
                banner: '<%= tag.banner %>'
            }
        },

        /**
         * Uglify (minify) JavaScript files
         * https://github.com/gruntjs/grunt-contrib-uglify
         * Compresses and minifies all JavaScript files into one
         */
        uglify: {
            options: {
                banner: "<%= tag.banner %>"
            },
            dist: {
                files: {
                    '<%= project.app %>/js/scripts.min.js': '<%= project.js %>'
                }
            }
        },

        /**
         * Compile Sass/SCSS files
         * https://github.com/gruntjs/grunt-contrib-sass
         * Compiles all Sass/SCSS files and appends project banner
         */
        sass: {
            dev: {
                options: {
                    style: 'expanded',
                    banner: '<%= tag.banner %>'
                },
                files: {
                    '<%= project.app %>/css/style.min.css': '<%= project.css %>'
                }
            },
            dist: {
                options: {
                    style: 'compressed',
                    banner: '<%= tag.banner %>'
                },
                files: {
                    '<%= project.app %>/css/style.min.css': '<%= project.css %>'
                }
            }
        },

        /**
         * Compile Sass/SCSS files with Compass
         * https://github.com/gruntjs/grunt-contrib-sass
         * Compiles all Sass/SCSS files and appends project banner
         */
        compass: {
            dev: {
                options: {
                    sassDir: 'sass',
                    cssDir: 'stylesheets',
                    outputStyle: 'expanded',
                    environment: 'development'
                    // httpPath: '',
                    // imagesDir: '',
                    // javascriptsDir: '',
                    // fontsDir: '',
                    // 
                }
            },
            dist: {
                options: {
                    sassDir: 'sass',
                    cssDir: '.',
                    outputStyle: 'compressed',
                    environment: 'production'
                    // httpPath: '',
                    // imagesDir: '',
                    // javascriptsDir: '',
                    // fontsDir: '',
                    //
                }
            },
        },

        /**
         * Runs tasks against changed watched files
         * https://github.com/gruntjs/grunt-contrib-watch
         * Watching development files and run concat/compile tasks
         * Livereload the browser once complete
         */
        watch: {
            concat: {
                files: '<%= project.src %>/js/{,*/}*.js',
                tasks: ['concat:dev', 'jshint']
            },
            sass: {
                files: '<%= project.src %>/scss/{,*/}*.{scss,sass}',
                tasks: ['sass:dev']
            }
        }
    });

    /**
     * Default task
     * Run `grunt` on the command line
     */
    grunt.registerTask('default', ['sass:dev', 'jshint', 'concat:dev', 'connect:livereload', 'open', 'watch']);

    /**
     * Build task
     * Run `grunt build` on the command line
     * Then compress all JS/CSS files
     */
    grunt.registerTask('build', ['sass:dist', 'jshint', 'uglify']);

};