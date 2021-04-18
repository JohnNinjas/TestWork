<?php

require_once('db/database.php');

$connection = new AuthorizationData();
$connection->initData();

/**
 * Class AuthorizationData
 */
Class AuthorizationData
{
    /**
     * Формирует данные для проверки авторизации
     *
     */
    public function initData(): void
    {
        $success = false;
        $message = 'Не указан логин или пароль';

        $data = $this->getAuthorizationData($success, $message);

        echo json_encode([
                'success' => $data['success'],
                'message' => $data['message'],
            ]);
    }

    /**
     * Получает авторизационые данные
     *
     * @param bool   $success
     * @param string $message
     *
     * @return array
     */
    private function getAuthorizationData(bool $success, string $message): array
    {
        session_start();

        if (isset($_POST['login']) && isset($_POST['password'])) {
            $users = "SELECT * FROM users WHERE login = '{$_POST['login']}'";

            $connection = new Connection();

            $login_link = mysqli_query($connection->getConnection(), $users);
            $user = mysqli_fetch_array($login_link );
            $password = htmlspecialchars($_POST['password']);

            if (password_verify($password, $user['password_hash'])) {
                $success= true;
                $data['login'] = $user;
                $_SESSION['login'] = $user['login'];
                $message = 'Добро пожаловать ' . $user['login'];
            } else {
                $message = 'Не верно указан логин или пароль';
            }
        }

        return [
          'message' => $message,
            'success' => $success,
        ];
    }
}
?>