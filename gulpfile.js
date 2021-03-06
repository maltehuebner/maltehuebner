let gulp = require('gulp');
let minify = require('gulp-minify');
let cleanCSS = require('gulp-clean-css');
let concat = require('gulp-concat');
let urlAdjuster = require('gulp-css-replace-url');
let imageResize = require('gulp-image-resize');

let sass = require('gulp-sass');
sass.compiler = require('node-sass');

/* Resize images */
gulp.task('resize-asset-images', function () {
    gulp.src('assets/images/full-size/*')
        .pipe(imageResize({
            width : 1024,
            height : 833,
            upscale : false
        }))
        .pipe(gulp.dest('public/images/resized'));
});

/* Assets */

gulp.task('copy-asset-images', function () {
    gulp.src('assets/images/projects/*')
        .pipe(gulp.dest('public/images/projects'));

    gulp.src('assets/images/header/*')
        .pipe(gulp.dest('public/images/header'));

    gulp.src('assets/images/resized/*')
        .pipe(gulp.dest('public/images/resized/'));

    gulp.src('assets/images/background/*')
        .pipe(gulp.dest('public/images/background/'));

    return gulp.src('assets/images/*')
        .pipe(gulp.dest('public/images/'));
});

gulp.task('copy-fonts', function () {
    return gulp.src('node_modules/@fortawesome/fontawesome-pro/webfonts/*')
        .pipe(gulp.dest('public/webfonts'));
});

gulp.task('build-assets', ['copy-asset-images', 'copy-fonts']);


/* CSS */

gulp.task('sass', function () {
    return gulp.src('assets/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('assets/css'));
});

gulp.task('compress-css', ['sass'], function () {
    return gulp.src([
            'node_modules/bootstrap/dist/css/bootstrap.css',
            'node_modules/@fortawesome/fontawesome-pro/css/all.min.css',
            'assets/css/*',
        ])
        .pipe(cleanCSS())
        .pipe(concat('malte.min.css'))
        .pipe(gulp.dest('public/css/'));
});

gulp.task('build-css', ['sass', 'compress-css']);


/* Javascript */

gulp.task('compress-js', function () {
    return gulp.src([
        'assets/js/*',
    ])
        .pipe(minify({
            ext: {
                min:'.min.js'
            },
            noSource: true,
        }))
        .pipe(gulp.dest('public/js/'));
});

gulp.task('copy-js-external', function () {
    return gulp.src([
        //'node_modules/@fortawesome/font-awesome-pro/all.min.js',
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/popper.js/dist/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
    ])
        .pipe(gulp.dest('public/js/'));
});

gulp.task('build-js', ['compress-js', 'copy-js-external']);

gulp.task('build', ['build-assets', 'build-js', 'build-css', 'copy-fonts']);

gulp.task('default', ['build']);
