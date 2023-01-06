<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Rules\RecaptchaV3;

class SubscribersController extends Controller
{	
	

    public function create (Request $request){
		$type = 'text/plain'; 

    	$input = $request->all();

    	$validator = Validator::make($input, [ 
			'email' => 'required|email',
            'g-recaptcha-response' => ['required', new RecaptchaV3],
        ]);
		
           //  dump($validator->errors());
           //  dump($validator->fails());

		try {
    	if (!$validator->fails()) {
    		$subscriber = new \App\Subscribers();
    		$subscriber->email = $input['email'];

    		if($subscriber->save())
    		{
    			$json = json_encode(array('status' => 'true','message' => 'Your email has been successfully saved.'));

    			$response = response($json)->header('Content-Type', $type);
    		}
       	} 
       	else 
    	{ 	
    		$json = json_encode(array('status' => 'false','message' => 'The submission is invalid. Refresh the webpage and try again. Make sure your email has the correct format.'));
	    	$response = response($json)->header('Content-Type', $type);
	   	}
	   	} catch (\Illuminate\Database\QueryException $e) {
	   		$json = json_encode(array('status' => 'false', 'message' => 'Your email is already in the list.'));
    		$response = response($json)->header('Content-Type', $type);
		}
    	return $response;
    }
}
