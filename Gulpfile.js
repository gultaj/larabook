var gulp = require('gulp'),
    stylus = require('gulp-stylus'),
    autoprefixer = require('gulp-autoprefixer');

var build_path = 'public/',
    src_path = 'app/assets/';

gulp.task('stylus', function () {
    gulp.src(src_path + 'stylus/*.styl')
        .pipe(stylus())
        .pipe(autoprefixer({
            browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1']
        }))
        .pipe(gulp.dest(build_path + 'css'));
});

//gulp.task('stylus:build', function () {
//    gulp.src(src_path + 'stylus/*.styl')
//        .pipe(stylus({ compress: true }))
//        .pipe(replace(/src\/\.\.\//g, ''))
//        .pipe(rename({suffix: '.min'}))
//        .pipe(gulp.dest(build_path + 'css'));
//});

gulp.task('watch', function () {
    gulp.watch([src_path + 'stylus/**/*'], ['stylus']);
});

gulp.task('default', ['stylus', 'watch']);
