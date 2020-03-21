<?php 

/**
 * 
 * MifraID released under the MIT License
 * 
 * Copyright (c) 2020 Fauzan
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * @package Route
 * @author Fauzanw
 * @license	https://opensource.org/licenses/MIT	MIT License
 **/ 
class Route {
    protected $controller = '';
    protected $method     = 'index';
    protected $params     = [];
    public function __construct()
    {
        global $config;
        if(isset($_GET['url'])) {
            $url = explode("/", filter_var(rtrim($_GET['url'], "/"), FILTER_SANITIZE_URL));
            if($url[0] == "assets" && sizeof($url) > 2) {
                unset($url[0]);
                if(file_exists(__DIR__ . '/../../public/' . join("/", $url))) {
                    $extensi = explode(".", $_GET['url']);
                    $extensi = end($extensi);
                    header("Content-Type: text/{$extensi};charset=UTF-8");
                    return require_once __DIR__ . '/../../public/' . join("/", $url);
                }
            }
            $this->controller = strtoupper($url[0][0]).substr($url[0], 1)."Controller";
            $this->params = $url;
        }else{
            $config['default_controller'] = explode("/", str_replace(".", "/", $config['default_controller']));
            $this->controller = strtoupper($config['default_controller'][0][0]).substr($config['default_controller'][0], 1)."Controller";
            $this->method     = $config['default_controller'][1];
        }
        // check controller file
        if(file_exists(__DIR__ . '/../../App/Controllers/' . $this->controller . '.php')) {
            // if controller file is exist, instance controller
            require_once __DIR__ . '/../../App/Controllers/' . $this->controller.'.php';
            $this->controller = new $this->controller;
        }else{
            if($config['dev_env'] == "production") {
                return ErrorHandler::show_404();
            }else{
                throw new Error("Controller: [$this->controller] not found");
            }
        }

        
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }else{
                if($config['dev_env'] == "production") {
                    return ErrorHandler::show_error("Method: [$url[1]] not found!");
                }else{
                    throw new Error("Method: [$url[1]] not found");
                }
            }
        }
        $this->call_controller([$this->controller, $this->method], $this->params);
    }

    private function call_controller(/* Controller And Method */ Array $cam, Array $params) {
        return call_user_func_array($cam, $params);
    }
}