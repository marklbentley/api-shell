<?php
/*This is a very basic template for making an api. When a http request is sent to the file the script checks
 whether it is a get or post request then does the business. You will also need to set up a redirect like
www.yoursite.com/api goes to this file */


//include config and database files to communicate with DB


//this bit finds the request method
$request_method = strtolower($_SERVER['REQUEST_METHOD']);

//get variables from the request
$path = $_SERVER['REQUEST_URI'];
$folders = explode('/', $path);


//this bit performs functions depending on which request method it is
switch ($request_method)
		{
			// gets are easy...
			case 'get':
			    $greeting = $folders[2];
				$id       = $folders[3];
			    // gets are used to retrieve data from the database			
				$data = array('message' => $greeting.' you made a get request for '.$path);
				break;
			// so are posts
			case 'post':
			   // posts are used to store stuff
				$data = array('message' => $greeting.' you made a post request');
				break;
			
		}



/*once you've done all your business you might want to return some data. This can be done using
JSON or XML or both. I've gone for JSON in this example.*/

	$data = json_encode($data);	
	
	$data = '{"result": '.$data.'}';
		
	echo $data;	
?>
