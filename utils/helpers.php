<?php

/**
 * Fonction pour lire un fichier CSV
 * @param string $file
 * @return array
 */
function readCSV($file)
{

    $data = [];
    $header = null;;
    if (($handle = fopen($file, 'r')) !== false) {

        while (($row = fgetcsv($handle, 1000, ';')) !== false) {
            if (!$header) {
                $header = $row;
            } else {
                $data[] = array_combine($header, $row);
            }
        }
        fclose($handle);
    }
    return $data;
}

/**
 * Fonction pour écrire un fichier CSV
 * @param array $data
 * @param string $file
 * @return void
 */
function writeCSV($data, $file)
{
    if (($handle = fopen($file, 'w')) !== false) {
        if (!empty($data)) {
            fputcsv($handle, array_keys($data[0]), ';');
            foreach ($data as $row) {
                fputcsv($handle, $row, ';');
            }
        }
        fclose($handle);
    }
}
