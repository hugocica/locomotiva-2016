var gulp = require('gulp'),
    sass = require('gulp-sass'),
    livereload = require('gulp-livereload');


gulp.task('sass', function() {
    gulp.src('../css/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('../css'))
        .pipe(livereload());
});
// gulp.task('minify', function() {
//     gulp.src('../css/*.css')
//         .pipe(minify())
//         .pipe(gulp.dest('../css'));
// });
gulp.task('watch', function() {
    livereload.listen();
    gulp.watch('../css/*.scss', ['sass']);
    // gulp.watch('../css/roteiro.css', ['minify']);
});

gulp.task('default', ['sass', 'watch']);
