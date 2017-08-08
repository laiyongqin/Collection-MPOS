<?php

class ErrorController extends BaseController {

	public function errorAction($exception) {
        if(APP_ENV != 'product') {
            switch ($exception->getCode()) {
                case YAF_ERR_AUTOLOAD_FAILED:
                case YAF_ERR_NOTFOUND_MODULE:
                case YAF_ERR_NOTFOUND_CONTROLLER:
                case YAF_ERR_NOTFOUND_ACTION:
                case YAF_ERR_NOTFOUND_VIEW:
                    echo '<pre>';
                    print_r($exception);
                    echo '</pre>';
                    exit;
                    break;
                default:
                    echo '<pre>';
                    print_r($exception);
                    echo '</pre>';
                    exit;
                    break;
            }
        }
	}
}
