const conf = require( './gulp.config.js' )
const gulp = require( 'gulp' )

module.exports = function phpCopy() {
  return gulp.src( 'src/**/*.php' )
    .pipe( gulp.dest( conf.buildPath ) )
}
