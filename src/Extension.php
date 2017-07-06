<?php
/**
 * This file is part of Notadd.
 *
 * @author Cst <260096556@qq.com>
 * @copyright (c) 2017, Cst
 * @datetime 2017-04-22 15:20
 */
namespace Notadd\Alidayu;

use Illuminate\Events\Dispatcher;
use Notadd\Alidayu\Listeners\CsrfTokenRegister;
use Notadd\Alidayu\Listeners\RouteRegister;
use Notadd\Foundation\Extension\Abstracts\Extension as AbstractExtension;
use Notadd\Foundation\Setting\Contracts\SettingsRepository;

/**
 * Class Extension.
 */
class Extension extends AbstractExtension
{
    /**
     * Boot provider.
     */
    public function boot()
    {
        $this->app->make(Dispatcher::class)->subscribe(CsrfTokenRegister::class);
        $this->app->make(Dispatcher::class)->subscribe(RouteRegister::class);
        // 翻译文件
        $this->loadTranslationsFrom(realpath(__DIR__ . '/../resources/translations'), 'setting');

        $setting = $this->app->make(SettingsRepository::class);

        // 默认设置
        config(['alidayu' => $setting->get('alidayu')]);
        $this->loadMigrationsFrom(realpath(__DIR__ . '/../databases/migrations'));

    }

    // 注入 alidayu IoC 实例
    public function register()
    {
        $this->app->singleton('alidayu', function($app)
        {
            return new Alidayu(
                $app['Notadd\Foundation\Setting\Contracts\SettingsRepository'],
                $app['Illuminate\Session\Store'],
                $app['Illuminate\Hashing\BcryptHasher']
            );
        });
    }

    /**
     * Description of extension
     *
     * @return string
     */
    public static function description()
    {
        return '阿里大鱼插件的配置和管理。';
    }

    /**
     * Installer for extension.
     *
     * @return \Closure
     */
    public static function install()
    {
        return function () {
            return true;
        };
    }

    /**
     * Name of extension.
     *
     * @return string
     */
    public static function name()
    {
        return '阿里大鱼';
    }

    /**
     * Get script of extension.
     *
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function script()
    {
        return asset('');
    }

    /**
     * Get stylesheet of extension.
     *
     * @return array
     */
    public static function stylesheet()
    {
        return [];
    }

    /**
     * Uninstall for extension.
     *
     * @return \Closure
     */
    public static function uninstall()
    {
        return function () {
            return true;
        };
    }

    /**
     * Version of extension.
     *
     * @return string
     */
    public static function version()
    {
        return '0.1.0';
    }
}
