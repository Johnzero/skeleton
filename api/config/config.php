<?php

declare(strict_types = 1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\Contract\StdoutLoggerInterface;
use Psr\Log\LogLevel;

return [
    'app_name'                   => env('APP_NAME', 'skeleton'),
    'app_env'                    => env('APP_ENV', 'dev'),
    'scan_cacheable'             => env('SCAN_CACHEABLE', true),
    'request_log'                => env('APP_REQUEST_LOG', true),
    'response_log'               => env('APP_RESPONSE_LOG', true),
    // 是否记录日志
    'app_log'                    => env('APP_LOG', true),
    // 是否记录框架的日志
    'hf_log'                     => env('HF_LOG', true),
    'cors_access'                => env('CORS_ACCESS', true),
    //用户id的前缀，作用在用户id的生成规则,最多使用3位
    'app_uid_prefix'             => env('APP_UID_PREFIX', 'ym'),
    'super_admin'                => env('SUPER_ADMIN', 'null'),
    'url'                        => 'http://127.0.0.1:9501',
    // 允许跨域的域名
    'allow_origins'              => [
        'http://127.0.0.1',
        'http://localhost',
    ],
    //日志文件路径
    'log_path'                   => BASE_PATH . '/runtime/logs/',
    StdoutLoggerInterface::class => [
        'log_level' => [
            LogLevel::ALERT,
            LogLevel::CRITICAL,
            LogLevel::DEBUG,
            LogLevel::EMERGENCY,
            LogLevel::ERROR,
            LogLevel::INFO,
            LogLevel::NOTICE,
            LogLevel::WARNING,
        ],
    ],
];
