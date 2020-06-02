<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FilesRequest;
use App\UsersFilesModel;

use Storage;
use Auth;
use Str;

class UsersFilesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $files = $user->files;

        return view('files.index', [
            'files' => $files
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilesRequest $request)
    {
        $data = $request->all();

        if(isset($data['file']))
        {
            $user = Auth::user();

            $destinationPath = $this->userFilesPath.md5($user->id);

            if(!Storage::exists($destinationPath))
            {
                Storage::makeDirectory($destinationPath, 755, 1);
            }

            $file = $data['file'];

            if ($file->isValid())
            {
                $originalFileName = $file->getClientOriginalName();
                $extension = $file->extension();
                $fileName = md5(time()).'_'.rand(1,100000).'.'.$extension;
                $file->move($destinationPath, $fileName);

                $userFile = new UsersFilesModel([
                    'user_id' => $user->id,
                    'short_name' => Str::random(7),
                    'original_file_name' => $originalFileName,
                    'file_name' => $fileName
                ]);

                if($userFile->save())
                {
                    return redirect()->route('files.index')->with('message', 'Files added successfully. Here is the link: '.route('file.catch', $userFile->short_name));
                }
                else
                {
                    return redirect()->route('files.index')->with('error', 'Something went wrong. Please try again later!');
                }
            }
        }
        else
        {
            return redirect()->route('files.index')->with('error', 'Something went wrong. Please try again later!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        $file = $user->files()->where('short_name', $id)->first();

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();

        $file = $user->files()->find($id);

        if($file)
        {
            $filePath = $this->userFilesPath.md5($user->id).'/'.$file->file_name;

            if($file->delete())
            {
                Storage::disk('public')->delete('files/'.md5($user->id).'/'.$file->file_name);
                return redirect()->route('files.index')->with('message', 'Files added successfully.');
            }
            else
            {
                return redirect()->route('files.index')->with('error', 'Something went wrong. Please try again later!');
            }
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
    public function download($id)
    {
        $user = Auth::user();

        $file = $user->files()->where('short_name', $id)->first();

        if($file)
        {
            $filePath = $this->userFilesPath.md5($user->id).'/'.$file->file_name;

            return response()->download($filePath, $file->original_file_name);
        }
        else
        {
            abort(404);
        }
    }
}
