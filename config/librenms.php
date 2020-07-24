<?php

 /*
 | !!!! DO NOT EDIT THIS FILE !!!!
 |
 | You can change settings by setting them in the environment or .env
 | If there is something you need to change, but is not available as an environment setting,
 | request an environment variable to be created upstream or send a pull request.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    |
    | This value is the user LibreNMS runs as. It is used to secure permissions
    | and grant access to things needed. Defaults to librenms.
    */

    'user' => env('LIBRENMS_USER', 'librenms'),

    /*
    |--------------------------------------------------------------------------
    | Group
    |--------------------------------------------------------------------------
    |
    | This value is the group LibreNMS runs as. It is used to secure permissions
    | and grant access to things needed. Defaults to the same as LIBRENMS_USER.
    */

    'group' => env('LIBRENMS_GROUP', env('LIBRENMS_USER', 'librenms')),

    /*
    |--------------------------------------------------------------------------
    | Install
    |--------------------------------------------------------------------------
    |
    | This value sets if the install process needs to be run.
    | You may also specify which install steps to present with a comma separated list.
    */

    'install' => env('INSTALL', false),

];
