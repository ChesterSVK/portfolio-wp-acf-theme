const path = require('path')
const { merge } = require('webpack-merge')
const common = require('./webpack.common.js')
// const HtmlWebpackPlugin = require('html-webpack-plugin')

module.exports = merge(common, {
  mode: 'development',
  devtool: 'inline-source-map',
  entry: {
    // require.resolve('webpack-dev-server/client'),
    main: path.resolve(__dirname, './src/main.js'),
  },
  devServer: {
    inline: true,
    hot: true,
    stats: 'minimal',
    contentBase: __dirname,
    overlay: true,
    injectClient: true,
    disableHostCheck: true,
    liveReload: true
    // port: 80,
    // public: 'http://localhost:80'
    // contentBase: './assets/js/dist'
  },
  watch: process.env.NODE_ENV === 'development',
  watchOptions: {
    aggregateTimeout: 200,
    ignored: /node_modules/,
    poll: 1000
  },
  output: {
    path: path.resolve(__dirname, 'assets', 'js', 'dist'),
    publicPath: path.resolve(__dirname, 'assets', 'js', 'dist'),
    filename: '[name].js',
    clean: true,
    crossOriginLoading: 'anonymous'
  }
})
