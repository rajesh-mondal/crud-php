<?php
define( 'DB_NAME', 'C:\\xampp\\htdocs\\crud-php\\data\\db.txt' );
function seed() {
    $data = array(
        array(
            "id"       => 1,
            "email"    => "admin@gmail.com",
            "password" => "pass123",
            "username" => "admin1",
            "role"     => "admin",
        ), array(
            "id"       => 2,
            "email"    => "rajesh@gmail.com",
            "password" => "pass123",
            "username" => "rajesh",
            "role"     => "user",
        ), array(
            "id"       => 3,
            "email"    => "john@gmail.com",
            "password" => "pass123",
            "username" => "johndoe",
            "role"     => "user",
        ),
    );

    $serializedData = serialize( $data );
    file_put_contents( DB_NAME, $serializedData, LOCK_EX );
}

function generateReport() {
    $serializedData = file_get_contents( DB_NAME );
    $users = unserialize( $serializedData );
    ?>
    <table>
        <tr>
            <th>Email</th>
            <th>Username</th>
            <th>Role</th>
            <th width="20%">Action</th>
        </tr>
        <?php
        foreach ( $users as $user ) {
        ?>
            <tr>
                <td><?php printf( '%s', $user['email'] );?></td>
                <td><?php printf( '%s', $user['username'] );?></td>
                <td><?php printf( '%s', $user['role'] );?></td>
                <td><?php printf( '<a href="index.php?task=edit&id=%s">Edit</a> | <a href="index.php?task=delete&id=%s">Delete</a>', $user['id'], $user['id'] );?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
}