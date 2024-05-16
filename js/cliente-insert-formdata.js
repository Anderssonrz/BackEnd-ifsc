// versao 2const resp = document.getElementById("resp")

document.addEventListener("submit", (e) => {
    e.preventDefault();
    const form = document.querySelector("form");
    let cliente = new FormData();
    cliente.append('codigo', form.inCodigo.value);
    cliente.append('nome', form.inNome.value);
    cliente.append('email', form.inEmail.value);

    console.log(cliente);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "cliente-insert-formdata.php")
    xhr.onload = function () {
        if (xhr.status == 200) {
            //let resp = JSON.parse(this.responseText);
            resp.innerText = xhr.responseText;
            form.reset();
        }
        else {
            resp.innerText = `Erro: ${req.status} ${req.statusText}`;
        }
    }
    xhr.send(cliente);
    e.preventDefault;
})
