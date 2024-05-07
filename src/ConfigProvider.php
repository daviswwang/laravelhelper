<?php


namespace Daviswwang\JWT;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
            ],
            'commands' => [
            ],
            'listeners' => [],
            // 合并到  config/autoload/annotations.php 文件
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
//            'publish' => [
//                [
//                    'id' => 'jwt',
//                    'description' => 'jwt',
//                    'source' => __DIR__ . '/../publish/jwt.php',
//                    'destination' => BASE_PATH . '/config/autoload/jwt.php',
//                ],
//            ],
        ];
    }
}
