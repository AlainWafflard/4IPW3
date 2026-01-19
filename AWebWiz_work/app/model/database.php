<?php

function db_get_pdo()
{
    static $pdo;
    echo "PDO " . __LINE__;

    if( empty($pdo)  )
    {
        echo "PDO " . __LINE__;
        $pdo = new PDO( DATABASE_DSN, DATABASE_USERNAME, DATABASE_PASSWORD );
    }

    echo "PDO " . __LINE__;
    return $pdo;
}

