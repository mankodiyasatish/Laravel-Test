<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersFilesModel;

class HomeController extends Controller
{
    /**
     * Storage Path
     */
    private $userFilesPath;

    /**
     * USerFilesController constructor.
     *
     */
    public function __construct()
    {
        $this->userFilesPath = storage_path('app/public/files/');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Display the specified file resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function catchFileUrl($id)
    {
        $file = UsersFilesModel::where('short_name', $id)->first();

        if($file)
        {
            return view('files.show', [
                'file' => $file
            ]);
        }
        else
        {
            abort(404);
        }
    }

    /**
     * Download the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadFileUrl($id)
    {
        $file = UsersFilesModel::where('short_name', $id)->first();

        if($file)
        {
            $filePath = $this->userFilesPath.md5($file->user_id).'/'.$file->file_name;
            $file->update(['number_of_downloads' => ($file->number_of_downloads+ 1)]);
            return response()->download($filePath, $file->original_file_name);
        }
        else
        {
            abort(404);
        }
    }
}
