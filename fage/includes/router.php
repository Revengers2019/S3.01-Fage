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
    ],
    [
        'path' => '/formationFage',
        'link' => 'formationFage.php'
    ],
    [
        'path' => '/guideElu',
        'link' => 'guideElu.php'
    ],
    [
        'path' => '/login',
        'link' => 'login.php'
    ],
    [
        'path' => '/logout',
        'link' => 'logout.php'
    ],
    [
        'path' => '/missions',
        'link' => 'missions.php'
    ],
    [
        'path' => '/newsletter',
        'link' => 'newsletter.php'
    ],
    [
        'path' => '/read',
        'link' => 'read.php'
    ],
    [
        'path' => '/scolarite',
        'link' => 'scolariteEtudiant.php'
    ]
];

$route = $_GET['/'] ?? '/';

foreach ($routes as $r) {

    if ($r['path'] === '/read' && str_starts_with($route, '/read')) {
        require __DIR__ . '/../pages/read.php';
        exit;
    }

    if ($r['path'] === '/actus_admin' && str_starts_with($route, '/actus_admin')) {
        require __DIR__ . '/../pages/admin_actus.php';
        exit;
    }

    if ($r['path'] === '/newsletter_admin' && str_starts_with($route, '/newsletter_admin')) {
        require __DIR__ . '/../pages/admin_newsletter.php';
        exit;
    }

    if ($r['path'] === '/missions_admin' && str_starts_with($route, '/missions_admin')) {
        require __DIR__ . '/../pages/admin_missions.php';
        exit;
    }

    // --- routes normales --- \\
    if ($route === $r['path']) {
        require __DIR__ . '/../pages/' . $r['link'];
        exit;
    }
}

// 404 si aucune route correspond \\
http_response_code(404);
echo '404';

?>