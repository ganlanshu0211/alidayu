<?php
/**
 * Class AlidayuController
 * @package Notadd\Alidayu
 */
namespace Notadd\Alidayu\Controllers;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Alidayu\Alidayu;
use Notadd\Alidayu\Handlers\GetHandler;
use Notadd\Alidayu\Handlers\SetHandler;
use Notadd\Alidayu\Handlers\ValidationHandler;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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
     * Alidayu validation
     *
     * @param string $Alidayu
     * @param string $config
     * @return boolean
     */
    public function Alidayu(ValidationHandler $handler)
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

}
