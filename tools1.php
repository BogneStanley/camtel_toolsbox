<?php
require_once './tools/tools1_controller.php';
require "./resources/layout/header.php";
?>
<div class="w-100 row justify-content-center p-4 pt-5">
    <h5 class="text-center text-dark text-uppercase">Analyse de la production sur deux mois</h5>
    <br><br><br><br>
    <form method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-center">

            <div>
                <label class="label_custom mb-2" for="csv_file_1">
                    <div class="w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="30" class="w-5 h-5 text-secondary">
                            <path d="M9.25 13.25a.75.75 0 001.5 0V4.636l2.955 3.129a.75.75 0 001.09-1.03l-4.25-4.5a.75.75 0 00-1.09 0l-4.25 4.5a.75.75 0 101.09 1.03L9.25 4.636v8.614z" />
                            <path d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                        </svg><br><br> Fichier CSV (mois 1)
                    </div>
                </label><br>
                <input class="file_custom" id="csv_file_1" type="file" class="file" name="csv_file_1" accept=".csv" required>
                <input type="text" style="width: 250px; background-color: white; border: none" width="250" class="form-control text-secondary" id="csv_file_1_name" disabled value="Aucun fichier sélectionné">
            </div>
            <div style="width: 100px;">

            </div>
            <div>


                <label class="label_custom mb-2" for="csv_file_2">
                    <div class="w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="30" class="w-5 h-5 text-secondary">
                            <path d="M9.25 13.25a.75.75 0 001.5 0V4.636l2.955 3.129a.75.75 0 001.09-1.03l-4.25-4.5a.75.75 0 00-1.09 0l-4.25 4.5a.75.75 0 101.09 1.03L9.25 4.636v8.614z" />
                            <path d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                        </svg><br><br> Fichier CSV (mois 2)
                    </div>
                </label><br>
                <input class="file_custom" id="csv_file_2" type="file" class="file" name="csv_file_2" accept=".csv" required>
                <input type="text" style="width: 250px; background-color: white; border: none" width="250" class="form-control text-secondary" id="csv_file_2_name" disabled value="Aucun fichier sélectionné">
            </div>
        </div>

        <br>
        <br>
        <div class="d-flex justify-content-center">

            <input type="submit" class="btn btn-primary" value="Générer les fichiers de sortie">
        </div>
    </form>
</div>

<?php
require "./resources/layout/footer.php";
?>