<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Certificat;

class CertificateController extends Controller
{
    public function show($id)
    {
        // Retrieve the certificate with the given ID and authenticated user's ID from the database
        $certificate = Certificat::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Pass the certificate data to the view
        return view('certificates.show', compact('certificate'));
    }
}
