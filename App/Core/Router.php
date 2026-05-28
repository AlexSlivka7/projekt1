<?php 

namespace App\Core;

class Router{
    private array $routes = [];

    public function add(string $path, object $controller, string $method): void
    {
        $this->routes[$path] = [
            "controller" =>$controller,
            "method"=> $method
        ];
    }

    public function resolve() :void
    {
        $RequestUri = ($_SERVER["REQUEST_URI"]);

        $path = parse_url($RequestUri,PHP_URL_PATH);

        $basePath = "/projekt1/public";
        $path = str_replace($basePath,"",$path);

        if(isset($this->routes[$path])){
            $route = $this->routes[$path];
            $controller = $route["controller"];
            $method = $route["method"];

            $controller->$method(); //vytiahne z indexu add "index" a prida za neho zatvorky
        }else{
            http_response_code(404);
            echo "404 - Stránka, ktorú hľadáte neexistuje!!!";
        }
    }
}

?>