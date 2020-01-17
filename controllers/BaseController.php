<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

abstract class BaseController extends Controller {

    const STATUS_OK = 'ok';
    const STATUS_ERROR = 'error';

    /**
     * @param callable $callable
     * @return array
     */
    public function commonTryCatchResponse(callable $callable) {
        try {
            $callable();
        } catch (\Exception $e) {
            return $this->jsonFailResponse($e->getMessage());
        }

        return $this->jsonSuccessResponse();
    }

    /**
     * @param array $data
     * @return array
     */
    public function jsonSuccessResponse(array $data = [])
    {
        return $this->_jsonResponse(self::STATUS_OK, '', $data);
    }

    /**
     * @param string $error
     * @return array
     */
    public function jsonFailResponse($error)
    {
        return $this->_jsonResponse(self::STATUS_ERROR, $error);
    }

    /**
     * @throws NotFoundHttpException
     */
    protected function _throwNotFoundException()
    {
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * @param string $status
     * @param string $error
     * @param array $data
     * @return array
     */
    private function _jsonResponse($status, $error, array $data = [])
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'status' => $status,
            'error'  => $error,
            'data'   => $data,
        ];
    }
}