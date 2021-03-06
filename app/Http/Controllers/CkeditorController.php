<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Repositories\CategoriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Input;
class CkeditorController extends AppBaseController
{
    public function uploadImage(Request $request) {
	$CKEditor = $request->input('CKEditor');
	$funcNum  = $request->input('CKEditorFuncNum');
	$message  = $url = '';
	if (Input::hasFile('upload')) {
		$file = Input::file('upload');
		if ($file->isValid()) {
			$filename =rand(1000,9999).$file->getClientOriginalName();
			$file->move(public_path().'/wysiwyg/', $filename);
			$url = url('wysiwyg/' . $filename);
		} else {
			$message = 'An error occurred while uploading the file.';
		}
	} else {
		$message = 'No file uploaded.';
	}
	return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }
}