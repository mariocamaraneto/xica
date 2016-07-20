<div class="funcionarios index large-9 medium-8 columns content">
<br>
    <h3>Relatório de todos Funcionários</h3>
    <br><br>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= 'Nome' ?></th>
                <th><?= 'Login' ?></th>
                <th><?= 'Telefone'?></th>
                <th><?= 'Adimin' ?></th>
                <th><?= 'Ativo' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $funcionario): ?>
            <tr>
                <td><?= h($funcionario->nome_completo) ?></td>
                <td><?= h($funcionario->nome_login) ?></td>
                <td><?= h($funcionario->telefone) ?></td>
                <td><?= h( ($funcionario->admin) ? "Sim" : "Não") ?></td>
                <td><?= h( ($funcionario->ativo) ? "Sim" : "Não") ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
