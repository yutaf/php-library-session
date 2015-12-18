<?php

/**
 * Class Session
 *
 * @author Yuta Fujishiro <fujishiro@amaneku.co.jp>
 */
class Session
{
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * set
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * get
     *
     * @param $key
     * @param null $default
     * @return null
     */
    public function get($key, $default=null)
    {
        if(isset($_SESSION[$key])) return $_SESSION[$key];
        return $default;
    }

    /**
     * セッションを削除
     *
     * @param $key
     */
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * セッションを初期化
     */
    public function clear()
    {
        $_SESSION = array();
    }

    /**
     * ログイン認証オン
     */
    public function setAuthenticated()
    {
        $this->set('_authenticated', true);
        session_regenerate_id(true);
    }

    /**
     * ログイン状態を確認
     *
     * @return bool
     */
    public function isAuthenticated()
    {
        return $this->get('_authenticated', false);
    }
}