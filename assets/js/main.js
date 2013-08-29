require.config({
    paths: {
		"requireLib": "../bower_lib/requirejs/require",
        "jquery": "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min",
        "bootstrap": "bootstrap",
        "biosciences": "biosciences"
    }
});
require(['requireLib']);
// how can you load bootstrap as something separate with it's own AMD?
require(["biosciences"]);
