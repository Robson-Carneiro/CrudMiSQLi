<?php 
include './includes/Header.php'; 
/*include("Class/ClassCrud.php");*/
include __DIR__ . "./Class/ClassCrud.php"; 
?>

    <div class="Content">     
        <table class="TabelaCrud">
            <tr> 
                <td>Nome</td>
                <td>Sexo</td>
                <td>Cidade</td>
                <td>Ações</td>

            </tr>
            
            <!-- Estrutura de loop -->
            <?php
                $Crud=new ClassCrud();
                $BFetch=$Crud->selectDB(
                    "*",
                    "cadastro",
                    "",
                    "",
                    array()
                );

                while($Result=$BFetch->fetch_all()){
                    foreach($Result as $Fetch) {
            ?>
                <tr>
                    <td><?php echo $Fetch[1]; ?></td>
                    <td><?php echo $Fetch[2]; ?></td>
                    <td><?php echo $Fetch[3]; ?></td>
                    <td>
                        <a href="<?php echo "visualizar.php?id={$Fetch[0]}"; ?>">
                            <img src="imagens/Visualizar.png" alt="Visualizar">
                        </a>
                        <a href="<?php echo "cadastro.php?id={$Fetch[0]}"; ?>">
                            <img src="imagens/Edite.png" alt="Editar">
                        </a>
                        <a class="Deletar" href="<?php echo "Controllers/ControllerDeletar.php?id={$Fetch[0]}"; ?>">
                            <img src="imagens/Lixeira.png" alt="Deletar">
                        </a>
                    </td>
                </tr>

                
                <?php
                }
            }
            ?>
        </table>
    </div>
<?php include("includes/Footer.php"); ?>