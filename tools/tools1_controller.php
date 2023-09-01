<?php

require_once './utils/helpers.php';

// Vérifier si les fichiers CSV ont été soumis
if (isset($_FILES['csv_file_1'], $_FILES['csv_file_2'])) {
    // Récupérer les fichiers CSV

    echo $file1 = $_FILES['csv_file_1']['tmp_name'];
    echo $file2 = $_FILES['csv_file_2']['tmp_name'];


    // Lire les données des fichiers CSV
    $data1 = readCSV($file1);
    $data2 = readCSV($file2);

    // Définir les structures de données pour les résultats
    $file1_summary = [];
    $file2_summary = [];
    $analysis_offres = [];
    $analysis_marche = [];
    $analysis_agence = [];

    // Traitement des fichiers CSV
    foreach ($data1 as $row) {
        $offre = $row['Offres'];
        $montant = $row['Montant'];
        $marche = $row['Marché'];
        $agence = $row['Agence Commerciale'];

        // Calculer les cumuls des montants pour le premier mois (fichier de synthèse)
        if (!isset($file1_summary[$offre])) {
            $file1_summary[$offre] = 0;
        }
        $file1_summary[$offre] += $montant;

        // Enregistrer les valeurs pour l'analyse des offres
        $analysis_offres[$row['Numéro de Service']] = $row;
    }

    foreach ($data2 as $row) {
        $offre = $row['Offres'];
        $montant = $row['Montant'];
        $marche = $row['Marché'];
        $agence = $row['Agence Commerciale'];

        // Calculer les cumuls des montants pour le deuxième mois (fichier de synthèse)
        if (!isset($file2_summary[$offre])) {
            $file2_summary[$offre] = 0;
        }
        $file2_summary[$offre] += $montant;

        // Enregistrer les valeurs pour l'analyse des offres
        $serviceNum = $row['Numéro de Service'];
        if (isset($analysis_offres[$serviceNum])) {
            $prevRow = $analysis_offres[$serviceNum];
            if ($prevRow['Montant'] != $montant) {
                $analysis_offres[$serviceNum . '_varied'] = $row;
            }
            unset($analysis_offres[$serviceNum]);
        } else {
            $analysis_offres[$serviceNum . '_added'] = $row;
        }
    }

    // Comparer les cumuls des montants et déterminer l'évolution (fichier de synthèse)
    $summary = [];
    foreach ($file1_summary as $offre => $montant1) {
        $montant2 = isset($file2_summary[$offre]) ? $file2_summary[$offre] : 0;
        $evolution = $montant1 < $montant2 ? 'Hausse' : ($montant1 > $montant2 ? 'Baisse' : 'Stable');
        $summary[] = [
            'Offres' => $offre,
            'Cumul montant mois1' => $montant1,
            'Cumul montant mois2' => $montant2,
            'Evolution' => $evolution,
        ];
    }

    // Écrire les fichiers de sortie CSV
    writeCSV($summary, 'fichier_synthese.csv');
    writeCSV($data1, 'fichier_synthese_2.csv');
    writeCSV($data2, 'fichier_synthese_3.csv');
    writeCSV(array_values($analysis_offres), 'fichier_analyse_offres.csv');
    writeCSV(array_values($analysis_marche), 'fichier_analyse_marche.csv');
    writeCSV(array_values($analysis_agence), 'fichier_analyse_agence.csv');

    // Télécharger les fichiers de sortie
    header("Content-Type: application/csv");
    header("Content-Disposition: attachment; filename=fichier_synthese.csv");
    readfile("fichier_synthese.csv");
    exit();
}
