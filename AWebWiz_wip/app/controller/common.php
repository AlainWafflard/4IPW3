<?php

function ctrl_head()
{
    // get  info on user
    $user_id = $_SESSION['id'] ?? '';
    $user_role = $_SESSION['role'] ?? '';

    // get menu array from csv
    $menu_a = get_menu_csv();

    return html_head( $menu_a, $user_id, $user_role );
}