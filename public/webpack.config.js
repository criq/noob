const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

module.exports = [

	{
		mode: 'production',
		entry: {
			front: path.join(__dirname, 'resources', 'javascript', 'index.js'),
		},
		watch: true,
		output: {
			path: __dirname + '/dist/',
			publicPath: '/dist/',
			filename: "[name].js",
		},
		module: {
			rules: [
				{
					test: /.jsx?$/,
					include: [
						path.resolve(__dirname, 'resources', 'javascript'),
					],
					exclude: [
						path.resolve(__dirname, 'node_modules'),
					],
					loader: 'babel-loader',
					query: {
						presets: [
							["@babel/env", {
								"targets": {
									"browsers": "last 2 chrome versions"
								}
							}],
						],
					},
				},
			],
		},
		resolve: {
			extensions: ['.json', '.js', '.jsx']
		},
		devtool: 'source-map',
		optimization: {
			minimizer: [
				new UglifyJsPlugin({
					extractComments: true,
				}),
			],
		},
	},

	{
		mode: 'development',
		entry: [
			path.join(__dirname, 'resources', 'scss', 'screen.scss'),
		],
		output: {
			path: __dirname + '/dist/',
			publicPath: '/dist/',
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
							loader: 'extract-loader'
						},
						{
							loader: 'css-loader?-url'
						},
						{
							loader: 'postcss-loader',
						},
						{
							loader: 'sass-loader'
						},
					],
				},
			],
		},
	},

];
