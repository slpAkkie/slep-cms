const gulp = require( 'gulp' )

module.exports = () => {
  return gulp.src( 'src/manager/fonts/*' )
    .pipe( gulp.dest( 'build/manager/fonts' ) )
}
