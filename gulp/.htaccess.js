const gulp = require( 'gulp' )

module.exports = function htaccessCopy() {
  return gulp.src( 'src/**/.htaccess' )
    .pipe( gulp.dest( 'build' ) )
}
