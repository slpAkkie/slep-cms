const gulp = require( 'gulp' )
const plumber = require( 'gulp-plumber' )
const sourcemaps = require( 'gulp-sourcemaps' )
const rigger = require( 'gulp-rigger' )
const uglify = require( 'gulp-uglify-es' ).default

module.exports = () => {
  return gulp.src( 'src/manager/js/*.js' )
    .pipe( plumber() )
    .pipe( rigger() )
    .pipe( sourcemaps.init() )
    .pipe( uglify() )
    .pipe( sourcemaps.write() )
    .pipe( gulp.dest( 'build/manager/js' ) )
}
