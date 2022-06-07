const HtmlWebpackPlugin = require('html-webpack-plugin')
const { VueLoaderPlugin } = require('vue-loader')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const webpack = require('webpack')
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

module.exports = {
  mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
  plugins: [
    new webpack.DefinePlugin({
      __VUE_OPTIONS_API__: true,
      __VUE_PROD_DEVTOOLS__: true
    }),
    new VueLoaderPlugin(),
    new HtmlWebpackPlugin({
      title: 'Development',
      template: 'assets/html/devIndex.html'
    }),
    new MiniCssExtractPlugin({
      filename: '[name].css'
    })
  ],
  module: {
    rules: [
      // {
      //   test: /\.html$/,
      //   loader: 'raw-loader'
      // },
      {
        enforce: 'pre',
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'eslint-loader',
        options: {
          quiet: true
        }
      },
      {
        test: /\.js$/,
        exclude: '/node_modules',
        loader: 'babel-loader'
      },
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          loaders: {
            scss: 'vue-style-loader!css-loader!sass-loader', // <style lang="scss">
            sass: 'vue-style-loader!css-loader!sass-loader?indentedSyntax', // <style lang="sass">
            css: 'vue-style-loader!css-loader'
          }
        }
      },
      {
        test: /\.(png|gif)$/,
        use: {
          loader: 'url-loader',
          options: { limit: 8192 }
        }
      },
      {
        test: /\.svg$/,
        use: [
          {
            loader: 'svg-url-loader',
            options: {
              limit: 10000
            }
          }
        ]
      },
      {
        test: /\.s(c|a)ss$/,
        use: [
          'vue-style-loader',
          'css-loader',
          {
            loader: 'sass-loader',
            // Requires sass-loader@^8.0.0
            options: {
              implementation: require('sass'),
              sassOptions: {
                fiber: require('fibers'),
                indentedSyntax: true // optional
              },
            },
          },
        ]
      }
      // {
      //   test: /\.css$/,
      //   use: [
      //     'vue-style-loader',
      //     'style-loader',
      //     'css-loader'
      //   ]
      // },
      // // this will apply to both plain `.sass` files
      // // AND `<style lang="sass">` blocks in `.vue` files
      // {
      //   test: /\.sass$/,
      //   use: [
      //     'vue-style-loader',
      //     'css-loader',
      //     {
      //       loader: 'sass-loader',
      //       options: {
      //         // indentedSyntax: true,
      //         // sass-loader version >= 8
      //         sassOptions: {
      //           indentedSyntax: true
      //         }
      //         // Global variable
      //         // additionalData: '$color: red;'
      //       }
      //     }
      //   ]
      // },
      // {
      //   test: /\.scss$/,
      //   // exclude: /node_modules/,
      //   use: [
      //     MiniCssExtractPlugin.loader,
      //     {
      //       loader: 'style-loader'
      //     },
      //     {
      //       loader: 'css-loader',
      //       options: {
      //         sourceMap: true
      //       }
      //     }
      //   ]
      // },
    ]
  },
  resolve: {
    alias: {
      // this isn't technically needed, since the default `vue` entry for bundlers
      // is a simple `export * from '@vue/runtime-dom`. However having this
      // extra re-export somehow causes webpack to always invalidate the module
      // on the first HMR update and causes the page to reload.
      vue: '@vue/runtime-dom'
    },
    extensions: ['.js', '.vue', '.json']
  },
  optimization: {
    minimizer: [new UglifyJsPlugin(
      {
        sourceMap: true,
        extractComments: 'all'
      }
    )]
  }
}
