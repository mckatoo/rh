process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
    	"../../../node_modules/bootstrap/dist/css/bootstrap.min.css",
    	"../../../node_modules/sb-admin-2/vendor/metisMenu/metisMenu.min.css",
    	"../../../node_modules/sb-admin-2/dist/css/sb-admin-2.css",
    	"iesi.css",
    ], "public/assets/css/admin.css"),
    mix.version([
      "assets/css/admin.css"
    ]);
});
