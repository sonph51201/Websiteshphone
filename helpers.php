<?php

use eftec\bladeone\BladeOne;

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        $views = __DIR__ . '/views';
        $cache = __DIR__ . '/storage/compiles';
        
        $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
        echo $blade->run($view, $data);
    }}

    if (!function_exists('is_upload')){
        function is_upload($key){
            return isset($_FILES[$key]) && $_FILES[$key]['size'] > 0;
        }
    } 
    if (!function_exists('redirect')){
        function redirect($path){
            header('Location: '.$path);
        exit;
        }
    }
    if(!function_exists('redirect404')){
        function redirect404(){
            header('HTTP/1.0 404 Not Found');
        
            exit;
        }
    }
    if(!function_exists('middleware_auth')){
        function middleware_auth(){
           $currentUrl=$_SERVER['REQUEST_URI'];
           $authRegex='/^\/(auth|login|register)$/';
           $adminUrlRegex='/^\/admin/';
           if(empty($_SESSION['user'])){
          if(!preg_match($authRegex,$currentUrl)&& preg_match($adminUrlRegex,$currentUrl))
            {redirect('/auth');}
           }
           else{
               if(preg_match($authRegex,$currentUrl)){
                $redirectTo=($_SESSION['user']['type']=='admin')?'/admin':'/';
                   redirect($redirectTo);
               }
               if(preg_match($adminUrlRegex,$currentUrl)&& $_SESSION['user']['type']!='admin'){
                   redirect('/');
               }
            }
        }
    }
    if (!function_exists('file_url')) {
        function file_url($path) {
            if (empty($path)) {
                return null;
            }
    
            if (file_exists(__DIR__ . '/' . $path)) {
                return getenv('APP_URL') . '/' . ltrim($path, '/');
            }
    
            return null;
        }
    }
    
    if(!function_exists('debug')){
        function debug(...$data){
            echo '<pre>';
            print_r($data);
            die;
        }
    }
   
    if (!function_exists('slug')) {
        function slug($string, $separator = '-')
        {
            $string = mb_strtolower($string, 'UTF-8');
            $string = preg_replace('/[^p{L}\p{N}\s]/u', ' ', $string);
            $string = preg_replace('/[\s+]/', ' ', $string);
            $string = trim($string, $separator) . '-' . random_string(6);
            return $string;
        }
    }
    if(!function_exists('random_string')){
        function random_string($length = 10){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for($i = 0; $i < $length; $i++){
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    }

