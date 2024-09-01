const btn = document.getElementById("btn");
const content = document.getElementById("content");

btn.addEventListener("click", (e) => {
   const req = new XMLHttpRequest();
   req.onload = function () {
      if (req.status == 200) {
         let html = "<table class='table table-bordered table-hover table-sm'>";
         html += "<tr><th>Cod</th><th>Nome</th><th>Email</th></tr>";
         const vetorClientes = JSON.parse(this.responseText);
         console.log(vetorClientes);
         // buscar registros de clientes
         for (let cliente of vetorClientes) {
            html += "<tr>";
            html += `<td>${cliente.id_cliente}</td>`;
            html += `<td>${cliente.nome}</td>`;
            html += `<td>${cliente.email}</td>`;            
            html += "</tr>";
         }
         html += "</table>";
         content.innerHTML = html;
      }
      else {
         alert(`Erro: ${req.status} ${req.statusText}`);
      }
   }
   req.open("GET", "ajax-04.php");
   req.send();
})
