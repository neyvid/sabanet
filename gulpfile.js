var gulp = require('gulp');
var rtlcss = require('gulp-rtlcss');

gulp.task('default', function () {
    return gulp.src('public/css/app.css')
        .pipe(rtlcss())
        .pipe(gulp.dest('public/css/app-rtl'));
});
