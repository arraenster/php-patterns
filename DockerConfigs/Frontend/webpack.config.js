let Encore = require('@symfony/webpack-encore');
let path = require('path');
let glob = require('glob');

Encore
// the project directory where compiled assets will be stored
.setOutputPath('public/build/corporate')
// the public path used by the web server to access the previous directory
.setPublicPath('/build/corporate')
.cleanupOutputBeforeBuild()
.enableSourceMaps(!Encore.isProduction())
// create hashed filenames (e.g. app.abc123.css)
.enableVersioning(Encore.isProduction())
// React assets
.addEntry('scripts', glob.sync('./assets/Js/**/*.js'))
.configureBabel(function (babelConfig) {
	babelConfig.presets.push('env');
	babelConfig.presets.push('react');
	babelConfig.presets.push('babel-preset-es2015');
	babelConfig.presets.push('babel-preset-stage-0');
})
.addStyleEntry('styles', glob.sync('./assets/Css/**/*.css'));

const corporateConfig = Encore.getWebpackConfig();

corporateConfig.name = 'corporate';

Encore.reset();

// Export Webpack Config
module.exports = corporateConfig;