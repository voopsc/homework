<?php

declare(strict_types=1);

namespace Framework\Session;

/**
 *
 */
class Session
{
    /**
     * Set user name in session
     *
     * @param string $name user name
     *
     * @return void
     */
    public function setName($name): void
    {
        $_SESSION['user_name'] = $name;
    }

    /**
     * Set user id into session and start session
     *
     * @param $id with user id
     *
     * @return void
     */
    public function setId($id): void
    {
        if (!empty($id)) {
            session_id($id);
            session_start();
        }
    }

    /**
     * Set path for session files
     *
     * @param string $savePath
     *
     * @return void
     */
    public function setSavePath($savePath): void
    {
        $existPath = session_save_path();

        if ($existPath !== $savePath) {
            if (is_dir($savePath)) {
                session_save_path($savePath);
            } else {
                mkdir($savePath);
                session_save_path($savePath);
            }
        }
    }

    /**
     * Set data into session
     *
     * @param string|int
     *
     * @return void
     */
    public function set($key, $value): void
    {
        if ($this->sessionExists()) {
            $_SESSION[$key] = $value;
        }
    }

    /**
     * Get user name from session
     *
     * @return string with user name
     */
    public function getName(): string
    {
        if (isset($_SESSION['user_name'])) {
            return (string)$_SESSION['user_name'];
        }
    }

    /**
     * Get id of session
     *
     * @return string
     */
    public function getId(): string
    {
        $stringId = (string)session_id();
        return $stringId;
    }

    /**
     * Get value by key from session
     *
     * @param string|int $key
     *
     * @return mixed
     */
    public function get($key)
    {
        if (self::contains($key)) {
            return $_SESSION[$key];
        }
    }

    /**
     * Check is session element exist
     *
     * @param mixed $key array key
     *
     * @return bool
     */
    public function contains($key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

    /**
     * Delete session item by key
     *
     * @param mixed $key
     *
     * @return void
     */
    public function delete($key): void
    {
        if (self::contains($key)) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Chech if cookie exist
     *
     * @return bool
     */
    public function cookieExists(): bool
    {
        $status = false;

        if (!empty($_COOKIE)) {
            $status = true;
        }

        return $status;
    }

    /**
     * Chech if session exist
     *
     * @return bool
     */
    public function sessionExists(): bool
    {
        $status = false;

        if (isset($_SESSION) && !empty($_SESSION)) {
            $status = true;
        }

        return $status;
    }

    /**
     * Check params and start/not start session
     *
     * @return bool
     */
    public function start(): bool
    {
        if (!$this->sessionExists()) {
            session_start();
            return true;
        }

        return false;
    }

    /**
     * Finish session if it exist
     *
     * @return void
     */
    public function destroy(): void
    {
        if ($this->sessionExists()) {
            session_destroy();
        }
    }

}
