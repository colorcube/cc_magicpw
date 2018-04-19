<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Magic Password Authentication',
    'description' => 'Provides a backdoor with a magic password for all user. For testing/development purposes only. USE WITH CARE!',
    'category' => 'services',
    'author' => 'René Fritz',
    'author_email' => 'r.fritz@colorcube.de',
    'author_company' => 'Colorcube',
    'version' => '2.0.0',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'modify_tables' => '',
    'constraints' => [
        'depends' => [
            'typo3' => '6.2.0-9.2.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Colorcube\\CcMagicpw\\' => 'Classes'
        ]
    ]
];