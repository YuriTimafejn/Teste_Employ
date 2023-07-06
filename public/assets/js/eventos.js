function capturaDivForm() {
    return document.getElementById('form-tarefa');
}

function capturaButton(tipo) {
    return document.getElementById('btn-' + tipo);
}

function divFormNovo () {
    const div = capturaDivForm();
    const btnConcluir = capturaButton('concluir');
    const btnExcluir = capturaButton('excluir');
    const btnSalvar = capturaButton('salvar');

    btnExcluir.style.display = 'none';
    btnConcluir.style.display = 'none';
    btnSalvar.style.display = 'flex';
    div.style.display = 'flex';
}

function divFormEdicao (id) {
    const div = capturaDivForm();
    const btnSalvar = capturaButton('salvar');
    const btnConcluir = capturaButton('concluir');
    const btnExcluir = capturaButton('excluir');

    let json = auxPopulaForm(id);
    console.log(json);

    btnSalvar.style.display = 'none';
    btnExcluir.style.display = 'flex';
    btnConcluir.style.display = 'flex';
    div.style.display = 'flex';
}
function divFormFechar() {
    const div = document.getElementById('form-tarefa');

    div.style.display = 'none';
}

async function auxPopulaForm(id)
{
    const url = "/operacoes/" + id;

    try {
        const resposta = await fetch(url);

        if (resposta.ok)
            return resposta.json();
    } catch (error) {
        throw new Error(error.getError());
    }
}

function populaForm (json)
{
    const dataInicio = document.getElementById();
}