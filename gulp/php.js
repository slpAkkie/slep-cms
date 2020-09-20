const gulp = require( 'gulp' )

module.exports = () => {
  return gulp.src( 'src/**/*.php' )
    .pipe( gulp.dest( 'build' ) )
}
