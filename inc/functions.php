<?php
define('DB_NAME','C:\\xampp\\htdocs\\crud-php\\data\\db.txt');
function seed( ) {
    $data = array(
        array(
            "id"       => 1,
            "email"    => "admin@gmail.com",
            "password" => "pass123",
            "username" => "admin1",
            "role"     => "admin"
        ), array(
            "id"       => 2,
            "email"    => "rajesh@gmail.com",
            "password" => "pass123",
            "username" => "rajesh",
            "role"     => "user"
        ), array(
            "id"       => 3,
            "email"    => "john@gmail.com",
            "password" => "pass123",
            "username" => "johndoe",
            "role"     => "user"
        ),
    );

    $serializedData = serialize( $data );
    file_put_contents( DB_NAME, $serializedData, LOCK_EX );
}