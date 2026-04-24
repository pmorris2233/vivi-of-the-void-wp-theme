import path from 'node:path';
import MiniCssExtractPlugin from 'mini-css-extract-plugin';

import { CleanWebpackPlugin } from 'clean-webpack-plugin';

const __dirname = import.meta.dirname;

export default {
	entry: {
		'main': [
			'./src/js/index.jsx',
			'./src/sass/style.scss'
		],
	},
	output: {
		filename: '[name].js',
		path: path.resolve(__dirname, 'dist')
	},
	module: {
		rules: [
			{
				test: /\.(js|jsx)$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env', '@babel/preset-react'],
					},
				},
			},
			{
				test: /\.s(a|c)ss$/,
				exclude: /node_modules/,
				use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
			},
			{
				test: /\.(png|jpg|gif)$/,
					type: 'asset/resource',
					generator: {
						filename: './assets/img/[name][ext]',
					}
			}
		]
	},
	plugins: [
		new CleanWebpackPlugin({
			cleanOnceBeforeBuildPatterns: [
				'./*'
			]
		}),
		new MiniCssExtractPlugin({
			filename:'./main.css'
		})
	],
	resolve: {
		alias: {
			"@": path.resolve(__dirname, "./src/"),
		},
		extensions: ['.jsx', '.js'],
	},
}
