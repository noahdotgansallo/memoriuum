<?php

class MemoryController extends BaseController{

	public function create()
	{
		$input = Input::all();
		$user = Sentry::getUser();
		$user = User::find($user->id);

		//try{
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
				FileAdder::file($input, $user, $memory);

			} else{
				$memory->media = $input['media'];
			}

			$memory->save();

			$data = ApiResponse::build('create', $memory);


			return ApiResponse::response(1, null, $data);
			
		//} catch (Exception $e) {

			return ApiResponse::response(0);			
		//}
	}

	public function focus($id)
	{
		$memory = Memory::find($id);

		$data = ApiResponse::build('focus', $memory);

		return ApiResponse::response(1, null, $data);
	}

	public function edit($id)
	{
		$input = Input::all();
		$memory = Memory::find($id);
		$user = Sentry::getUser();
		$user = User::find($user->id);

		try {
			if(!is_null($memory))
			{

				if(!empty($input['content']))
				{
					$memory->content = $input['content'];
				}

				if(!empty($input['media_type']))
				{
					$memory->media_type = $input['media_type'];
				}

				if(!empty($input['media']))
				{
					FileAdder::file($input, $user, $memory);
				}

				if(!empty($input['title']))
				{
					$memory->title = $input['title'];
				}

				if(!empty($input['media_author']))
				{
					$memory->media_author = $input['media_author'];
				}

				$memory->save();
			}

			$data = ApiResponse::build('edit', $memory);

			return ApiResponse::response(1, null, $memory);
			
		} catch (Exception $e) {
			return ApiResponse::response(0, 'An error occured and your edits were not saved');
		}
	}

	public function destroy($id)
	{
		$memory = Memory::find($id);

		if(!is_null($memory))
		{
			try {

				$memory->delete();
				return ApiResponse::response(1, null, 'Memory deleted');
			
			} catch (Exception $e) {
				return ApiResponse::response(0, 'An error occured and your memory could not be deleted');
			}
		}

		return ApiResponse::response(0, 'This memory could not be found');



	}
}