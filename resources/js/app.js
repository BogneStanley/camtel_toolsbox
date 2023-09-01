var toolsbar = document.getElementById("custom_toolsbar");
var toggleToolsbar = document.getElementById("toggle_tools_bar");
var fileCsv1 = document.getElementById("csv_file_1");
var fileCsv2 = document.getElementById("csv_file_2");
var fileCsv1Name = document.getElementById("csv_file_1_name");
var fileCsv2Name = document.getElementById("csv_file_2_name");

console.log(toggleToolsbar);

toggleToolsbar.addEventListener("click", function (e) {
    console.log(toolsbar.classList.contains("toolsbar_before"));
    if (toolsbar.classList.contains("toolsbar_before")) {
        toolsbar.classList.remove("toolsbar_before");
        toolsbar.classList.add("toolsbar_after");
    } else if (toolsbar.classList.contains("toolsbar_after")) {
        toolsbar.classList.remove("toolsbar_after");
        toolsbar.classList.add("toolsbar_before");
    }
})

fileCsv1.addEventListener("change", function (e) {
    fileCsv1Name.value = e.target.files[0].name;
})

fileCsv2.addEventListener("change", function (e) {
    fileCsv2Name.value = e.target.files[0].name;
})