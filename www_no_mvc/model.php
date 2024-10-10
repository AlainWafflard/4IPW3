<?php

function check_login($login): bool
{
    $authorized_user = "cassepied";

    return( $login == $authorized_user );
}

