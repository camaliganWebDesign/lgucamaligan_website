module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				options: {
					style: 'compressed'
				},
				files: {
					'index.css' : 'main.scss'
				}
			}
		},
		watch: {
			css: {
				files: [
					'**/*.scss'
				],
				tasks: ['sass']
			}
		},
	});
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default', ['sass'] );
};






module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				options: {
					style: 'compressed'
				},
				files: {
					'index.css' : 'main.scss'
				}
			}
		},
		watch: {
			css: {
				files: [
					'**/*.scss',
					'../modal/**/*.scss'
				],
				tasks: ['sass']
			}
		},
	});
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default', ['sass'] );
};
