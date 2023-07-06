function capturaDivForm() {
    return document.getElementById('form-tarefa');
}

function limparForm() {
    const idTarefa = document.getElementById('idTarefa')
    const dataInicio = document.getElementById('dataInsercao');
    const dataFinalizacao = document.getElementById('dataConclusao');
    const descricao = document.getElementById('descricao');
    const local = document.getElementById('local');
    const notas = document.getElementById('notas');

    idTarefa.value = "";
    dataInicio.value = "";
    dataFinalizacao.value = "";
    descricao.value = "";
    local.value = "";
    notas.value = "";
}

function capturaButton(tipo) {
    return document.getElementById('btn-' + tipo);
}

function divFormNovo () {
    const div = capturaDivForm();
    const btnConcluir = capturaButton('concluir');
    const btnExcluir = capturaButton('excluir');
    const btnSalvar = capturaButton('salvar');

    limparForm();

    document.getElementById('idTarefa').value = '0';

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

    let json = dadosParaPopulaForm(id);
    //console.log(json);

    btnSalvar.style.display = 'flex';
    btnExcluir.style.display = 'flex';
    btnConcluir.style.display = 'flex';
    div.style.display = 'flex';
}

function divFormFinalizado(id) {
    const div = capturaDivForm();
    const btnSalvar = capturaButton('salvar');
    const btnConcluir = capturaButton('concluir');
    const btnExcluir = capturaButton('excluir');

    let json = dadosParaPopulaForm(id);
    //console.log(json);

    btnSalvar.style.display = 'none';
    btnExcluir.style.display = 'none';
    btnConcluir.style.display = 'none';
    div.style.display = 'flex';
}
function divFormFechar() {
    const div = document.getElementById('form-tarefa');

    div.style.display = 'none';
}

async function dadosParaPopulaForm(id)
{
    const url = "/operacoes/" + id;

    try {
        const resposta = await fetch(url);

        if (resposta.ok)
        {
            const retorno = await resposta.json();
            populaForm(retorno);
        } else {
            throw new Error('Erro nos dados recebidos');
        }
    } catch (error) {
        console.error(error);
    }
}

function populaForm (json)
{
    const idTarefa = document.getElementById('idTarefa')
    const dataInicio = document.getElementById('dataInsercao');
    const dataFinalizacao = document.getElementById('dataConclusao');
    const descricao = document.getElementById('descricao');
    const local = document.getElementById('local');
    const notas = document.getElementById('notas');

    idTarefa.value = json.id;
    dataInicio.value = json.dataStart;
    dataFinalizacao.value = json.dataFinished;
    descricao.value = json.description;
    local.value = json.locale;
    notas.value = json.notes;
}

async function marcarComoConcluido(id) {
    const url = `/operacoes/${id}/concluir`;

    try {
        const resposta = await fetch(url, { method: 'POST' });
        if (resposta.ok) {
            console.log('Tarefa concluída com sucesso!');
            location.reload();
        } else {
            console.error('Erro ao marcar a tarefa como concluída.');
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
    }
}

async function excluirTarefa(id) {
    const url = `/operacoes/${id}/excluir`;

    try {
        const resposta = await fetch(url, { method: 'POST' });
        if (resposta.ok) {
            console.log('Tarefa excluída com sucesso!');
            location.reload();
        } else {
            console.error('Erro ao excluir a tarefa.');
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
    }
}

async function salvarTarefa(id) {
    const url = `/operacoes/${id}/salvar`;

    const idTarefa = document.getElementById('idTarefa').value;
    const dataInicio = document.getElementById('dataInsercao').value;
    const dataFinalizacao = document.getElementById('dataConclusao').value;
    const descricao = document.getElementById('descricao').value;
    const local = document.getElementById('local').value;
    const notas = document.getElementById('notas').value;

    let info = {
        id: idTarefa,
        dataInicio: dataInicio,
        dataFinalizacao: dataFinalizacao,
        descricao: descricao,
        local: local,
        notas: notas
    };
    //console.log(info); return;

    try {
        const resposta = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(info)
        });
        if (resposta.ok) {
            console.log('Tarefa salva com sucesso!');
            location.href = '/';
        } else {
            console.error('Erro ao salvar a tarefa.');
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
    }
}

document.getElementById('btn-concluir').addEventListener('click', async () => {
    const idTarefa = document.getElementById('idTarefa').value;
    await marcarComoConcluido(idTarefa);
});

document.getElementById('btn-excluir').addEventListener('click', async () => {
    const idTarefa = document.getElementById('idTarefa').value;
    if (confirm("Deseja realmente excluir essa tarefa?"))
        await excluirTarefa(idTarefa);
});

document.getElementById('btn-salvar').addEventListener('click', async () => {
    const idTarefa = document.getElementById('idTarefa').value;
    await salvarTarefa(idTarefa);
});