// versao 2
document.addEventListener("submit", (e) => {
   e.preventDefault();
   const form = document.querySelector("form");
   let cliente = {
      codigo : form.inCodigo.value,
      nome   : form.inNome.value,
      email  : form.inEmail.value
   };
   console.log(cliente);
   
   const req = new XMLHttpRequest();
   req.onload = function () {
      if (req.status == 200) {
         //let resp = JSON.parse(this.responseText);
         let resp = this.responseText;
         document.getElementById("resp").innerText = resp;
      }
      else {
         alert(`Erro: ${req.status} ${req.statusText}`);
      }
   }
   req.open("POST", "cliente-insert-json.php");
   req.setRequestHeader('Content-type', 'application/json; charset=UTF-8');
   req.send(JSON.stringify(cliente));
})
