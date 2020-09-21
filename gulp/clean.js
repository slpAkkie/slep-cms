const conf = require( './gulp.config.js' )
const del = require( 'del' )

module.exports = function clean( cb ) {
  return del( conf.buildPath, { force: true } ).then( () => {
    cb()
  } )
}
