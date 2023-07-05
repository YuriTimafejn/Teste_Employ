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

function divFormEdicao (id, task) {
    const div = capturaDivForm();
    const btnSalvar = capturaButton('salvar');
    const btnConcluir = capturaButton('concluir');
    const btnExcluir = capturaButton('excluir');

    console.log(task); return;

    document.querySelector('input[name="dataInsercao"]').value = task.dataStart;
    document.querySelector('input[name="dataConclusao"]').value = task.dateFinished;
    document.querySelector('input[name="descricao"]').value = task.description;
    document.querySelector('input[name="local"]').value = task.locale;
    document.querySelector('textarea[name="notas"]').value = task.notes;

    btnSalvar.style.display = 'none';
    btnExcluir.style.display = 'flex';
    btnConcluir.style.display = 'flex';
    div.style.display = 'flex';
}
function divFormFechar() {
    const div = document.getElementById('form-tarefa');

    div.style.display = 'none';
}