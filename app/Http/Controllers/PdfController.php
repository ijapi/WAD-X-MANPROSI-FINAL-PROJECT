<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class PdfController extends Controller
{
    public function generatePdf() {
        $url = 'http://example.com'; // Replace with your desired URL
        $outputPath = public_path('pdfs/output.pdf'); // Specify the output path

        Browsershot::url($url)
            ->setUserDataDir('/path/to/your/user/data/dir') // Specify a writable directory
            ->save($outputPath);

        return response()->download($outputPath);
    }

}
