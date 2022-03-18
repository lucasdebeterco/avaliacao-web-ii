<?php
    if (isset($_POST['deletar'])) {
        try {
            $stmt = $conn->prepare(
                'DELETE FROM regiao WHERE IDRegiao = :id');
            $stmt->execute(array('id' => $_GET['id']));
            header("location: index.php?modulo=regiao&pagina=listagem"); 
            exit();
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
    <input type="text" name="nome" value="<?=$r[0]['DescricaoRegiao']?>" disabled>
    Deseja realmente excluír esse cadastro?
    <input type="submit" name="deletar" value="Confirmar">
</form>

