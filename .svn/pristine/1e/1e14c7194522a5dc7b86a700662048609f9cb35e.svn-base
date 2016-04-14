<?php

if (!defined('IN_CORE_SYSTEM')){die('INVALID DIRECT ACCESS');}

/**
 * userStatus - 0: guest
 *              1: loggedIn
 * sessionType- 'web'
 *            - 'api'
 */
class HdbCore{
    const SALT = 'nRBxgfLrR8';
    
//    const ROLE_ADMIN = 9;
    const ROLE_REALTOR = 7;
    const ROLE_NORMAL_USER = 5;
    const ROLE_GUEST = 0;
    
    protected $userStatus;
    protected $loggedUser;
    protected $session;
    protected $route;
    
    public static $instance;
    
    public static function createOrRetrieve(){
        if(self::$instance == null)
            self::$instance = new HdbCore();
        return self::$instance;
    }
    
    public function __construct(){
        $this->userStatus = 0;
        $this->loggedUser = false;
        $this->route = false;
        $this->sessionType = false;
        $this->session = false;
        $this->api = false;
        $this->route = null;
    }
    
    public function setUser($user){
        if(!$user)
            return;
        $this->userStatus = 1;
        $this->loggedUser = $user;
    }
    
    public function getUser(){
        return $this->loggedUser;
    }
    
    public function isLogged(){
        return $this->userStatus == 1;
    }
    
    public function logout(){
        $this->userStatus = 0;
        $this->loggedUser = false;
    }
    
    public function setRoute($newRoute){
        $this->route = $newRoute;
    }
    
    public function getRoute(){
        return $this->route;
    }
    
    public function getSessionType(){
        return $this->sessionType;
    }
    
    public function getSession(){
        return $this->session;
    }
    
    public function setSession($type, $session){
        $this->sessionType = $type;
        $this->session = $session;
    }
    
    public function getApi(){
        return $this->api;
    }
    
    public function setApi($api){
        $this->api = $api;
    }
    
    public function toArray(){
        return [
            'loggedUser'    => ($this->loggedUser) ? $this->loggedUser->toReadableArray() : ['username'  => 'Guest','role'  => 0],
            'userStatus'    => $this->userStatus,
            'route'         => ($this->route) ? $this->route->toArray() : [],
            'session'       => $this->session ? $this->session : null,
            'sessionType'   => $this->sessionType ? $this->sessionType : null
        ];
    }
    
    public static function getUserRole($user){
        if(get_class($user) === "Realtor")
            return HdbCore::ROLE_REALTOR;
        elseif(get_class($user) === "NormalUser")
            return HdbCore::ROLE_NORMAL_USER;
        return HdbCore::ROLE_GUEST;
    }
    
    public static function getUserRoleByString($string){
        if($string == 'NormalUser')
            return HdbCore::ROLE_NORMAL_USER;
        elseif($string == 'Realtor')
            return HdbCore::ROLE_REALTOR;
        return HdbCore::ROLE_GUEST;
    }
}