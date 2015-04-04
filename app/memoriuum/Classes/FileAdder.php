<?php 

namespace Memoriuum\Classes;

class FileAdder {

    public static function file($input, $user, $memory)
    {
        $file = $input['media'];

        if(!file_exists('memory'))
        {
            mkdir('memory');
        }

        $directory = 'memory/'.$memory->id.'/';
        $name = $memory->id.$user->id.'00memory.png';

        $type = explode('/', \Input::file()['media']->getClientMimetype());

        $encoding = $type[1];
        $type = $type[0];

        if ($type == 'video') {
            $name = $memory->id.$user->id.'00memory.'.$encoding;
            $file = $file->move($directory, $name);
        }
        if ($type == 'image') {
            $file = $file->move($directory, $name);
        }

        $memory->media = FileAdder::media($memory, $user, $type);
    }

    public static function delete($memory, $user)
    {
        
    }

    private static function media($memory, $user, $type)
    {
        if($type == 'image')
        {
            $media = asset('memory/'.$memory->id.'/'.$memory->id.$user->id.'00memory.png');
        }
        if($type == 'video')
        {
            $media = asset('memory/'.$memory->id.'/'.$memory->id.$user->id.'00memory.mp4');
        }
        return $media;
    }

}