<?php

$routes = [
    [
        'path' => '/',
        'link' => 'accueil.php'
    ],
    [
        'path' => '/actualites',
        'link' => 'actualites.php'
    ],
    [
        'path' => '/actus_admin',
        'link' => 'admin_actus.php'
    ],
    [
        'path' => '/benevoles_admin',
        'link' => 'admin_benevoles.php'
    ],
    [
        'path' => '/missions_admin',
        'link' => 'admin_missions.php'
    ],
    [
        'path' => '/newsletter_admin',
        'link' => 'admin_newsletter.php'
    ],
    [
        'path' => '/admin',
        'link' => 'admin.php'
    ],
    [
        'path' => '/civique',
        'link' => 'Civique.php'
    ],
    [
        'path' => '/droit',
        'link' => 'Droit.php'
    ],
    [
        'path' => '/fage',
        'link' => 'Fage.php'
    ]
];

$route = $_GET['/'] ?? '/';

foreach ($routes as $r) {
    if ($route === $r['path']) {
        require __DIR__ . '/pages/' . $r['link'];
        exit;
    }
}

// si aucune route trouvée
http_response_code(404);
echo '404';

?>