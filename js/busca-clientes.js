const btn = document.getElementById("btn");
const btnIncluirCliente = document.getElementById("btnIncluirCliente");
const btnIncluir = document.getElementById("btnIncluir");
const content = document.getElementById("content");

btnIncluirCliente.addEventListener("click", (e) => {
   const frmIncluirCliente = document.getElementById("frmIncluirCliente");
   frmIncluirCliente.style.setProperty("display", "block");
});
btnIncluir.addEventListener("click", (e) => {
   e.preventDefault();
   alert("btnIncluir");
   let cliente = new FormData(document.getElementById("frmIncluirCliente"));
   console.log(cliente);
   const xhr = new XMLHttpRequest();
   xhr.onload = function () {
      if (xhr.status == 200) {
         alert(xhr.responseText);
         alert("Inclusao ok");
         frmIncluirCliente.reset();
         buscaClientes();
      } else {
         alert("Erro na inclusao");
      }
   }
   xhr.open("POST", "php/insert-cliente.php");
   xhr.send(cliente);
})

document.addEventListener("DOMContentLoaded", buscaClientes);
btn.addEventListener("click", buscaClientes);

function buscaClientes() {
   alert("buscaClientes");
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
            html += `<td>${cliente.codigo}</td>`;
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
   req.open("GET", "php/busca-clientes.php");
   req.send();
}