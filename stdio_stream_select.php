<?php

echo 'Program starts at ' . date('h:i:s') . PHP_EOL;

$timeout = 10;
$result = array();
$sockets = array();
$convenient_read_block = 8192;

/* Issue all requests simultaneously; there's no blocking. */
$delay = 15;
$id = 0;

while ($delay > 0) {
    $stream = stream_socket_client(
        "unlikelysource.com:80", $errno,
        $errstr,
        $timeout,
        STREAM_CLIENT_ASYNC_CONNECT|STREAM_CLIENT_CONNECT);

    if ($stream) {
        $sockets[$id++] = $stream;
        $http_message = "GET /?page=php7"
            . $delay
            . " HTTP/1.1\r\nHost: unlikelysource.com\r\n\r\n";
        fwrite($stream, $http_message);
    } else {
        echo "Stream " . $id . " failed to open correctly.";
    }

    $delay -= 3;
}

while (count($sockets)) {
    $read = $sockets;
    $write = NULL;
    $error = NULL;

    stream_select($read, $write, $error, $timeout);

    if (count($read)) {
        /*
         * stream_select generally shuffles $read, so we need to
         * compute from which socket(s) we're reading.
         */
        foreach ($read as $r) {
            $id = array_search($r, $sockets);
            $data = fread($r, $convenient_read_block);

            if (!isset($result[$id])) {
                $result[$id] = '';
            }

            /*
             * A socket is readable either because it has
             * data to read, OR because it's at EOF.
             */
            if (strlen($data) == 0) {
                echo "Stream " . $id . " closes at " . date('h:i:s') . ".\n";
                fclose($r);
                unset($sockets[$id]);
            } else {
                $result[$id] .= $data;
            }
        }
    } else {
        /*
         * A time-out means that *all* streams have failed
         * to receive a response.
         */
        echo "Time-out!\n";
        break;
    }
}

var_dump($result);