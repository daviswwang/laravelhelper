<?php

namespace Daviswwang\LaravelHelper;

use Illuminate\Contracts\Config\Repository;
use Psr\Container\ContainerInterface;


abstract class AbstractHelper implements LaravelHelperInterface
{
    private $symmetryAlgs = [
        'HS256',
        'HS384',
        'HS512'
    ];

    // 非对称算法名称
    private $asymmetricAlgs = [
        'RS256',
        'RS384',
        'RS512',
        'ES256',
        'ES384',
        'ES512',
    ];

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @var string
     */
    private $configPrefix = 'default';

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->config = $this->container->get(Repository::class);

        // 合并场景配置，并且兼容2.0.6以下的配置
        $config = $this->config->get($this->configPrefix);
        if (empty($config['blacklist_prefix'])) $config['blacklist_prefix'] = 'daviswwang_default';
        $scenes = $config['scene'];
        unset($config['scene']);
        foreach ($scenes as $key => $scene) {
            $sceneConfig = array_merge($config, $scene);
            $this->setSceneConfig($key, $sceneConfig);
        }
    }

    /**
     * @param ContainerInterface $container
     * @return $this
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
        return $this;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * 设置场景值
     * @param string $scene
     */
    public function setScene(string $scene)
    {
        $this->scene = $scene;
        return $this;
    }

    /**
     * 获取当前场景值
     * @return string
     */
    public function getScene()
    {
        return $this->scene;
    }

    /**
     * @param string $scene
     * @param null   $value
     * @return $this
     */
    public function setSceneConfig(string $scene = 'default', $value = null)
    {
        $this->config->set("{$this->configPrefix}.{$this->scenePrefix}.{$scene}", $value);
        return $this;
    }

    /**
     * @param string $scene
     * @return mixed
     */
    public function getSceneConfig(string $scene = 'default')
    {
        return $this->config->get("{$this->configPrefix}.{$this->scenePrefix}.{$scene}");
    }

}
