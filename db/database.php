<?php

/**
 * Class Connection
 */
Class Connection
{
    public function getConnection()
    {
        $link = mysqli_connect("127.0.0.1", "root", "root", "test");
        if (!$link) {
            die(mysqli_connect_error($link));
        }

        return $link;
    }
}

