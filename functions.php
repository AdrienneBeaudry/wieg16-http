<?php
// "HTTP/1.0 404 Not Found"
function status_header($code = 200) {
    $message = [
        200 => "OK",
        404 => "Page not found",
        302 => "Moved temporarily",
        303 => "Something something",
        500 => "Server error"
    ];
    header("HTTP/1.0 ".$code." ".$message[$code]);
}
status_header();

// [header => värde]
function headers(array $headers = []) {
    foreach ($headers as $header => $value) {
        header("$header: $value");
    }
}
headers([
    "Connection" => "keep-alive"
]);

function redirect($url, $code = 302) {
    status_header($code);
    header("Location: $url");
    exit;
}