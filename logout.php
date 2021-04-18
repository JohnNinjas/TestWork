<?php

$logout = new Logout();
$logout->deleteSession();

/**
 * Class Logout
 */
class Logout
{
    /**
     * Удаляет данные авторизации из сессии
     *
     */
    public function deleteSession(): void
    {
        session_start();
        $login = $_SESSION['login'];
        unset($_SESSION['login']);
        session_destroy();
        $data = [
            'success' => true,
            'message' => 'До свидания ' . $login . '!'
        ];

        echo json_encode($data);
    }
}



