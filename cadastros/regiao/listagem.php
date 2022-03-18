<?php
    if (isset($_GET['id']))
        $id = $_GET['id'];
 
    try {
        if (isset($id)) {
            $stmt = $conn->prepare('SELECT * FROM regiao WHERE id = :IDRegiao');
            $stmt->bindParam(':IDRegiao', $id, PDO::PARAM_INT);
        } else {
            $stmt = $conn->prepare('SELECT * FROM regiao');
        }

        $stmt->execute();
        $result = $stmt->fetchAll();
?>
<table border="1" class="table table-striped">
    <tr>
        <td>Id</td>
        <td>Descrição</td>
    </tr>
    <?php
        if (count($result) ) {
            foreach($result as $row) {
                ?>
                <tr>
                    <td><?=$row['DescricaoRegiao']?></td>
                    <td>
                        <a href="?modulo=regiao&pagina=alterar&id=<?=$row['IDRegiao']?>">Alterar</a>
                        <a href="?modulo=regiao&pagina=deletar&id=<?=$row['IDRegiao']?>">Deletar</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "Nenhum resultado retornado.";
        }
    ?>
</table>
<?php
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
?>