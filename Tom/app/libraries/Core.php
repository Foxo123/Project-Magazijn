<?php

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        // var_dump($url);exit();
        //look in 'controllers' for first value, ucwords will capitalize first letter
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            //Will set a new controller
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        //Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //Get the parameters
        $this->params = $url ? array_values($url) : [];

        //Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            //filters the url for characters that shoudln't be there
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //breaking url into an array 
            $url = explode('/', $url);
            return $url;
        } else {
            $url = array('artikel', 'index');
            return $url;
        }
    }
}
