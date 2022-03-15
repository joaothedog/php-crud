<?php
//sessao
session_start();
if(isset($_SESSION['mensagem'])): ?> <!--se existir a sessao ele exibe-->
    <script>
    //msg com javascript de erro ou sucesso
    window.onload = function(){
        M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'})
    };
</script>
<?php    
endif;
session_unset();
?>