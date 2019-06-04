<?php session_start();?>

<?php

include("conexao.dao.php");
include_once("monta-sessao.php");

$i = 1; 
while($i <= count($dadosSessao)){
    if($dadosSessao[$i]['id_usuario'] == $_SESSION['user']['id_usuario'] || $dadosSessao[$i]['id_adversario'] == $_SESSION['user']['id_usuario']){
        echo "<script>location.href = 'sala.php';</script>";
    }
 $i++;   
}

?>
        
        <?php $i = 1; while($i <= count($dadosSessao)): ?>
        
            <style>
                .jogo-img<?=$i?>
                {
                    background-image: url("img/themes/<?php echo $dadosSessao[$i]['id_tema']?>.jpg");
                }
                (<?=$dadosSessao[$i]['id_tema']?>
                /*.jogo-img<?=$i?>:hover
                {
                    background-image: url("https://img.freepik.com/fotos-gratis/fundo-do-interior-com-uma-parede-do-grunge-e-assoalho_1048-3834.jpg?size=338&ext=jpg");
                }*/
                 
                
            </style>
         
        <?php if($dadosSessao[$i]['privada'] == 'n'):?>
            <div class="jogo jogo-img<?=$i?>" onclick="SelecionarSala(<?=$dadosSessao[$i]['id_sala']?>,<?=$dadosSessao[$i]['id_usuario']?>,<?=$dadosSessao[$i]['id_tema']?>)" align="center">
                Tema: <?=strtoupper($dadosSessao[$i]['tema'])?> <br>
                Criador: <?=strtoupper($dadosSessao[$i]['login'])?> <br>
                (Publico)
            </div>
        <?php else:?>
            <div class="jogo jogo-img<?=$i?>" onclick="SelecionarSala(<?=$dadosSessao[$i]['id_sala']?>,<?=$dadosSessao[$i]['id_usuario']?>,<?=$dadosSessao[$i]['id_tema']?> ,'<?=$dadosSessao[$i]['senha_sala']?>')" align="center">
                Tema: <?=strtoupper($dadosSessao[$i]['tema'])?> <br>
                Criador: <?=strtoupper($dadosSessao[$i]['login'])?> <br>
                (Privado)
            </div>
        </div>
        <?php endif?>

        <?php $i++; endwhile?>
    