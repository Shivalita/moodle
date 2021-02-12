<?php

$capabilities = [
    'local/helloworld:readmessages' => [
        'riskbitmask' => RISK_SPAM,
        'captype' => 'read',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => [
            'user' => CAP_ALLOW,
            'manager' => CAP_ALLOW,
        ],
    ],
    'local/helloworld:writemessages' => [
        'riskbitmask' => RISK_SPAM,
        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => [
            'user' => CAP_ALLOW,
            'manager' => CAP_ALLOW,
        ],
    ],
    'local/helloworld:managemessages' => [
        'riskbitmask' => RISK_MANAGETRUST,
        'captype' => 'delete',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => [
            'manager' => CAP_ALLOW,
        ],
    ],
 ];