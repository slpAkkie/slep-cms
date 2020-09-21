const gulp = require( 'gulp' )

module.exports = function phpCopy() {
  return gulp.src( 'src/**/*.php' )
    .pipe( gulp.dest( 'build' ) )
}
