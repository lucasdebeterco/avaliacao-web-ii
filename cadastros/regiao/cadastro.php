<?php
    if (isset($_POST['gravar'])) {
        try {

            $stmtAI = $conn->prepare('SELECT * FROM regiao');
            $stmtAI->execute();
            $resultAI = $stmtAI->fetchAll();
            $AI = 1;

            if (count($resultAI) > 0) {
                $AI = count($resultAI) + 1;
            }

            $stmt = $conn->prepare(
                'INSERT INTO regiao (IDRegiao, DescricaoRegiao) values (:AI ,:nome)'); 
            $stmt->execute(array('AI' => $AI ,'nome' => $_POST['nome']));
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
?>
<form method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="nome">
    </div>
    <input type="submit" name="gravar" value="Gravar">
</form>
