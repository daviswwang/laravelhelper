<?php

namespace Daviswwang\LaravelHelper;

/**
 * Interface LaravelHelperInterface
 * @package Daviswwang\LaravelHelper
 */
interface LaravelHelperInterface
{
    public function setSceneConfig(string $scene, $value = null);

    public function getSceneConfig(string $scene);

    public function setScene(string $scene);

    public function getScene();
}
