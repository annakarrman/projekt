const gulp      = require("gulp");
const concat    = require("gulp-concat");
const sass      = require("gulp-sass");
const cleanCSS  = require("gulp-clean-css");
const imagemin  = require("gulp-imagemin");
const uglify    = require("gulp-uglify");
const watch     = require("gulp-watch");



// Copy html-files from src-folder to pub-folder
gulp.task("copyPHP", function() {
    return gulp.src("src/*.php")
    .pipe(gulp.dest("pub/"));
});

// copy php-files from src-folder to pub-folder
gulp.task("copyincludes", function() {
    return gulp.src("src/includes/*.php")
    .pipe(gulp.dest("pub/includes"));
});

// copy classes
gulp.task("copyclass", function() {
    return gulp.src("src/includes/classes/*.php")
    .pipe(gulp.dest("pub/includes/classes"));
});

// copy JS for lists
gulp.task("minconcatLists", function() {
    return gulp.src("src/js/lists.js")
    .pipe(concat("lists.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest("pub/js"));
})

// copy JS for products
gulp.task("minconcatProducts", function() {
    return gulp.src("src/js/products.js")
    .pipe(concat("products.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest("pub/js"));
})


// make sass-files into clean css-file and copy them to pub-folder
gulp.task("minconcatscss", function() {
    return gulp.src("src/scss/*.scss")
        .pipe(sass().on("error", sass.logError))
        .pipe(concat("styles.min.css"))
        .pipe(cleanCSS())
        .pipe(gulp.dest("pub/css"));
});

// copy images from src-folder to pub-folder
gulp.task("imagemin", function() {
    return gulp.src("src/images/*")
    .pipe(imagemin())
    .pipe(gulp.dest("pub/images"));
});




// watchers
gulp.task("watcher", function() {

    watch("src/*.php", function() {            // watcher for html
        gulp.start("copyPHP");
    });

    watch("src/scss/*.scss", function() {       // watcher for scss
        gulp.start("minconcatscss");
    });

    watch("src/images/*.jpg", function() {      // watcher for images
        gulp.start("imagemin");
    });

    watch("src/includes/*.php", function() {    // watcher for includes
        gulp.start("copyincludes");
    });

    watch("src/includes/classes/*.php", function() {    // watcher for classes
        gulp.start("copyclass");
    });

    watch("src/js/*.js", function() {       // watcher for lists.js
        gulp.start("minconcatLists");
    });

    watch("src/js/*.js", function() {   // watcher for products.js
        gulp.start("minconcatProducts");
    });


});


gulp.task("default", ["copyPHP", "minconcatscss", "imagemin", "copyincludes", "copyclass", "minconcatLists", "minconcatProducts", "watcher"]);