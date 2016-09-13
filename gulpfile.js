var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;

// Project Settings
var server = 'localhost' // Set to localhost, IP address or development domain
var port = '8888' // Port being used by your web server
var directory = 'aliens_survey' // Project Directory Name


gulp.task('default', function () {
    browserSync.init({
        proxy: server + ":" + port + "/" + directory,
        ui: false
    });
    gulp.watch("*.*").on("change", reload);
});
