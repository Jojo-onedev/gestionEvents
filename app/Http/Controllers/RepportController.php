<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generateReport()
    {
        // Définir le chemin vers le script Python
        $scriptPath = storage_path('app/python_scripts/rapport_participation.py');
        
        // Exécuter le script Python
        $command = escapeshellcmd("python3 $scriptPath");
        $output = shell_exec($command);
        
        // Vérifiez si le script a généré le fichier CSV
        $filePath = storage_path('app/rapport_participation.csv');
        
        if (file_exists($filePath)) {
            // Retourner le fichier CSV pour téléchargement
            return response()->download($filePath);
        } else {
            // Si le fichier n'existe pas, retournez une erreur
            return response()->json(['error' => 'Le rapport n\'a pas pu être généré.'], 500);
        }
    }
}