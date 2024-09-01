const resp = document.getElementById("resp");

document.querySelector("form").addEventListener("submit", (e) => {
    const form = document.querySelector("form");
    let cliente = new FormData();
    cliente.append('id_cliente',form.inCodigo.value);
    cliente.append('nome',form.inNome.value);
    cliente.append('email',form.inEmail.value);
    cliente.append('id_uf',form.inUf.value);

    console.log(cliente);

    let xhr = new XMLHttpRequest();
    xhr.open("POST","cliente-insert-formdata.php");
    xhr.onload = function() {
        if (xhr.status==200) {
            resp.innerText = xhr.responseText;
            form.reset();
        }
        else {
            resp.innerText = `Erro: ${req.status} ${req.statusText}`;
        }
    }
    xhr.send(cliente);
    e.preventDefault();
})