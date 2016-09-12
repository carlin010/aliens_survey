var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;

// Add your project's root directory name here
var rootDir = 'aliens_survey'

gulp.task('default', function () {
    browserSync.init({
        proxy: "localhost:8888/" + rootDir
    });
    gulp.watch("*.*").on("change", reload);
});
