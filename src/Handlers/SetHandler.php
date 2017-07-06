<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-02-23 19:45
 */
namespace Notadd\Alidayu\Handlers;

use Illuminate\Container\Container;
use Notadd\Foundation\Passport\Abstracts\SetHandler as AbstractSetHandler;
use Notadd\Foundation\Setting\Contracts\SettingsRepository;

/**
 * Class ConfigurationHandler.
 */
class SetHandler extends AbstractSetHandler
{
    /**
     * @var \Notadd\Foundation\Setting\Contracts\SettingsRepository
     */
    protected $settings;

    /**
     * SetHandler constructor.
     *
     * @param \Illuminate\Container\Container                         $container
     * @param \Notadd\Foundation\Setting\Contracts\SettingsRepository $settings
     */
    public function __construct(
        Container $container,
        SettingsRepository $settings
    ) {
        parent::__construct($container);
        $this->messages->push($this->translator->trans('Alidayu::setting.success'));
        $this->settings = $settings;
    }

    /**
     * Data for handler.
     *
     * @return array
     */
    public function data()
    {
        return $this->settings->all()->toArray();
    }

    /**
     * Execute Handler.
     *
     * @return bool
     */
    public function execute()
    {
        $this->validate($this->request, [
            'app_key' => 'required',
            'app_secret' => 'required'
        ], [
            'app_key.required' => 'app_key为必填字段',
            'app_secret.required' => 'app_secret为必填字段'
        ]);

        $this->settings->set('alidayu.app_key', $this->request->input('app_key'));
        $this->settings->set('alidayu.app_secret', $this->request->input('app_secret'));

        return true;
    }
}
