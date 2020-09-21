const conf = require( './gulp.config.js' )
const gulp = require( 'gulp' )
const plumber = require( 'gulp-plumber' )
const pug = require( 'gulp-pug' )

module.exports = function pug2html() {
  return gulp.src( 'src/manager/pages/*.pug' )
    .pipe( plumber() )
    .pipe( pug( { pretty: true } ) )
    .pipe( gulp.dest( conf.buildPath + '/manager' ) )
}
