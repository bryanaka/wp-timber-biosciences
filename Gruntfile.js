module.exports = function(grunt) {
	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),
		
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
			},
			build: {
				src: 'src/<%= pkg.name %>.js',
				dest: 'build/<%= pkg.name %>.min.js'
			}
		},
		copy: {
			styles: {
				src: 'assets/stylesheets/style.css',
				dest: 'style.css'
			}
		},
		compass: {
			prod:{
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
			}
		},
		watch: {
			js: {
				files: 'js/**.js',
				tasks: '',
				options: {}
			},
			scss: {
				files: 'sass/**.scss',
				tasks: '',
				options: {}
			}
		}

	});

	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-watch');
};