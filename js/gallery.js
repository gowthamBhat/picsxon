function superusercaller(id) {
    var x = document.getElementById('super-btn');

    fetch(`superUpdate.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            x.innerHTML = "Requested";
            x.className = "btn btn-warning";
            x.disabled = true;
        });

}