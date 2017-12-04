"use strict";

var gulp = require('gulp'),
      watch = require('gulp-watch'),
      prefixer = require('gulp-autoprefixer'),
			uglify = require('gulp-uglify'),
			sourcemaps = require('gulp-sourcemaps'),
			rigger = require('gulp-rigger'),
			less = require('gulp-less'),
			jade = require('gulp-jade'),
			cssmin = require('gulp-minify-css'),
			browserSync = require("browser-sync"),
			reload = browserSync.reload;

var path = {
    dist: { 
        html: '',
        js: 'dist/',
        css: 'dist/'
    },
    src: { 
        jade: 'src/template/*.jade',
        js: 'src/build.js',
        less: 'src/build.less'
    },
    watch: { 
        jade: 'src/**/*.jade',
        js: 'src/**/*.js',
        css: 'src/**/*.less'
    }
};

var ServerConfig = {
	server: {
		baseDir: ""
	},
	//tunnel: true,
	host: 'localhost',
	port: 8000,
	open: true,
	notify: false,
	//logPrefix: "madest"
};

function wrapPipe(taskFn) {
  return function(done) {
    var onSuccess = function() {
      done();
    };
    var onError = function(err) {
      done(err);
    }
    var outStream = taskFn(onSuccess, onError);
    if(outStream && typeof outStream.on === 'function') {
      outStream.on('end', onSuccess);
    }
  }
};

gulp.task('browserSync', function () {browserSync(ServerConfig);});

gulp.task('watch', function(){
		watch('index.html', function(){
			gulp.start('index');
		});
    watch(path.watch.jade, function(event, cb) {
        gulp.start('jade');
    });
    watch(path.watch.css, function(event, cb) {
				console.log(event, cb);
        gulp.start('less');
    });
    watch(path.watch.js, function(event, cb) {
        gulp.start('js');
    });
});


gulp.task('jade', function () {
	return gulp
			.src(path.src.jade)
			.pipe(jade())
			.pipe(gulp.dest(path.dist.html))
			.pipe(reload({stream: true}));
});

gulp.task('js', function () {
	return gulp
			.src(path.src.js)
			.pipe(rigger())
			.pipe(sourcemaps.init())
			.pipe(uglify())
			.pipe(sourcemaps.write())
			.pipe(gulp.dest(path.dist.js))
			.pipe(reload({stream: true}));
});

gulp.task('less', wrapPipe(function(success, error) {
	return gulp
			.src(path.src.less)
			.pipe(sourcemaps.init())
			.pipe(less().on('error', error))
			.pipe(prefixer())
			.pipe(cssmin())
			.pipe(sourcemaps.write())
			.pipe(gulp.dest(path.dist.css))
			.pipe(reload({stream: true}));
}));



gulp.task('index', function(){
	return gulp
			.src('index.html')
			.pipe(reload({stream:true}));
});

gulp.task('default', ["watch", "browserSync"]);