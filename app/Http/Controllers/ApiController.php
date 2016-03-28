<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;

use Blooddivision\Http\Requests;
use Response;

class ApiController extends Controller
{
    protected $statusCode = 200;

    public function getStatusCode(){
    	return $this->statusCode;
    }

    public function setStatusCode($statusCode){
    	$this->statusCode = $statusCode;
    }

    public function respondNotFound($message = 'Not Found!'){

    	return Response::json([
    		
    	]);

    }
}
