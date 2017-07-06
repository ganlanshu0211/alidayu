<?php
/**
 * Class AlidayuController
 * @package Notadd\Alidayu
 */

namespace Notadd\Alidayu\Controllers;

use Notadd\Alidayu\Handlers\TestHandler;
use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Alidayu\Alidayu;
use Notadd\Alidayu\Handlers\GetHandler;
use Notadd\Alidayu\Handlers\SendHandler;
use Notadd\Alidayu\Handlers\SetHandler;
use Notadd\Alidayu\Handlers\CheckHandler;


class AlidayuController extends Controller
{

    /**
     * get Alidayu
     *
     * @param \Notadd\Alidayu\Alidayu $Alidayu
     * @param string $config
     * @return \Intervention\Image\ImageManager->response
     */
    public function getAlidayu(Alidayu $Alidayu, $config = 'default')
    {
        // dd($config);
        return $Alidayu->create($config);
    }

    /**
     * Set handler.
     *
     * @param \Notadd\Alidayu\Handlers\SetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function set(SetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Get handler.
     *
     * @param \Notadd\Alidayu\Handlers\GetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function get(GetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Send handler.
     *
     * @param \Notadd\Alidayu\Handlers\SendHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */

    public function send(SendHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }


    /**
     * Check handler.
     *
     * @param \Notadd\Alidayu\Handlers\CheckHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */

    public function check(CheckHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * just send a message to the mobile
     * Test handler.
     *
     * @param \Notadd\Alidayu\Handlers\SendHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */

    public function test(TestHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

}
