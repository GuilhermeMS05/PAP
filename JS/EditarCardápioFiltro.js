function filterProducts(type) {
    var rows = document.getElementById("product-table").getElementsByTagName("tr");
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        if (type === "all" || row.classList.contains(type)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}