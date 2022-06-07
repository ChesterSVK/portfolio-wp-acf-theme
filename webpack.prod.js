const path = require('path')
const { merge } = require('webpack-merge')
const common = require('./webpack.common.js')

module.exports = merge(common, {
  mode: 'production',
  devtool: 'source-map',
  entry: {
    // require.resolve('webpack-dev-server/client'),
    main: path.resolve(__dirname, './src/main.js'),
  },
  output: {
    path: path.resolve(__dirname, 'assets', 'js', 'dist'),
    filename: '[name].min.js',
    clean: true
  }
})
