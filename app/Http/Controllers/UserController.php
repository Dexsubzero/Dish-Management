<?php

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

// Export
public function exportUsers()
{
    return Excel::download(new UsersExport, 'users.xlsx');
}

// Import
public function importUsers(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,csv',
    ]);

    Excel::import(new UsersImport, $request->file('file'));

    return back()->with('success', 'Users imported successfully.');
}
