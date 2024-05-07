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
//                    'id' => 'helper',
//                    'description' => 'helper',
//                    'source' => __DIR__ . '/../publish/helper.php',
//                    'destination' => BASE_PATH . '/config/autoload/helper.php',
//                ],
//            ],
        ];
    }
}
