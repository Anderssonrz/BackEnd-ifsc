const btn = document.getElementById("btn");
const content = document.getElementById("content");
const json = document.getElementById("json");

btn.addEventListener("click", (e) => {
   const req = new XMLHttpRequest();
   req.onload = function () {
      if (req.status == 200) {
         let html = "<table class='table table-bordered table-hover table-sm'>";
         html += "<tr><th>Cod</th><th>Nome</th><th>Email</th></tr>";
         //json.innerText = this.responseText;
         console.log(this.responseText);
         const vetorClientes = JSON.parse(this.responseText);
         console.log(typeof(vetorClientes));
         if (Array.isArray(vetorClientes)) {
            console.log("vetorClientes é um array");
         } else {
            console.log("vetorClientes não é um array");
         }
         console.log(vetorClientes);
         console.log("array length = ", vetorClientes.length);
         // buscar registros de clientes
         for (let i = 0; i < vetorClientes.length; i++) {
            html += "<tr>";
            const cliente = vetorClientes[i];
            console.log(i, cliente);
            // buscar os campos do registro
            for (let j = 0; j < cliente.length; j++) {
               console.log(j, cliente[j]);
               // para cada campo, vou criar um <td>
               html += `<td>${cliente[j]}</td>`;
            }
            html += "</tr>";
         }
         html += "</table>";
         content.innerHTML = html;
      }
      else {
         alert(`Erro: ${req.status} ${req.statusText}`);
      }
   }
   req.open("GET", "ajax-02.php");
   req.send();
})
