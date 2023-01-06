<?php

namespace App\Http\Controllers;

use App\Rules\RecaptchaV3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Str;

class ShowScrapController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */

    public function update(Request $request, $id)
    {
		$type = 'text/plain';

		$input = $request->all();
		
		$validation = self::testInput($input);

        if ($validation == true) {

        $scrap = \App\DailyScrap::find($id);

        if ($input["email"] == $scrap->user['email']) {
            $hashedPassword = $scrap->user["password"];

            if (Hash::check($input["password"], $hashedPassword)) {

                $scrap->title = $input["title"];
				$scrap->scrap = $input["scrap"];

                $scrap->save();
				
				$user = \App\User::find($scrap->user_id);
				$user->name = $input["name"];
				$user->save();

				$json = json_encode(array('status' => 'true', 'message' => "Your work has been updated."));
				$response = response($json)->header('Content-Type', $type);
            } else {
				$json = json_encode(array('status' => 'false', 'message' => "The password you put in does not match the original password associated to your email."));
				$response = response($json)->header('Content-Type', $type);
            }
        } else {
			$json = json_encode(array('status' => 'false', 'message' => "The email you inserted does not exist."));
			$response = response($json)->header('Content-Type', $type);
		}
		
	} else {
		$json = json_encode(array('status' => 'false', 'message' => 'Click on the submit button again; Validation failed. All forms are required. Scrap must be between 600 - 3000 characters.'));
		$response = response($json)->header('Content-Type', $type);
	}
	return $response;
        //return redirect('the-daily-scrap')->with('status', $msg);
    }

    public function fillFormBeforeUpdate($id)
    {
        $db = \App\DailyScrap::find($id);

        return self::show($db);
    }

    public function sendEmail($email, $password, $scrapId, $title)
    {
        $state = false;

        $lyrics = "Hello, \n\n" .
            "you have added {$title} to The Daily Scrap.\n" .
            "Your work can be edited at any time.\n\n" .

            "Email: {$email}\n" .
            "Password: {$password}\n" .
            "Scrap link: http://thefamousliterarygroup.co.uk/the-daily-scrap/".str_slug($title, '-')."/{$scrapId}\n" .

            "Update link: http://thefamousliterarygroup.co.uk/the-daily-scrap/1/beforeUpdate/{$scrapId} \n\n" .

            "Thank you for your contribution,\n" .
            "The Famous Literary Group.";

        $subject = 'The Daily Scrap';

        $headers = array(
            'From' => 'info@thefamousliterarygroup.co.uk',
            'Reply-To' => 'winfo@thefamousliterarygroup.co.uk',
            'X-Mailer' => 'PHP/' . phpversion(),
        );

        $mail = mail($email, $subject, $lyrics, $headers);

        if ($mail) {
            $state = true;
        }

        return $state;
    }

    public function testInput($request)
    {
        $type = 'text/plain';

        $validator = Validator::make($request, [
            'name' => 'required',
            'email' => 'required',
            'title' => 'required|max:200',
            'scrap' => 'required|min:500|max:4000',
			'g-recaptcha-response-scrap' => ['required', new RecaptchaV3],
			
        ]);

        if ($validator->fails()) {
            return false;
        } else {
            return true;
        }
    }

    public function create(Request $request)
    {
        $type = 'text/plain';

        $input = $request->all();

        $validation = self::testInput($input);

        if ($validation == true) {
            $json = json_encode(array('status' => 'true', 'message' => 'Validation success'));
            $response = response($json)->header('Content-Type', $type);

            $db = \App\User::select("password", "email", "id")->where("email", $input["email"])->get()->first();

            //if the email in the database exists

            try {
                if ($db) {
                    $hashedPassword = $db["password"];

                    if (Hash::check($input["password"], $hashedPassword)) {
                        $scrap = new \App\DailyScrap();
                        $scrap->title = $input["title"];
                        $scrap->scrap = $input["scrap"];
                        $scrap->user_id = $db["id"];

						$scrap->save();
						
                        $mail = self::sendEmail($input["email"], $input["password"], $scrap->id, $input["title"]);

						if ($mail) {
							$json = json_encode(array('status' => 'true', 'message' => 'Confirmation was sent to your email.'));
							$response = response($json)->header('Content-Type', $type);
						}

                        $json = json_encode(array('status' => 'true', 'message' => 'Your work has been added.'));
                        $response = response($json)->header('Content-Type', $type);
                    } else {
                        $json = json_encode(array('status' => 'false', 'message' => 'The password you put in does not match the original password associated to your email.'));
                        $response = response($json)->header('Content-Type', $type);
                    }
                } else {
                    /*
                     **    if the email doesnt exist create a new user.
                     */
                    $scrapUser = new \App\User();
                    $scrapUser->name = $input["name"];
                    $scrapUser->email = $input["email"];
                    $scrapUser->password = Hash::make($input["password"]);

                    $scrapUser->save();

                    $scrap = new \App\DailyScrap();
                    $scrap->title = $input["title"];
                    $scrap->scrap = $input["scrap"];
                    $scrap->user_id = $scrapUser->id;

                    $scrap->save();

                    $mail = self::sendEmail($input["email"], $input["password"], $scrap->id, $input["title"]);

                    if ($mail) {
                        $json = json_encode(array('status' => 'true', 'message' => 'Confirmation was sent to your email.'));
                        $response = response($json)->header('Content-Type', $type);
                    }

                }
            } catch (\Illuminate\Database\QueryException $e) {
                $json = json_encode(array('status' => 'false', 'message' => 'All fields are required.'));
                $response = response($json)->header('Content-Type', $type);
            }
        } else {
            $json = json_encode(array('status' => 'false', 'message' => 'Click on the submit button again; Validation failed. All forms are required. Scrap must be between 600 - 3000 characters.'));
            $response = response($json)->header('Content-Type', $type);
        }
        return $response;
        //return redirect('the-daily-scrap')->with('status', $msg);
    }

    public function loadData()
    {
        $scraps = \App\DailyScrap::orderBy('id', 'DESC')->paginate(8);
        return $scraps;
    }

    public function show($db = null)
    {
        //dump($db);
        $scraps = self::loadData();

		foreach($scraps as $scrap){
			$scrap['scrap'] = self::nl2p($scrap['scrap']);
        }
        
        return view('the-daily-scrap', ['scraps' => $scraps, 'db' => $db]);
    }

    public function showSingleScrap($title, $id){
        $scrap = \App\DailyScrap::findOrFail($id);
        $scrap['scrap'] = self::nl2p($scrap['scrap']);

        return view('showScrap', ['scrap' => $scrap, 'title' => str_replace('-', ' ', Str::title($title))]);
    }

    public function returnJSON()
    {
        $scraps = self::loadData();

        return json_encode($scraps);
	}
	
	public function nl2p($text){
		$text = trim($text);
		$text = strip_tags($text, '<strong>');

		$text = '<p>' . preg_replace('/[\r\n]+/', "</p>\n\n<p>", $text) . "</p>\n";

        return $text;

	}

}
