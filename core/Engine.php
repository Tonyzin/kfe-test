<?php

namespace Core;

use eftec\bladeone\BladeOne;

class Engine
{

    private $blade;

    public function __construct()
    {
        $blade = $this->blade = (new BladeOne(
            __DIR__ . "/../app/Views/",
            __DIR__ . "/../runtime/Compiled/"
        ));

        $blade->pipeEnable = true;
        $blade->setBaseUrl(APP['url']);
        $blade->setOptimize(true);
        $blade->setFileExtension('.blade.php');
        
        return $this;
    }

    public function render(string $view, array $value = [])
    {

        $file = __DIR__ . "/../app/Views/Pages/" . str_replace(".", "/", $view) . ".blade.php";

        if(file_exists($file))
        {
            return $this->blade->setView('Pages.' . $view)->share($value)->run();
        }

    }

}