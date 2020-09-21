const gulp = require( 'gulp' )

module.exports = () => {
  return gulp.src( 'src/**/*.htaccess' )
    .pipe( gulp.dest( 'build' ) )
}
