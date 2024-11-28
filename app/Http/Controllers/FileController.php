<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // max 10MB
        ]);
        
        $file = $request->file('file');
        $path = $file->store('public/files');
        
        File::create([
            'session_id' => $request->session_id,
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
        ]);
        
        return response()->json(['message' => 'File uploaded successfully!']);
    }

    public function getFiles($sessionId)
    {
        // Retrieve files associated with the given session ID
        $files = File::where('session_id', $sessionId)->get(['id', 'file_name', 'file_path']);
        
        // Prepare the files data by adding the file URL
        $files = $files->map(function($file) {
            $file->file_url = asset('storage/' . str_replace('public/', '', $file->file_path));
            return $file;
        });
    
        return response()->json($files);
    }




//     public function deleteAllFiles($sessionId)
// {
//     try {
//         Log::info("Attempting to delete files for session: {$sessionId}");

//         if (empty($sessionId)) {
//             Log::error("Session ID is empty");
//             return response()->json(['message' => 'Invalid session ID.'], 400);
//         }

//         $files = File::where('session_id', $sessionId)->get();
//         Log::info("Files found: " . $files->pluck('file_name')->join(', '));

//         if ($files->isEmpty()) {
//             Log::info("No files found for session: {$sessionId}");
//             return response()->json(['message' => 'No files to delete.'], 404);
//         }

//         // Delete the files
//         $deleteResult = File::where('session_id', $sessionId)->delete();
//         Log::info("Files deletion result: " . ($deleteResult ? 'Success' : 'Failure'));

//         if ($deleteResult) {
//             return response()->json(['message' => 'All files deleted successfully!']);
//         } else {
//             Log::error("Failed to delete files for session: {$sessionId}");
//             return response()->json(['message' => 'Failed to delete files.'], 500);
//         }

//     } catch (\Exception $e) {
//         Log::error("Error deleting files for session {$sessionId}: " . $e->getMessage());
//         return response()->json(['message' => 'Error deleting files: ' . $e->getMessage()], 500);
//     }
// }




public function deleteAllFiles($sessionId)
{
    try {
        Log::info("Attempting to delete files for session: {$sessionId}");

        if (empty($sessionId)) {
            Log::error("Session ID is empty");
            return response()->json(['message' => 'Invalid session ID.'], 400);
        }

        // Fetch files associated with the session_id
        $files = File::where('session_id', $sessionId)->get();

        // Log the names of files found
        Log::info("Files found: " . $files->pluck('file_name')->join(', '));

        if ($files->isEmpty()) {
            Log::info("No files found for session: {$sessionId}");
            return response()->json(['message' => 'No files to delete.'], 404);
        }

        // Delete the actual files from storage
        foreach ($files as $file) {
            $filePath = storage_path('app/' . $file->file_path); // Ensure the path is correct based on how files are stored
            if (file_exists($filePath)) {
                unlink($filePath);  // Delete the file from storage
                Log::info("Deleted file from storage: {$file->file_name}");
            } else {
                Log::warning("File not found in storage: {$file->file_name}");
            }
        }

        // Delete the file records from the database
        $deleteResult = File::where('session_id', $sessionId)->delete();

        // Log the result of the deletion
        Log::info("Files deletion result from database: " . ($deleteResult ? 'Success' : 'Failure'));

        // Check if deletion was successful
        if ($deleteResult) {
            return response()->json(['message' => 'All files deleted successfully!']);
        } else {
            Log::error("Failed to delete files from database for session: {$sessionId}");
            return response()->json(['message' => 'Failed to delete files from database.'], 500);
        }

    } catch (\Exception $e) {
        Log::error("Error deleting files for session {$sessionId}: " . $e->getMessage());
        return response()->json(['message' => 'Error deleting files: ' . $e->getMessage()], 500);
    }
}

}