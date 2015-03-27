<?php

class MemoryController extends BaseController{

	public function create()
	{
		$input = Input::all();
		$user = Sentry::getUser();
		$user = User::find($user->id);

		//try {
			$memory = new Memory;
			$memory->user_id = $user->id;
			$memory->title = $input['title'];
			$memory->media_type = $input['media_type'];
			$memory->content = $input['content'];

			if(!is_null($input['media_author']))
			{
				$memory->media_author = $input['media_author'];
			}

			$memory->save();


			if(!empty(Input::file()))
			{
				$file = $input['media'];

				if(!file_exists('memory'))
				{
					mkdir('memory');
				}

				$directory = 'memory/'.$memory->id.'/';
				$name = $memory->id.$user->id.'00memory.png';

				$file = $file->move($directory, $name);

				$memory->media = asset('memory/'.$memory->id.'/'.$memory->id.$user->id.'00memory.png');
			} else{
				$media = $input['media'];
			}

			$memory->save();

			$data = ApiResponse::build('memory', $user->memory);


			return ApiResponse::response(1, null, $data);
			
		//} catch (Exception $e) {

			return ApiResponse::response(0);			
		//}
	}

	public function focus($id)
	{
		$memory = Memory::find($id);

		$data = ApiResponse::build('memory', $memory);

		return ApiResponse::response(1, null, $data);
	}
}