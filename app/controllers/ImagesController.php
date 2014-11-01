<?php

/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 30/10/14
 * Time: 09:29 PM
 */
class ImagesController extends BaseController
{

    public function getDropzone()
    {
        return View::make('images/dropzone');
    }

    public function store()
    {
        if (!empty($_FILES)) {
            $file = Input::file('file');
            $secureName = md5($file->getClientOriginalName());
            $dir = public_path() . '/uploads/';

            $fileType = $_FILES['file']['type'];
            $nameFile = $secureName . '.' . $file->guessClientExtension();
            $subir = $file->move($dir, $nameFile);

            $temp = new \Cartelera\Temporales\Temporale();
            $temp->user_id = Auth::user()->id;
            $temp->type = $fileType;
            $temp->urlarchivo = $nameFile;
            $temp->save();
        }

    }
} 