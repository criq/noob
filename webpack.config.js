const path = require('path');
const webpack = require('webpack');

module.exports = [

	{
		mode: 'production',
		entry: {
			app: path.join(__dirname, 'static', 'javascript', 'index.js'),
		},
		watch: true,
		output: {
			path: __dirname + '/public/javascript/',
			publicPath: '/javascript/',
			filename: "[name].js",
		},
		module: {
			rules: [
				{
					test: /.jsx?$/,
					include: [
						path.resolve(__dirname, 'static', 'javascript'),
					],
					exclude: [
						path.resolve(__dirname, 'node_modules'),
					],
					loader: 'babel-loader',
				},
			],
		},
		resolve: {
			extensions: ['.json', '.js', '.jsx']
		},
		plugins: [
			new webpack.ProvidePlugin({
				$: 'jquery',
				axios: 'axios',
				jQuery: 'jquery',
			}),
		],
		devtool: 'source-map',
	},

	{
		mode: 'production',
		entry: [
			path.join(__dirname, 'static', 'scss', 'screen.scss'),
		],
		output: {
			path: __dirname + '/public/css/',
			publicPath: '/css/',
			filename: "[name].css",
		},
		module: {
			rules: [
				{
					test: /\.s?css$/,
					use: [
						{
							loader: 'file-loader',
							options: {
								name: '[name].css',
							}
						},
						{
							loader: 'extract-loader',
						},
						{
							loader: 'css-loader',
						},
						{
							loader: 'postcss-loader',
						},
						{
							loader: 'sass-loader',
						},
					],
				},
			],
		},
	},

];
