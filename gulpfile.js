var gulp = require('gulp');
var minifycss = require('gulp-minify-css');
var notify = require('gulp-notify');
var less = require('gulp-less');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var exec = require('child_process').exec;
var	sys = require('sys');

gulp.task('bootstrap', function(){
	return gulp.src(['public/assets/css/bootstrap/bootstrap.css', 'public/assets/css/bootstrap/bootstrap-theme.css'])
		.pipe(concat('bootstrap.css'))
		.pipe(minifycss())
		.pipe(gulp.dest('public/assets/compiled'));
});

gulp.task('css', function(){
	return gulp.src([
			'public/assets/fonts.css',
			'public/assets/font-awesome.css',
			'public/assets/ionicons.min.css'
		])
		.pipe(concat('site.css'))
		.pipe(minifycss())
		.pipe(gulp.dest('public/assets/compiled'));
});

gulp.task('scripts', function(){
	return gulp.src([
			'public/assets/js/bootstrap.min.js',
			'public/assets/js/billing.js', 
			'public/assets/js/jquery.colorbox.js',
			'public/assets/js/prettify',
			'public/assets/js/app.js'
		])
		.pipe(concat('site.js'))
		.pipe(uglify())
		.pipe(gulp.dest('public/assets/compiled'));
});

gulp.task('phpunit', function(){
	exec('phpunit', function(error, stdout){
		sys.puts(stdout);
	});
});

gulp.task('watch', function() {
	gulp.watch('public/assets/css/*.css', ['css']);
	gulp.watch('public/assets/js/*.js', ['scripts']);
	gulp.watch('app/**/*.php', ['phpunit']);
});

gulp.task('default', ['bootstrap', 'css', 'scripts', 'phpunit', 'watch']);



