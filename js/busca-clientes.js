// Seletores de Elementos
const btnBusca = document.getElementById("btnBusca");
const btnIncluirCliente = document.getElementById("btnIncluirCliente");
const btnIncluir = document.getElementById("btnIncluir");
const btnAtualizar = document.getElementById("btnAtualizar");
const content = document.getElementById("content");
const frmIncluirCliente = document.getElementById("frmIncluirCliente");
const frmBuscaCliente = document.getElementById("frmBuscaCliente");

// Carregar UFs quando abrir o modal de inclusão de cliente
btnIncluirCliente.addEventListener("click", () => {
  carregarUFs("inUf");
  bootstrap.Modal.getOrCreateInstance(document.getElementById("modalIncluirCliente")).show();
});

// Evento de inclusão de cliente
btnIncluir.addEventListener("click", (e) => {
  e.preventDefault(); // Previne o comportamento padrão do botão

  const xhr = new XMLHttpRequest();
  let cliente = new FormData(frmIncluirCliente);

  // Para fechar o modal após inclusão
  xhr.onload = function () {
    if (xhr.status == 200) {
      alert("Inclusão Ok");
      frmIncluirCliente.reset();
      bootstrap.Modal.getOrCreateInstance(document.getElementById("modalIncluirCliente")).hide();
      buscaClientes();
    } else {
      alert("Erro na Inclusão");
    }
  };

  xhr.open("POST", "cliente-insert.php");
  xhr.send(cliente);
});

// Evento de busca de clientes
btnBusca.addEventListener("click", buscaClientes);
document.addEventListener("DOMContentLoaded", buscaClientes);
frmBuscaCliente.addEventListener("submit", buscaClientes);

function buscaClientes(e) {
  if (e) e.preventDefault(); // Previne o comportamento padrão do formulário, se aplicável
  
  const expressaoBusca = document.getElementById("expressaoBusca").value.trim();
  const req = new XMLHttpRequest();
  
  req.onload = function () {
    if (req.status == 200) {
      console.log(req.responseText);
      let html = "<table class='table table-bordered table-hover table-sm'>";
      html += "<tr><th>CÓDIGO</th><th>NOME</th><th>E-MAIL</th><th>UF</th><th>Editar/Excluir</th></tr>";
      const vetorClientes = JSON.parse(this.responseText);

      if (!Array.isArray(vetorClientes)) {
        console.error("Erro: A resposta da API não é um array.");
        return;
      }

      for (let cliente of vetorClientes) {
        html += `<tr>`;
        html += `<td>${cliente.id_cliente}</td>`;
        html += `<td>${cliente.nome}</td>`;
        html += `<td>${cliente.email}</td>`;
        html += `<td>${cliente.sigla}</td>`;
        html += `<td>`;
        html += `<button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning" onClick="showClienteUpdForm(${cliente.id_cliente})"><i class="fa-solid fa-pencil"></i></button>`;
        html += `<button class="btn btn-danger" onClick="delCliente(${cliente.id_cliente});"><i class="fa-solid fa-trash-can"></i></button>`;
        html += `</td>`;
        html += `</tr>`;
      }
      
      html += "</table>";
      if (content) {
        content.innerHTML = html;
      } else {
        console.error("Elemento 'content' não encontrado.");
      }
    } else {
      alert(`Erro: ${req.status} ${req.statusText}`);
    }
  };

  req.open("GET", `busca-clientes.php?expressaoBusca=${expressaoBusca}`);
  req.send();
}

// Função para limpar busca
function limparBusca() {
  const expressaoBusca = document.getElementById('expressaoBusca');
  if (expressaoBusca) {
    expressaoBusca.value = '';  // Limpa o valor do campo de busca
    buscaClientes();  // Recarrega todos os clientes
  } else {
    console.error("Elemento 'expressaoBusca' não encontrado.");
  }
}

function showClienteUpdForm(id_cliente) {
  console.log("Entrou na função showClienteUpdForm com código:", id_cliente);

  let xhr = new XMLHttpRequest();
  xhr.onload = function () {
    if (xhr.status == 200) {
      console.log("Dados do cliente para atualização:", xhr.responseText);
      let cliente = JSON.parse(xhr.responseText)[0];
      console.log("Cliente:", cliente);
      const frm = document.getElementById("frmAlterarCliente");

      // Verificar se o formulário foi encontrado corretamente
      if (!frm) {
        console.error("Formulário de atualização não encontrado.");
        return;
      }

      frm.id_cliente.value = cliente.id_cliente;
      frm.nome.value = cliente.nome;
      frm.email.value = cliente.email;

      carregarUFs("uUf"); // Carregar UFs antes de definir o valor

      // Espera para definir o UF após carregar as opções
      setTimeout(() => {
        frm.id_uf.value = cliente.id_uf;
      }, 100);

      // Mostra o modal após carregar os dados
      bootstrap.Modal.getOrCreateInstance(document.getElementById("exampleModal")).show();
    } else {
      console.error("Erro ao buscar cliente:", xhr.status, xhr.statusText);
    }
  };

  xhr.open("GET", `cliente-get.php?id_cliente=${id_cliente}`);
  xhr.send();
}

btnAtualizar.addEventListener("click", (e) => {
  e.preventDefault(); // Previne o comportamento padrão do botão

  console.log("btnAtualizar.addEventListener");

  const frm = document.getElementById("frmAlterarCliente");

  // Verificar se o formulário foi encontrado corretamente
  if (!frm) {
    console.error("Formulário de atualização não encontrado.");
    return;
  }

  let cliente = new FormData(frm);

  let xhr = new XMLHttpRequest();
  xhr.onload = function () {
    console.log("Resposta ao atualizar cliente:", xhr.responseText);
    if (xhr.status == 200) {
      buscaClientes(); // Atualiza a lista de clientes
      alert("Atualização Ok");
      bootstrap.Modal.getOrCreateInstance(document.getElementById("exampleModal")).hide(); // Fecha o modal após atualização
    } else {
      alert("Erro ao atualizar cliente.");
    }
  };

  xhr.open("POST", "cliente-update.php");
  xhr.send(cliente);
});

// Função para excluir um cliente
function delCliente(id_cliente) {
  console.log("Excluindo cliente com ID:", id_cliente);  // Log para verificar o ID do cliente

  if (confirm("Confirma a exclusão do registro?")) {
    let data = new FormData();
    data.append("id_cliente", id_cliente);

    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
      console.log("Resposta da exclusão:", xhr.responseText);  // Log da resposta para verificar possíveis erros
      if (xhr.status == 200) {
        alert("Exclusão Ok");
        buscaClientes(); // Atualiza a lista de clientes
      } else {
        alert(`Erro: ${xhr.status} ${xhr.statusText}`);
        console.error("Erro na exclusão:", xhr.responseText);  // Log para depuração
      }
    };

    xhr.onerror = function () {
      console.error("Erro de rede ao tentar excluir o cliente.");
    };

    xhr.open("POST", "cliente-delete.php"); 
    xhr.send(data);
  }
}

function carregarUFs(elementId) {
  var elemSelectUf = document.getElementById(elementId);
  if (elemSelectUf) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
      if (xhr.status == 200) {
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
    xhr.send();
  } else {
    console.error(`Elemento com id '${elementId}' não encontrado.`);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  carregarUFs("inUf"); // Carregar UFs para o formulário de inclusão
  carregarUFs("upUf"); // Carregar UFs para o formulário de atualização
  buscaClientes(); // Carregar clientes ao inicializar a página
});
