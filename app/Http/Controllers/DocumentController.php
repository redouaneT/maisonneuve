<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;



class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::SimplePaginate(10);
        return view('template/adminlte/documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template/adminlte/documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'file' => 'required|file|mimes:pdf,zip',
        ]);

        $file = $request->file('file');
        $fileExtension = $file->getClientOriginalExtension();

        $request['type'] = $fileExtension;
       
        $fileName = $file->getClientOriginalName();
        $fileNameWithoutExt = pathinfo($fileName, PATHINFO_FILENAME);
        
        // Create a unique filename with the original extension
        $uniqueFileName = $fileNameWithoutExt . '-' . time() . '.' . $fileExtension;
        
        $filePath = $request->file('file')->storeAs('documents', $uniqueFileName, 'local');
       

        $document = new Document([
            'title' => $request->input('title'),
            'file_path' => $filePath,
            'type' => $request['type'],
            'original_name' => $file->getClientOriginalName(),
        ]);

        $request->user()->documents()->save($document);

        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('template/adminlte/documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|max:255',
            'file' => 'file|mimes:pdf,zip',
        ]);

        $document->title = $request->input('title');

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($document->file_path);

            $file = $request->file('file');
            $filePath = $file->store('documents', 'public');

            $document->file_path = $filePath;
        }

        $document->save();

        return redirect()->route('documents.index')->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Document deleted successfully.');
    }

    public function download(Document $document)
    {
        // Serve the file
        $filePath = storage_path('app/' . $document->file_path);
    
        return response()->download($filePath, $document->original_name . '.' . $document->type);
    }
}
