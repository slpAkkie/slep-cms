const conf = require( './gulp.config.js' )
const gulp = require( 'gulp' )

module.exports = function fontsCopy() {
  return gulp.src( 'src/manager/fonts/*' )
    .pipe( gulp.dest( conf.buildPath + '/manager/fonts' ) )
}
