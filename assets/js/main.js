require.config({
    paths: {
        "jquery": "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min",
        "bootstrap": "bootstrap",
        "biosciences-core": "biosciences"
    }
});
// how can you load bootstrap as something separate with it's own AMD?
require(["biosciences-core"]);
