<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

set_error_handler(function ($severity, $message, $file, $line) {
    echo "<pre style='background:#111;color:#f55;padding:10px;border-radius:10px;'>";
    echo "<b>Błąd:</b> $message<br>";
    echo "<b>Plik:</b> $file<br>";
    echo "<b>Linia:</b> $line<br>";
    echo "</pre>";
    return true;
});

set_exception_handler(function ($exception) {
    echo "<div style='background:#222;color:#eee;padding:20px;border-radius:12px;margin:20px;font-family:monospace'>";
    echo "<h3 style='color:#f66'>💥 Wyjątek: " . get_class($exception) . "</h3>";
    echo "<p><b>" . $exception->getMessage() . "</b></p>";
    echo "<small>Plik: " . $exception->getFile() . " w linii " . $exception->getLine() . "</small>";
    echo "<hr><pre style='color:#9cf'>" . $exception->getTraceAsString() . "</pre>";
    echo "</div>";
});
