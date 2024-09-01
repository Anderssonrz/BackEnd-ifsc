const btnRegistro = document.getElementById("btnRegistro");
btnRegistro.addEventListener("click", (e) => {
    console.log("btnRegistro");
    e.preventDefault();

    const btnRegistro = document.getElementById("btnRegistro");
    let data = new FormData(frmRegistro);
    for (let key of data.keys()) {
        console.log(key, data.get(key));
    }



    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {

            console.log(xhr.responseText);
            let msg = JSON.parse(xhr.responseText);
            if (msg.code == 200) {
                const footer = document.querySelector("footer");
                footer.innerText = msg.Text;
                let tag = "Cadastro efetuado com sucesso";
                footer.innerHTML = tag;
                frmRegistro.reset();
            } else {
                console.log(msg);
            }
        }
    }

    xhr.open("POST", "registro-controller.php");
    xhr.send(data);

})