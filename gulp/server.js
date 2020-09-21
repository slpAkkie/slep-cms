const gulp = require( 'gulp' )

const imageMinify = require( './imageMinify' )
const styles = require( './styles' )
const pug2html = require( './pug2html' )
const script = require( './script' )
const php = require( './php.js' )
const htaccess = require( './.htaccess.js' )

const server = require( 'browser-sync' ).create()

function readyReload( cb ) {
  server.reload()
  cb()
}

module.exports = function server( cb ) {
  server.init( {
    server: 'build',
    notify: false,
    open: true,
    cors: true
  } )

  gulp.watch( 'src/manager/img/**/*.{gif,png,jpg,svg,webp}', gulp.series( imageMinify, readyReload ) )
  gulp.watch( 'src/manager/styles/**/*.scss', gulp.series( styles, cb => gulp.src( 'build/css' ).pipe( server.stream() ).on( 'end', cb ) ) )
  gulp.watch( 'src/manager/js/**/*.js', gulp.series( script, readyReload ) )
  gulp.watch( 'src/**/*.php', gulp.series( php, readyReload ) )
  gulp.watch( 'src/**/*.htaccess', gulp.series( htaccess, readyReload ) )
  gulp.watch( 'src/manager/pages/**/*.pug', gulp.series( pug2html, readyReload ) )

  return cb()
}
