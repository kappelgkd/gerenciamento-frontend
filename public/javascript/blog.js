let ckeditorInstance;

// Inicializa CKEditor ao carregar a página
document.addEventListener('DOMContentLoaded', () => {
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            ckeditorInstance = editor;

            // Ajuste extra para forçar a altura do editor (editor principal)
            editor.ui.view.editable.element.style.height = '350px';
            editor.ui.view.editable.element.style.minHeight = '350px';
        })
        .catch(error => {
            console.error('Erro ao iniciar CKEditor:', error);
        });
});

// Evento ao abrir o modal
document.getElementById('modalEditor').addEventListener('shown.bs.modal', carregarTiposDeConteudo);

// Carrega tipos de conteúdo (radio buttons)
async function carregarTiposDeConteudo() {
    try {
        const token = localStorage.getItem('token');
        const response = await fetch('https://api.kappelgkd.com.br/listar-tipo', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            }
        });

        if (!response.ok) throw new Error(`Erro HTTP: ${response.status}`);

        const dados = await response.json();
        const container = document.getElementById('container-tipos');
        container.innerHTML = '<label class="form-label fw-semibold d-block mb-2">Tipo de Conteúdo</label>';

        Object.keys(dados).forEach(key => {
            if (!isNaN(key)) {
                const tipo = dados[key];
                const radio = `
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo" id="tipo${tipo.id}" value="${tipo.id}" required>
                            <label class="form-check-label" for="tipo${tipo.id}">${tipo.tipo_conteudo}</label>
                        </div>`;
                container.insertAdjacentHTML('beforeend', radio);
            }
        });
    } catch (error) {
        console.error('Erro ao carregar tipos de conteúdo:', error);
    }
}

// Submit do formulário
document.getElementById('formConteudo').addEventListener('submit', async function (e) {
    e.preventDefault();

    const token = localStorage.getItem('token');
    const tituloInput = document.getElementById('titulo');
    const tipoInput = document.querySelector('input[name="tipo"]:checked');

    if (!tituloInput || !tipoInput || !ckeditorInstance) {
        alert('Preencha todos os campos obrigatórios.');
        return;
    }

    const titulo = tituloInput.value.trim();
    const tipo = tipoInput.value;
    const conteudo = ckeditorInstance.getData().trim();

    if (!titulo || !tipo || !conteudo) {
        alert('Preencha todos os campos obrigatórios.');
        return;
    }

    const payload = { titulo, tipo, conteudo };

    try {
        const response = await fetch('https://api.kappelgkd.com.br/cadastrar-conteudo', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(payload)
        });

        const data = await response.json();

        if (response.ok) {
            alert(data.message || 'Conteúdo cadastrado com sucesso!');

            const modalEl = document.getElementById('modalEditor');
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.hide();

            document.getElementById('formConteudo').reset();
            ckeditorInstance.setData('');
            window.location.href = '/blog';

            if (typeof iniciar === 'function') iniciar();
        } else {
            alert(data.message || 'Erro ao cadastrar conteúdo.');
        }
    } catch (error) {
        console.error('Erro ao enviar conteúdo:', error);
        alert('Erro ao enviar dados para o servidor.');
    }
});


let paginaAtual = 1;
const itensPorPagina = 5;
let todosOsItens = [];

const token = localStorage.getItem('token');

async function buscarItensDaAPI() {
    try {
        const response = await fetch('https://api.kappelgkd.com.br/listar-conteudo', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            }
        });

        if (!response.ok) {
            throw new Error(`Erro HTTP: ${response.status}`);
        }
        // console.log(response.status);
        if (response.status != 200) {
            return [];
        }
        // Garante que a resposta não está vazia antes de fazer .json()

        const data = await response.json();

        if (!Array.isArray(data) || data.length === 0) return [];

        return data.map(item => ({
            titulo: item.titulo,
            conteudo: atob(item.conteudo),
            autor: `ID ${item.autor}`,
            data: item.criado_em.split(' ')[0],
            tipo: `Tipo ${item.tipo}`
        }));

    } catch (error) {
        console.error('Erro ao buscar dados da API:', error);
        return [];
    }
}

