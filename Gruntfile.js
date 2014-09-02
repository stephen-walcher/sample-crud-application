module.exports = function(grunt) {
    grunt.initConfig({
        handlebars: {
            templates: {
                options: {
                    namespace: 'Project.templates',
                    processName: function(filePath) {
                        var pieces = filePath.split('/');
                        var pieces = pieces[pieces.length - 1].split('.');
                        return pieces[0];
                    }
                },
                files: [{
                    expand: true,
                    cwd: 'handlebars',
                    src: ['**/*.handlebars'],
                    dest: 'public/js/templates',
                    ext: '.js'
                }]
            }
        },
        less: {
            development: {
                files: [{
                    expand: true,
                    cwd: 'less',
                    src: ['**/*.less', '!mixins.less', '!theme.less'],
                    dest: 'public/css',
                    ext: '.css'
                }],
                options: {
                    compress: true,
                    yuicompress: true,
                    optimization: 2
                }
            }
        },
        uglify: {
            js: {
                options: {
                    compress: false,
                    report: 'min',
                    mangle: false
                },
                files: [{
                    expand: true,
                    cwd: 'javascript',
                    src: '**/*.js',
                    dest: 'public/js',
                    ext: '.min.js'
                }]
            }
        },
        watch: {
            handlebars: {
                files: ['handlebars/**/*.handlebars'],
                tasks: ['handlebars']
            },
            styles: {
                files: ['less/**/*.less'],
                tasks: ['less']
            },
            scripts: {
                files: ['javascript/**/*.js'],
                tasks: ['uglify']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-handlebars');

    grunt.registerTask('default', ['watch']);
};