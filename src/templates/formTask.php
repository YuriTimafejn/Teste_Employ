<div class="info-tarefa" id="form-tarefa">
    <div class="div-fechar">
        <div id="fechar">
            <button class="btn btn-fechar" onclick="divFormFechar()">X</button>
        </div>
    </div>

    <input type="hidden" name="idTarefa" id="idTarefa">
    <input type="hidden" name="dataInsercao" id="dataInsercao">
    <input type="hidden" name="dataConclusao" id="dataConclusao">
    <div class="input-form"><input type="text" placeholder="Descrição" id="descricao" name="descricao"></div>
    <div class="input-form"><input type="text" placeholder="Local" id="local" name="local"></div>
    <div class="input-form"><textarea name="notas" id="notas" cols="30" rows="10" placeholder="NOTAS"></textarea></div>

    <div class="opcoes">
        <div><input type="button" id="btn-concluir" value="Marcar como concluido" class="btn"></div>
        <div><input type="button" id="btn-excluir" value="Excluir" class="btn"></div>
        <div><input type="button" id="btn-salvar" value="Salvar" class="btn"></div>
    </div>
</div>
