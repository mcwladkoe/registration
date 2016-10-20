<?php

class MyDB 
{
    private $dblogin = "root"; // логин бд
    private $dbpass = "123"; // пароль бд
    private $db = "Main"; // название бд
    private $dbhost = "localhost";//расположение бд
    
    private $link = '';
    private $query = '';
    private $err = '';
    
    public $result = '';
    public $data = '';
    public $num = 0;
    
    //подключение к базе
    function connect() {
        $this -> link = mysqli_connect($this -> dbhost, $this -> dblogin, $this -> dbpass, $this -> db);
        mysqli_query($this -> link, 'SET NAMES utf8');
    }
    
    //закрытие подключения к БД
    function close() {
        mysqli_close($this -> link);
        unset($this -> link);
    }
    
    //выполнить запрос
    function run($query = '') {
        $this -> query = $query;
        $this -> result = mysqli_query($this -> link, $this -> query);
        $this -> num = mysqli_num_rows($this -> result);
        $this -> err = mysqli_error($this -> link);
    }
    
    //считать строчку
    function row() {
        $tmp_q23 = mysqli_fetch_assoc($this -> result) ; 
        if(!$tmp_q23){ 
            exit("Error - ".mysqli_error($this -> link).",".$tmp_q23);
        }
        $this -> data = $tmp_q23;
    }
    
    //функция для очистки введенных данных
    function clean( $value = "") {
        return mysqli_real_escape_string( $this -> link, strip_tags( stripslashes( trim( htmlspecialchars( $value )))));//добавлена зашита от sql-иньекций(экранирование)
    }
    
    //остановить
    function stop() {
        unset($this -> data);
        unset($this -> result);
        unset($this -> num);
        unset($this -> err);
        unset($this -> query);
    }
}