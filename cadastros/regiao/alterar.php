<?php
    if (isset($_POST['alterar'])) {
        try {
            $stmt = $conn->prepare(
                'UPDATE regiao SET DescricaoRegiao = :nome WHERE IDRegiao = :id');
            $stmt->execute(array('nome' => $_POST['nome'], 'id' => $_GET['id']));              
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
 
    if (isset($_GET['id'])) {
        $stmt = $conn->prepare('SELECT * FROM regiao WHERE IDRegiao = :id');
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    }
    
    $stmt->execute();
    $r = $stmt->fetchAll();
?>
<form method="post">
    <input type="text" name="nome" value="<?=$r[0]['DescricaoRegiao']?>">
    <input type="submit" name="alterar" value="Salvar">
</form>
