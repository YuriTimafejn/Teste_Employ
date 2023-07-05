function dataAtual() {
    const elementoDataAtual = document.querySelector('.dataAtual');
    const dataAgora = new Date();

    const dia = dataAgora.getDate();
    const mes = dataAgora.getMonth() +1;
    const ano = dataAgora.getFullYear();

    const dataFormatada = `${dia.toString().padStart(2, '0')}/${mes.toString().padStart(2, '0')}/${ano}`;

    elementoDataAtual.textContent = `Tarefas de hoje: ${dataFormatada}`;
}

dataAtual();