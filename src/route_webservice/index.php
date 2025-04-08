<?php
$routes = [
    'GET' = [
        '/persone/' => 'elenco-persone.php',
        '/persone/{id}' => 'dettaglio-persona.php',
        '/persone/{nome_cognome}' => 'elenco-persone.php' //farò con una query string
    ],
    'POST' = [
        '/persone/crea' => 'crea-persona.php',
        '/persone/modifica/{id}' => 'modifica-persona.php',
        '/persone/elimina/{id}' => 'elimina-persona.php'
    ]    
];

$method = $_SERVER['REQUEST_METHOD'];
$uri = urldecode($_SERVER['REQUEST_URI']);
$uri_segments = /* trasforma una stringa in un array e prende i slash come separatori */explode('/', trim($uri, '/')/* toglie gli slash dalle estremità */);

if(isset($routes[$method]))
{
    foreach($routes[$method] as $route => $handler)
    {
        $route_segment = explode('/', trim($route, '/'));
        $params = [];

        if(count($uri_segments) === count($route_segment))
        {
            $match = true;
            for($i = 0; $i < count($uri_segments); $i++)
            {
                if($route_segment[$i][0] === '{' && $route_segment[$i][-1] === '}')
                    $params[] = $uri_segments[$i];
                else if($uri_segments[$i] !== $route_segment[$i])
                {
                    $match = false;
                    break;
                }
            }

            //to be continued...
        }
    }
}