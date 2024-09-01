// CHAMADA DE FUNÇÕES
const btnBusca = document.getElementById("btnBusca");
const btnIncluirCliente = document.getElementById("btnIncluirCliente");
const btnIncluir = document.getElementById("btnIncluir");
const btnAtualizar = document.getElementById("btnAtualizar");
const content = document.getElementById("content");
const frmIncluirCliente = document.getElementById("frmIncluirCliente");
const frmBuscaCliente = document.getElementById("frmBuscaCliente");

// -----------------------------------------------------------------------------------

btnIncluirCliente.addEventListener("click", (e) => {
  carregarUFs("id_uf");
  frmIncluirCliente.style.setProperty("display", "block");
});

// -----------------------------------------------------------------------------------

btnIncluir.addEventListener("click", (e) => {
  e.preventDefault(); // Previne o comportamento padrão do botão

  const xhr = new XMLHttpRequest();
  let cliente = new FormData(frmIncluirCliente);

  xhr.onload = function () {
    if (xhr.status == 200) {
      alert("Inclusão Ok");
      frmIncluirCliente.reset();
      frmIncluirCliente.style.setProperty("display", "none");
      buscaClientes(); // Atualiza a lista de clientes
    } else {
      alert("Erro na Inclusão");
    }
  };

  xhr.open("POST", "cliente-insert.php");
  xhr.send(cliente);
});

// -----------------------------------------------------------------------------------

btnBusca.addEventListener("click", buscaClientes);
document.addEventListener("DOMContentLoaded", buscaClientes);
frmBuscaCliente.addEventListener("submit", buscaClientes);

// Função de busca de clientes
function buscaClientes(e) {
  if (e) e.preventDefault(); // Previne o comportamento padrão do formulário

  const expressaoBusca = document.getElementById("expressaoBusca").value;
  const req = new XMLHttpRequest();
  req.onload = function () {
    console.log("Resposta da API:", req.responseText); // Verifica a resposta da API
    if (req.status == 200) {
      let html = "<table class='table table-bordered table-hover table-sm'>";
      html += "<tr><th>CÓDIGO</th><th>NOME</th><th>E-MAIL</th><th>UF</th><th>Editar/Excluir</th></tr>";
      const vetorClientes = JSON.parse(this.responseText);

      // Adiciona verificação de tipo para depuração
      if (!Array.isArray(vetorClientes)) {
        console.error("Erro: A resposta da API não é um array.");
        return;
      }

      for (let cliente of vetorClientes) {
        console.log("Cliente:", cliente); // Verifica cada cliente
        html += `<tr><td>${cliente.id_cliente ?? 'N/A'}</td><td>${cliente.nome ?? 'N/A'}</td><td>${cliente.email ?? 'N/A'}</td><td>${cliente.id_uf ?? 'N/A'}</td>`;
        html += '<td>';
        html += ` <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-info" onClick="showClienteUpdForm(${cliente.id_cliente})"><i class="fa-solid fa-pencil"></i></button>`;
        html += ` <button class="btn btn-danger" onClick="delCliente(${cliente.id_cliente});"><i class="fa-solid fa-trash-can"></i></button>`;
        html += '</td></tr>';
      }
      html += "</table>";
      content.innerHTML = html;
    } else {
      alert(`Erro: ${req.status} ${req.statusText}`);
    }
  };

  req.open("GET", `busca-clientes.php?expressaoBusca=${expressaoBusca}`);
  req.send();
}

// Função para limpar a busca
function limparBusca() {
  document.getElementById('expressaoBusca').value = '';  // Limpa o valor do campo de busca
}

// Eventos
btnBusca.addEventListener("click", buscaClientes);
document.addEventListener("DOMContentLoaded", buscaClientes);
frmBuscaCliente.addEventListener("submit", buscaClientes);

// ---------------------------------------------------------------------------------------

function showClienteUpdForm(id_cliente) {
  console.log("Entrou na função showClienteUpdForm com código:", id_cliente);

  let xhr = new XMLHttpRequest();
  xhr.onload = function () {
    if (xhr.status == 200) {
      console.log("Dados do cliente para atualização:", xhr.responseText);
      let cliente = JSON.parse(xhr.responseText)[0];
      console.log("Cliente:", cliente);
      const frm = document.getElementById("frmAlterarCliente");
      frm.id_cliente.value = cliente.id_cliente;
      frm.nome.value = cliente.nome;
      frm.email.value = cliente.email;
      frm.id_uf.value = cliente.id_uf;
    } else {
      console.error("Erro ao buscar cliente:", xhr.status, xhr.statusText);
    }
  };

  xhr.open("GET", `cliente-get.php?id_cliente=${id_cliente}`);
  xhr.send();
}

// --------------------------------------------------------------------------

btnAtualizar.addEventListener("click", (e) => {
  e.preventDefault(); // Previne o comportamento padrão do botão

  console.log("btnAtualizar.addEventListener");

  const frm = document.getElementById("frmAlterarCliente");
  let cliente = new FormData(frm);

  let xhr = new XMLHttpRequest();
  xhr.onload = function () {
    console.log("Resposta ao atualizar cliente:", xhr.responseText);
    if (xhr.status == 200) {
      buscaClientes(); // Atualiza a lista de clientes
      bootstrap.Modal
      alert("Erro ao atualizar cliente.");
    }
  };

  xhr.open("POST", "cliente-update.php");
  xhr.send(cliente);
});

// -------------------------------------------------------------------------------------

function delCliente(id_uf) {
  if (confirm("Confirma a exclusão do registro?")) {
    let data = new FormData();
    data.append("id", id_uf);

    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
      if (xhr.status == 200) {
        alert("Exclusão Ok");
        buscaClientes(); // Atualiza a lista de clientes
      } else {
        alert(`Erro: ${xhr.status} ${xhr.statusText}`);
      }
    };

    xhr.open("POST", "cliente-delete.php");
    xhr.send(data);
  }
}

// -------------------------------------------------------------------------------------

function carregarUFs(elementId) {
  var elemSelectUf = document.getElementById(elementId);
  var xhr = new XMLHttpRequest();
  xhr.onload = function () {
    if (xhr.status == 200 && xhr.readyState == 4) {
      console.log("Dados de UF:", xhr.responseText); // Verifica os dados das UF
      var arrayUF = JSON.parse(xhr.responseText);

      if (!Array.isArray(arrayUF)) {
        console.error("Erro: A resposta da API de UF não é um array.");
        return;
      }

      elemSelectUf.innerHTML = ""; // Limpa as opções existentes
      for (let uf of arrayUF) {
        let elemOption = document.createElement("option");
        elemOption.innerText = `${uf.sigla} - ${uf.nome}`;
        elemOption.setAttribute('value', uf.id_uf);
        elemSelectUf.appendChild(elemOption);
      }
    } else {
      console.error(`Erro ao carregar UFs: ${xhr.status} ${xhr.statusText}`);
    }
  };

  xhr.open("GET", "uf-controller.php");
  xhr.send(data);
}
