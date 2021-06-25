<?php

declare(strict_types = 1);

namespace App\Middleware;

use Hyperf\Utils\Context;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Container\ContainerInterface;
use Hyperf\Contract\ConfigInterface;

/**
 * HTTP请求控制（跨域中间件）
 * Class CorsMiddleware
 *
 * @package App\Middleware
 * @Author  YiYuan-Lin
 * @Date    : 2020/9/21
 */
class CorsMiddleware implements MiddlewareInterface
{
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->config = $container->get(ConfigInterface::class);
        $corsAccess = $this->config->get('cors_access');
    }
    
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // 判断是否允许跨域请求，且处理跨域
        $corsAccess = $this->config->get('cors_access');
        if ($corsAccess === true) {
            $origins = $this->config->get('allow_origins');
            $origin = $request->getHeader('origin');
            $origin = $origin ? $origin[0] : false;
            if ($origin != false) {
                // offset从5开始，避免http:引发问题
                $isPort = (int)strripos($origin, ':', 5);
                if ($isPort) {
                    $ifOrigin = in_array(substr($origin, 0, $isPort), $origins);
                } else {
                    $ifOrigin = in_array($origin, $origins);
                }
                if ($ifOrigin) {
                    $response = Context::get(ResponseInterface::class);
                    $response = $response->withHeader('Access-Control-Allow-Origin', "{$origin}");
                    $response = $response->withHeader('Access-Control-Allow-Credentials', 'true');
                    $response = $response->withHeader('Access-Control-Allow-Methods',
                        'POST, GET, OPTIONS, PUT, PATCH, DELETE')
                        ->withHeader('Access-Control-Allow-Headers',
                            'Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Authorization , Access-Control-Request-Headers, X-CSRF-TOKEN,DNT,Keep-Alive,User-Agent,Cache-Control,hyperf-session-id');
                    Context::set(ResponseInterface::class, $response);
                    // 非简单跨域请求的"预检"请求处理
                    if ($request->getMethod() == 'OPTIONS') {
                        return $response;
                    }
                }
            }
        }
        $response = $handler->handle($request);
        
        return $response;
    }
    
    // public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    // {
    //     $response = Context::get(ResponseInterface::class);
    //     $response = $response->withHeader('Access-Control-Allow-Origin', '*')
    //         ->withHeader('Access-Control-Allow-Credentials', 'true')
    //         ->withHeader('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, PATCH, DELETE')
    //         // Headers 可以根据实际情况进行改写。
    //         ->withHeader('Access-Control-Allow-Headers', 'Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Authorization , Access-Control-Request-Headers, X-CSRF-TOKEN');
    
    //     Context::set(ResponseInterface::class, $response);
    
    //     if ($request->getMethod() == 'OPTIONS') {
    //         return $response;
    //     }
    
    //     return $handler->handle($request);
    // }
}
