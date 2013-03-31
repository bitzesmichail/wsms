<?php
    session_start();

    include 'models/users.php';
    include 'models/database.php';

    if( isset( $_POST[ 'username' ] ) &&
        isset( $_POST[ 'password' ] ) ){
        
        $userid = CreateUser( $_POST[ 'username' ], $_POST[ 'password' ] );
        if( $userid ) {
            $_SESSION[ 'username' ] = $_POST[ 'username' ];
            $_SESSION[ 'userid' ] = $userid;
        }
        header( 'Location: index.php' );
    }
?>