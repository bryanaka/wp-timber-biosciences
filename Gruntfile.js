
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
            js: '<%= app.assets %>/js',
            buildJs: ['<%= app.js %>/*.js', '<%= app.js %>/**/*.js', '!<%= app.js %>/scripts.min.js']
        },

        /**
         * Traverse your files and auto-generate an appropriate modernizr file
         * https://github.com/Modernizr/grunt-modernizr
         */
        modernizr: {
            'devFile': '<%= app.bower %>/modernizr/modernizr.js',
            'outputFile': '<% app.js %>/modernizr-custom.js',
            'extra' : {
                'shiv' : true,
                'printshiv' : false,
                'load' : true,
                'mq' : true,
                'cssclasses' : true
            },
            // Based on default settings on http://modernizr.com/download/
            'extensibility' : {
                'addtest' : false,
                'prefixed' : false,
                'teststyles' : false,
                'testprops' : false,
                'testallprops' : false,
                'hasevents' : false,
                'prefixes' : false,
                'domprefixes' : false
            },
        
            // By default, source is uglified before saving
            'uglify' : true,
        
            // Define any tests you want to implicitly include.
            // Only including tests that apply to IE 8 and up
            // 'tests' : [],
            'tests': [ 'cssgradients',
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
            'parseFiles' : true,
        
            // When parseFiles = true, this task will crawl all *.js, *.css, *.scss files,
            // except files that are in node_modules/.
            // You can override this by defining a 'files' array below.
            // 'files' : [],
        },

        /**
         * Project banner
         * Dynamically appended to CSS/JS files
         * Inherits text from package.json
         */
        tag: {
            banner: '/*!\n' + ' * <%= pkg.name %>\n' +
                    ' * <%= pkg.title %>\n' +
                    ' * <%= pkg.url %>\n' +
                    ' * @author <%= pkg.author %>\n' +
                    ' * @version <%= pkg.version %>\n' +
                    ' * Copyright <%= pkg.copyright %>. <%= pkg.license %> licensed.\n' + ' */\n'
        },


        /**
         * JSHint
         * https://github.com/gruntjs/grunt-contrib-jshint
         * Manage the options inside .jshintrc file
         */
        jshint: {
            files: ['<%= app.js %>/*.js',
                    '<%= app.js %>/**/*.js',
                    '!<%= app.js %>/modernizr*',
                    '!<%= app.js %>/responsive_slides.min.js',
                    '!<%= app.js %>/scripts.min.js'],
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
                    '<%= app.js %>/scripts.min.js': ['<%= app.js %>/*.js',
                                                     '<%= app.js %>/**/*.js',
                                                     '!<%= app.js %>/modernizr*.js',
                                                     '!<%= app.js %>/scripts.min.js']
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
                banner: '<%= tag.banner %>'
            },
            dist: {
                files: {
                    '<%= app.js %>/scripts.min.js': ['<%= app.js %>/*.js',
                                                     '<%= app.js %>/**/*.js',
                                                     '!<%= app.js %>/scripts.min.js']
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
                    httpPath: '/wp-content/themes/timber-biosciences',
                    sassDir: '<%= app.styles %>',
                    cssDir: '<%= app.assets %>/css',
                    outputStyle: 'expanded',
                    environment: 'development',
                    imagesDir: '<%= app.assets%>/img',
                    relativeAssets: true,
                    javascriptsDir: '<%= app.js %>',
                    fontsDir: '<%= app.assets %>/fonts'
                }
            },
            dist: {
                options: {
                    httpPath: '/wp-content/themes/timber-biosciences',
                    sassDir: '<%= app.styles %>',
                    cssDir: '<%= app.assets %>/css',
                    outputStyle: 'compressed',
                    environment: 'production',
                    imagesDir: '<%= app.assets%>/img',
                    relativeAssets: true,
                    javascriptsDir: '<%= app.js %>',
                    fontsDir: '<%= app.assets %>/fonts'
                }
            },
        },
        copy: {
            styles: {
                src: 'assets/css/style.css',
                dest: 'style.css'
            }
        },

        /**
         * Runs tasks against changed watched files
         * https://github.com/gruntjs/grunt-contrib-watch
         * Watching development files and run concat/compile tasks
         * Livereload the browser once complete
         */
        watch: {
            concat: {
                files: '<%= app.js %>/js/{,*/}*.js',
                tasks: ['concat:dev', 'jshint']
            },
            compass: {
                files: '<%= app.styles %>/{,*/}*.{scss,sass}',
                tasks: ['compass:dev', 'copy:styles']
            }
        }
    });

    /**
     * Default task
     * Run `grunt` on the command line
     */
    grunt.registerTask('default', ['compass:dev', 'jshint', 'concat:dev', 'watch']);

    /**
     * Build task
     * Run `grunt build` on the command line
     * Then compress all JS/CSS files
     */
    grunt.registerTask('build', ['sass:dist', 'jshint', 'uglify']);

};