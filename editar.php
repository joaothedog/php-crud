<?php
//Editar
//conexao
include_once 'php_action/db_connect.php';

//header
include_once 'includes/header.php';

//select
if(isset($_GET['id'])): //verifica o id atraves da url
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
    <div class="col s12 m6 push-m3"> <!--col s12 smartphone m6 tablet e push-m3 compensar-->
    <h3 class="light">Editar cliente</h3>    
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];
                ?>">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome'];
                ?>">
                <label for="sobrenome">Sobrenome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email'];
                ?>">
                <label for="email">Email</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade'];
                ?>">
                <label for="idade">Idade</label>
            </div>

            <a href="index.php" class="btn">Voltar</a>
            <button type="submit" name="btn-editar" class="btn green">Atualizar</button>
        </form>
    </div>
</div>


<?php
//footer
include_once 'includes/footer.php';
?>