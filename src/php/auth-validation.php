<?php
$status = $_GET['status'];
$message = $_GET['errorMessage'];

function insert_error_message($text) {
    echo '
            <h3 
              class="errorMessage" 
              style="color: red; grid-column: span 2; text-align: center"
            >' .
        $text .
        '</h3>';
}

if ($status === '400') {
    insert_error_message($message);
}

