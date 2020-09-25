const gulp = require( 'gulp' )
const del = require( 'del' )

const conf = { buildPath: 'P:/Program Files/OpenServer/domains/slep-cms.slp' };

function srcCopy() {
	return gulp.src( 'src/**/*.*' )
		.pipe( gulp.dest( conf.buildPath ) )
}

function vendorCopy() {
	return gulp.src( 'vendor/**/*.*' )
		.pipe( gulp.dest( conf.buildPath + '/vendor' ) )
}

function htaccessCopy() {
	return gulp.src( 'src/**/.htaccess' )
		.pipe( gulp.dest( conf.buildPath ) )
}

function clean( cb ) {
	return del( conf.buildPath, { force: true } ).then( () => {
		cb()
	} )
}

function watcher() {
	gulp.watch( 'src/**/*.*', srcCopy )
	gulp.watch( 'src/**/.htaccess', htaccessCopy )
	gulp.watch( 'vendor/**/*.*', vendorCopy )
}


const build = gulp.series( srcCopy, vendorCopy, htaccessCopy )

const cleanBuild = gulp.series( clean, build )

module.exports.cleanDev = gulp.series( cleanBuild, watcher )
module.exports.build = cleanBuild
