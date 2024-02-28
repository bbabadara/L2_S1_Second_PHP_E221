<?php
function loadview(string $views, array $data = [], $layout = "base")
{
    ob_start();
    extract($data);
    require_once(ROOT . "/views/" . $views);
    // dd(ob_get_clean());
    $cFV = ob_get_clean();
    // dd($cFV);
    require_once("../views/layout/" . $layout . ".layout.php");
}

function redirectToRoute(string $controller, string $page)
{
    header("location:" . WEBROOT . "/?controller=$controller&page=$page");
}

function estPositive($val)
{
    return $val > 0 ? true : false;
}

function dd($test)
{
    echo "<pre>";
    var_dump($test);
    echo "</pre>";
    die("Yallah pitié");
}

function path(string $controller, string $page, array $additional = []): string
{
    $link = WEBROOT . "/?controller=$controller&page=$page";
    if (!empty($additional)) {
      foreach ($additional as $key => $value) {
        $link=$link."&"."$key=$value";
      }
    }
    return $link;
}
