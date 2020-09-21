const conf = require( './gulp.config.js' )
const gulp = require( 'gulp' )

module.exports = function htaccessCopy() {
  return gulp.src( 'src/**/.htaccess' )
    .pipe( gulp.dest( conf.buildPath ) )
}
