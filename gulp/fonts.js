const gulp = require( 'gulp' )

module.exports = function fontsCopy() {
  return gulp.src( 'src/manager/fonts/*' )
    .pipe( gulp.dest( 'build/manager/fonts' ) )
}
