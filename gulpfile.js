const gulp = require( 'gulp' )
const del = require( 'del' )

const conf = { buildPath: 'P:/Program Files/OpenServer/domains/slep-cms.slp' };

function htaccessCopy() {
	return gulp.src( 'src/**/.htaccess' )
		.pipe( gulp.dest( conf.buildPath ) )
}

function phpCopy() {
	return gulp.src( 'src/**/*.php' )
		.pipe( gulp.dest( conf.buildPath ) )
}

function clean( cb ) {
	return del( conf.buildPath, { force: true } ).then( () => {
		cb()
	} )
}

function watcher() {
	gulp.watch( 'src/**/*.php', phpCopy )
	gulp.watch( 'src/**/.htaccess', htaccessCopy )
}


const build = gulp.parallel( phpCopy, htaccessCopy )

const cleanBuild = gulp.series( clean, build )

module.exports.cleanDev = gulp.series( cleanBuild, watcher )
module.exports.build = cleanBuild
