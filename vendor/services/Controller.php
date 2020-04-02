<?php 

namespace App\Services;
use App\Services\View;

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
 * @package Controller
 * @author Fauzanw
 * @license	https://opensource.org/licenses/MIT	MIT License
 **/ 
class Controller {
    public function view($view, $data = []) {
        global $config;
        $views = str_replace(".", "/", $view);
        $view = new View(__DIR__ . '/../../App/Views');
        $view->friends = array(
            'Rachel', 'Monica', 'Phoebe', 'Chandler', 'Joey', 'Ross'
        );
        $view->render($views.".php", $data);
        // if(file_exists(__DIR__ . '/../../App/Views/' . $views . '.php')) {
        //     extract($data);
        //     require_once __DIR__ . '/../../App/Views/' . $views . '.php';
        // }else{
        //     if($config['dev_env'] == "production") {
        //         return ErrorHandler::show_error("View: [$view] not found!");
        //     }else{
        //         throw new Error("View: [$view] not found!");
        //     }
        // }
    }
}