function renderizarItens() {
    const container = document.getElementById('list-group');
    container.innerHTML = '';

    const inicio = (paginaAtual - 1) * itensPorPagina;
    const fim = inicio + itensPorPagina;
    const itensPagina = todosOsItens.slice(inicio, fim);

    if (todosOsItens.length === 0) {
        const aviso = document.createElement('div');
        aviso.className = 'alert alert-warning text-center w-100';
        aviso.textContent = 'Nenhum conteúdo disponível no momento.';
        container.appendChild(aviso);
        return;
    }

    itensPagina.forEach(item => {
        const col = document.createElement('div');
        col.className = 'col-12';

        const card = document.createElement('div');
        card.className = 'card card-post shadow-sm border-0';

        const body = document.createElement('div');
        body.className = 'card-body d-flex flex-column';

        const conteudoCortado = item.conteudo.length > 150
            ? item.conteudo.substring(0, 150) + '...'
            : item.conteudo;

        body.innerHTML = `
                <div class="autor-data">
                    ${item.autor} &nbsp;•&nbsp;
                    ${item.data} &nbsp;•&nbsp;
                    ${item.tipo}
                </div>
                <div class="titulo-post">${item.titulo}</div>
                <div class="conteudo-post">${conteudoCortado}</div>
                <div class="ver-mais-container">
                    <button class="ver-mais-btn">Ver mais</button>
                </div>
            `;

        // Adiciona evento para o botão "Ver mais"
        const btnVerMais = body.querySelector('.ver-mais-btn');
        btnVerMais.addEventListener('click', () => {
            alert(item.conteudo);
        });

        card.appendChild(body);
        col.appendChild(card);
        container.appendChild(col);
    });
}

function renderizarPaginacao() {
    const totalPaginas = Math.ceil(todosOsItens.length / itensPorPagina);
    const paginacao = document.getElementById('paginacao');
    paginacao.innerHTML = '';

    const anterior = document.createElement('li');
    anterior.className = `page-item ${paginaAtual === 1 ? 'disabled' : ''}`;
    anterior.innerHTML = `<a class="page-link" href="#">Anterior</a>`;
    anterior.onclick = e => {
        e.preventDefault();
        if (paginaAtual > 1) {
            paginaAtual--;
            atualizarExibicao();
        }
    };
    paginacao.appendChild(anterior);

    for (let i = 1; i <= totalPaginas; i++) {
        const li = document.createElement('li');
        li.className = `page-item ${paginaAtual === i ? 'active' : ''}`;
        li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        li.onclick = e => {
            e.preventDefault();
            paginaAtual = i;
            atualizarExibicao();
        };
        paginacao.appendChild(li);
    }

    const proximo = document.createElement('li');
    proximo.className = `page-item ${paginaAtual === totalPaginas ? 'disabled' : ''}`;
    proximo.innerHTML = `<a class="page-link" href="#">Próximo</a>`;
    proximo.onclick = e => {
        e.preventDefault();
        if (paginaAtual < totalPaginas) {
            paginaAtual++;
            atualizarExibicao();
        }
    };
    paginacao.appendChild(proximo);
}

function atualizarExibicao() {
    renderizarItens();
    renderizarPaginacao();
}

async function iniciar() {
    if (!verificarToken()) {
        window.location.href = '/login';
    }
    todosOsItens = await buscarItensDaAPI();
    atualizarExibicao();
}

document.addEventListener("DOMContentLoaded", iniciar);

// codigo para funcionamento do ckeditor
// let editorInstance;

// document.addEventListener("DOMContentLoaded", () => {
//     ClassicEditor
//         .create(document.querySelector('#editor'), {
//             toolbar: [
//                 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
//                 'undo', 'redo', 'blockQuote'
//             ],
//             placeholder: 'Digite o conteúdo aqui...'
//         })
//         .then(editor => {
//             editorInstance = editor;
//         })
//         .catch(error => {
//             console.error('Erro ao inicializar CKEditor:', error);
//         });
// });

// // Exemplo de como pegar o conteúdo ao submeter o form
// document.getElementById('formConteudo').addEventListener('submit', function (e) {
//     e.preventDefault();

//     const titulo = document.getElementById('titulo').value;
//     const tipo = document.getElementById('tipo').value;
//     const conteudo = editorInstance.getData();

//     console.log({ titulo, tipo, conteudo });

//     // Aqui você pode fazer o envio do conteúdo para sua API
//     // fetch(...)

//     // Fechar modal e limpar campos
//     const modal = bootstrap.Modal.getInstance(document.getElementById('modalEditor'));
//     modal.hide();
//     this.reset();
//     editorInstance.setData('');
// });
// fim codigo ckeditor

// bloco de código que faz o envio do formulário do modal de cadastrar conteudo

