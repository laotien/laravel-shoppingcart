const mix = require('laravel-mix');
const lodash = require("lodash");
const WebpackRTLPlugin = require('webpack-rtl-plugin');
const folder = {
    src: "resources/", // source files
    dist: "public/", // build files
    dist_assets: "public/admin/assets/" //build assets files
};

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

const third_party_assets = {
    css_js: [
        { "name": "axios", "assets": ["./node_modules/axios/dist/axios.min.js"] },
    ],
};

//copying third party assets
lodash(third_party_assets).forEach(function(assets, type) {
    if (type === "css_js") {
        lodash(assets).forEach(function(plugin) {
            let name = plugin['name'],
                assetList = plugin['assets'],
                css = [],
                js = [];
            lodash(assetList).forEach(function(asset) {
                let ass = asset.split(',');
                for (let i = 0; i < ass.length; ++i) {
                    if (ass[i].substr(ass[i].length - 3) == ".js") {
                        js.push(ass[i]);
                    } else {
                        css.push(ass[i]);
                    }
                };
            });
            if (js.length > 0) {
                mix.combine(js, folder.dist_assets + "/libs/" + name + "/" + name + ".min.js");
            }
            if (css.length > 0) {
                mix.combine(css, folder.dist_assets + "/libs/" + name + "/" + name + ".min.css");
            }
        });
    }
});

mix.sass('resources/scss/custom.scss', folder.dist_assets + "css").options({ processCssUrls: false }).minify(folder.dist_assets + "css/custom.css");

mix.combine('resources/js/plugins.js', folder.dist_assets + "js/plugins.min.js");
