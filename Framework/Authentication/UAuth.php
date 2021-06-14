<?php

    namespace Framework\Authentication;

    use Framework\Session as Session;

    /** Authentication class for users
     *
     */
class UAuth
{
  /** Constructor for UAuth
  * @param string $credName with key of credentials in session array
  */
    public function __construct($credName = 'credentials')
    {
        $this->credName = $credName;
        $this->session = new Session\Session();
    }

    /** Check if user is already authorized
    * @return bool
    */
    public function isAuth(): bool
    {
        if (isset($_SESSION[$this->credName]) && !empty($_SESSION[$this->credName])) {
            return true;
        }
        return false;
    }

    /** Set auth data
    * @param string $login with user login
    * @param string $pass with user password
    * @return bool
    */
    public function auth($login, $pass): bool
    {
        if (!$this->isAuth()) {
            $this->session->start();
            $_SESSION[$this->credName] = [$login, $pass];
            return true;
        }
        return false;
    }


    /**
    * Get user data
    * @return string|bool
    */
    public function getLogin()
    {
        if ($this->isAuth()) {
            return (string) $_SESSION[$this->credName][0];
        }
        return false;
    }


    /** Delete user data from session
    * @return void
    */
    public function logOut(): void
    {
        if ($this->isAuth()) {
            unset($_SESSION[$this->credName]);
        }
    }

    // end of class
}
