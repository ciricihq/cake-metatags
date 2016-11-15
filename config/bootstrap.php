<?php
use Cake\Core\Configure;
use Cake\Routing\DispatcherFactory;

Configure::write('Metatags', [
    'links' => [
        'logout' => null,
        'profile' => false,
        'forgot' => false
    ],
    'texts' => [
        'forgot' => 'I forgot my password'
    ]
]);

if (file_exists(CONFIG . 'metatags.php')) {
    Configure::load('metatags');
}
