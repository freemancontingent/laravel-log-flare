<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Monolog Level check
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default Monolog levels that should be used
    | by the Laravel Log Flare.
    |
    | Supported: debug, info, notice, warning, error, critical, alert, emergency
    |
    */

    'level' => ['error','critical'],

    /*
    |--------------------------------------------------------------------------
    | Support email address
    |--------------------------------------------------------------------------
    |
    | Email address to receive the report.
    |
    |
    */

    'support_email' => '',

    /*
    |--------------------------------------------------------------------------
    | Support email name
    |--------------------------------------------------------------------------
    |
    | Email name
    |
    |
    */

    'support_email_name' => '',

    /*
    |--------------------------------------------------------------------------
    | Email subject
    |--------------------------------------------------------------------------
    |
    | Flare email subject
    |
    */

    'subject' => '',

    /*
    |--------------------------------------------------------------------------
    | Log viewer link
    |--------------------------------------------------------------------------
    |
    | Add inside the email template the link to view all log.
    |
    |
    */

    'log_viewer_link' => '',

    /*
    |--------------------------------------------------------------------------
    | Print info logs
    |--------------------------------------------------------------------------
    |
    | Print info logs when the function is called.
    |
    | Supported: true,false
    |
    */

    'log' => true,

    /*
    |--------------------------------------------------------------------------
    | Use custom email template
    |--------------------------------------------------------------------------
    |
    | Use custom email template inside freemancontingent/logsflare/
    |
    | Supported: true, false
    |
    */

    'custom_email_template' => false,
];
