// var url = "http://localhost/";

// document.addEventListener("DOMContentLoaded", function () {
//     var jsFile = "americanShoping/src/js/bootstrap/bootstrap.min.js"; // Ruta del archivo CSS

//     var linkElement = document.getElementById("bootstrap.min.js");
//     linkElement.href = url + jsFile;
// });

// var url = "http://localhost/";

// document.addEventListener("DOMContentLoaded", function () {
//   var jsFile = "americanShoping/src/js/bootstrap/bootstrap.min.js"; // Ruta del archivo JavaScript

//   var scriptElement = document.createElement("script");
//   scriptElement.src = url+jsFile;

//   document.head.appendChild(scriptElement);
// });

// document.addEventListener("DOMContentLoaded", function () {
//   var jsFile2 = "americanShoping/src/js/popper.min.js"; // Ruta del archivo JavaScript

//   var scriptElement = document.createElement("script");
//   scriptElement.src = url+jsFile2;

//   document.head.appendChild(scriptElement);
// });

// document.addEventListener("DOMContentLoaded", function () {
//   var jsFile3 = "americanShoping/src/js/redirection.js"; // Ruta del archivo JavaScript

//   var scriptElement = document.createElement("script");
//   scriptElement.src = url+jsFile3;

//   document.head.appendChild(scriptElement);
// });

// document.addEventListener("DOMContentLoaded", function () {
//   var jsFile4 = "americanShoping/src/js/redirect-css.js"; // Ruta del archivo JavaScript

//   var scriptElement = document.createElement("script");
//   scriptElement.src = url+jsFile4;

//   document.head.appendChild(scriptElement);
// });


var url = "http://localhost/";

document.addEventListener("DOMContentLoaded", function() {
    var rutas = [
        "americanShoping/src/js/bootstrap/bootstrap.min.js",
        "americanShoping/src/js/bookstores/popper.min.js",
        "americanShoping/src/js/redirection.js",
        // "americanShoping/src/js/redirect-css.js",
        "americanShoping/src/js/bootstrap/bootstrap.bundle.js"

        // "americanShoping/src/js/bootstrap/bootstrap.bundle.min.js",
        // "americanShoping/src/js/jquery-easing/jquery.easing.min.js",
        // "americanShoping/src/js/sb-admin-2.min.js",
        // "americanShoping/src/js/chart.js/Chart.min.js",
        // "americanShoping/src/js/demo/chart-area-demo.js",
        // "americanShoping/src/js/demo/chart-pie-demo.js",


    ]; // Rutas de los archivos JavaScript a cargar

    for (var i = 0; i < rutas.length; i++) {
        var jsFile = rutas[i];
        var scriptElement = document.createElement("script");
        scriptElement.src = url + jsFile;
        document.body.appendChild(scriptElement);
    }
});

// var url = "http://localhost/";

// document.addEventListener("DOMContentLoaded", function () {
//     var jsFile = "americanShoping/src/js/bootstrap/bootstrap.min.js"; // Ruta del archivo JavaScript
//     var scriptElement = document.createElement("script");
//     scriptElement.innerHTML =
//         "var dynamicScript = document.createElement('script'); dynamicScript.src = '" +
//         url +
//         jsFile +
//         "'; document.head.appendChild(dynamicScript);";
//     document.head.appendChild(scriptElement);
// });
