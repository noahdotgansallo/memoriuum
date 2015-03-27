<?php 

namespace Memoriuum\Classes;

class ApiResponse {

	public function __construct()
	{
		$response = array(
			'succes' => null,
			'error' => null,
			'data' => null
			);
		return $response;
	}

    public static function response($success = false, $error = 'An unkown error occured', $data = null)
    {
        $response['succes'] = $success;
        $response['error'] = $error;
        $response['cache'] = \Sentry::getUser();
        $response['data'] = $data;

        return $response;
    }

    public static function build()
    {
        $data = array();

    	$args = func_num_args();

        $argDecider = 0;

        $argDecider_ = 1;

        for ($i=0; $i < $args/2; $i++) { 
            
            $index = func_get_arg($argDecider);
            $object = func_get_arg($argDecider_);

            if(!is_object($object))
            {
                $data[$index] = $object;
            } else{
                $data[$index] = json_decode(json_encode($object), true);
            }

            $argDecider_ = $argDecider_ + 2;
            $argDecider = $argDecider + 2;
            
        }

        return $data;
    }

}