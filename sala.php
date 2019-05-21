<?php
include_once("lib/php/header.php");  
include_once("lib/php/conexao.dao.php");

/*if(!isset($_SESSION['user']))
{
	echo "<script>location.href = 'index.php';</script>";
}*/

/*if(!isset($_REQUEST['sala']))
{
    echo "<script>window.alert('Nenhum id de sala selecionado, selecione uma sala para poder participar do jogo.')</script>";
    header("location: menu.php");
}*/
//tirada if acima porque tu será feito pelo banco


include_once("lib/php/monta-partida.php");

$arrPalavra = str_split($dadosPalavra[1]['palavra']);
$numeroDeLetras = count($arrPalavra);
$dicas = explode(',', $dadosPalavra[1]['dicas']);

function BuscaLetra($item , $array , $num){
    for ($i = 1; $i <= $num; $i++){
        if($array[$i]['letra']==$item){
                return true;
        }
    }             
    return false;
} 

function Define_Style($item,$array,$num,$palavra){
    for ($i = 1; $i <= $num; $i++){
        if($array[$i]['letra']==$item){
            if(in_array($item, $palavra)){
                return 'letras-certas';
            }
            else{
                return 'letras-erradas';   
            }
        }
    }             
    return 'letras-selecao';
}
   
?>

<style>
    .letras-jogo
    {
        overflow: hidden;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 10px;
        padding-bottom: 10px;
        font-weight: bold;
        font-size: 18px;        
        background-size: cover;
        border-radius: 5px;
        border-color: #8B795E;
        border-style: solid;        
        transition-duration: 0.4s;
        display: inline-block;
        background-color: white;
        color: black;        
        text-shadow: 1px 1px 1px black; 
    }

    .letras-timer
    {
        overflow: hidden;
        padding: 15px;
        font-weight: bold;
        font-size: 28px;        
        background-size: cover;
        border-radius: 10px;
        border-color: black;
        border-style: solid;        
        transition-duration: 0.4s;
        display: inline-block;
        background-color: white;
        color: black;
    }
    .letras-geral
    {
        overflow: hidden;
        font-weight: bold;
        font-size: 20px;                         
        display: inline-block;        
        color: black;               
    }
    .letras-vit_det
    {
        overflow: hidden;
        font-weight: bold;
        font-size: 72px;                         
        display: inline-block;        
        color: black;               
    }

    .letras-waiting
    {
        overflow: hidden;
        font-weight: bold;
        font-size: 32px;                         
        display: inline-block;        
        color: black;               
    }

    .letras-waiting-play
    {
        overflow: hidden;
        font-weight: bold;
        font-size: 24px;                         
        display: inline-block;        
        color: black;               
    }

    .painel
    {
        width:100%;
        padding-top: 10px;        
        background-size: cover;
        border-radius: 5px;
        border-color: #8B795E;
        border-style: solid;   
        background-color: white;
        color: black;
        align-content: center;        
    }

    .letras-selecao
    {
        overflow: hidden;
        padding: 13px;
        font-weight: bold;
        font-size: 18px;
        background-size: cover;
        border-radius: 10px;
        transition-duration: 0.4s;
        display: inline-block;
        background-color: #686868;
        color: white;
        text-shadow: 1px 1px 1px black; 
    }
    .letras-erradas
    {
        overflow: hidden;
        padding: 13px;
        font-weight: bold;
        font-size: 18px;
        background-size: cover;
        border-radius: 10px;
        transition-duration: 0.4s;
        display: inline-block;
        background-color: red;
        color: white;
        text-shadow: 1px 1px 1px black; 
    }
    .letras-certas
    {
        overflow: hidden;
        padding: 13px;
        font-weight: bold;
        font-size: 18px;
        background-size: cover;
        border-radius: 10px;
        transition-duration: 0.4s;
        display: inline-block;
        background-color: blue;
        color: white;
        text-shadow: 1px 1px 1px black; 
    }
    .letras-selecao:hover 
    {
        background-color: #CDC1C5;

    }
        
</style>

<script>

    function VerificarLetra()
    {
        return true;
    }
    function AtualizaLetras()
    {

    }

</script>

<body>

<div class="container" style="margin-top:0px;padding-top: 0px">
    <div class="dashboard" align="center" style="margin-top:0px; margin-bottom:0px;">
        <div class="row" style="margin-top:5px; margin-bottom:5px;">
            <div class="col-sm-12">
                <?php $i = 0; while($i < $numeroDeLetras):?>
                    <div class="letras-jogo" id="letra<?=$i?>">                        
                        <?php if(BuscaLetra($arrPalavra[$i],$dadosLetras,count($dadosLetras))):?>               
                            <?=$arrPalavra[$i]?>
                        <?php else: ?>
                            &nbsp;
                        <?php endif?>
                    </div>
                <?php $i++; endwhile?>
                <br>                
            </div>
        </div>
        <div class="row" style="margin-top: 0px;width: 100%;" align="center">
            <div class="col-sm-3" align="center">                                           
                <?php if ($dadosPartida[1]['erros_usuario']==0):?> 
                    <img src="img/f1.jpeg" alt="Desafiado" height="240px" width="240px">
                <?php elseif($dadosPartida[1]['erros_usuario']==1): ?>
                    <img src="img/f2.jpeg" alt="Desafiado" height="240px" width="240px">
                <?php elseif($dadosPartida[1]['erros_usuario']==2): ?>
                    <img src="img/f3.jpeg" alt="Desafiado" height="240px" width="240px">
                <?php elseif($dadosPartida[1]['erros_usuario']==3): ?>
                    <img src="img/f4.jpeg" alt="Desafiado" height="240px" width="240px">
                <?php else: ?>
                    <img src="img/f5.jpeg" alt="Desafiado" height="240px" width="240px">                
                <?php endif?>      
                <p class="letras-geral" align="center">
                    <?=$dadosUsuario[1]['login']?>
                </p>  
            </div>
            <div class="col-sm-6 dashboard-tips" align="center" style="margin-top:0px; margin-bottom:30px;">
               <br>
               TEMA:
               <br>
               <?php
               echo($dadosPartida[1]['tema'])
               ?>
               <br>               
               <br>
               DICAS:
               <br>
                       <?php if ($dadosPartida[1]['id_usuario']==$_SESSION['user']['id_usuario']):?>
                            <?php if($dadosPartida[1]['dicas_usuario']>0):?>                                
                                <?=$dicas[1]?>
                            <?php endif?>                                                                       
                        <?php else: ?>
                            <?php if($dadosPartida[1]['dicas_adversario']>0):?>
                                <?=$dicas[1]?> 
                            <?php endif?>                    
                        <?php endif?>                   
                   <br>
                       <?php if ($dadosPartida[1]['id_usuario']==$_SESSION['user']['id_usuario']):?>
                            <?php if($dadosPartida[1]['dicas_usuario']>1):?>
                               <?=$dicas[2]?>
                            <?php endif?>                                                                       
                        <?php else: ?>
                            <?php if($dadosPartida[1]['dicas_adversario']>1):?>
                                <?=$dicas[2]?>
                            <?php endif?>                    
                        <?php endif?>      
                   <br>
                       <?php if ($dadosPartida[1]['id_usuario']==$_SESSION['user']['id_usuario']):?>
                            <?php if($dadosPartida[1]['dicas_usuario']>2):?>
                                <?=$dicas[3]?>
                            <?php endif?>                                                                       
                        <?php else: ?>
                            <?php if($dadosPartida[1]['dicas_adversario']>2):?>
                                <?=$dicas[3]?>  
                            <?php endif?>                    
                        <?php endif?> 
                     
            </div>
            <div class="col-sm-3" align="center">                                               
               <?php if ($dadosPartida[1]['erros_adversario']==0):?> 
                    <img src="img/f1.jpeg" alt="Desafiante" height="240px" width="240px">
                <?php elseif($dadosPartida[1]['erros_adversario']==1): ?>
                    <img src="img/f2.jpeg" alt="Desafiante" height="240px" width="240px">
                <?php elseif($dadosPartida[1]['erros_adversario']==2): ?>
                    <img src="img/f3.jpeg" alt="Desafiante" height="240px" width="240px">
                <?php elseif($dadosPartida[1]['erros_adversario']==3): ?>
                    <img src="img/f4.jpeg" alt="Desafiante" height="240px" width="240px">
                <?php else: ?>
                    <img src="img/f5.jpeg" alt="Desafiante" height="240px" width="240px">                
                <?php endif?>      
                <p class="letras-geral" align="center">
                    <?php if((isset($dadosAdversario[1]))): ?>                    
                        <?=$dadosAdversario[1]['login']?>
                    <?php endif?>                  
                </p> 
               
            </div>
        </div>
        <div class="row painel" style="margin-top: -20px;" align="center">
            <div class="col-sm-2" style="padding-left:40px;">
                <?php if ($dadosPartida[1]['id_vencedor']==0):?>
                    <?php if ($dadosPartida[1]['id_adversario']!=0 && $dadosPartida[1]['id_jogador_vez']==$_SESSION['user']['id_usuario']):?>
                        Sua Vez
                        <br>                
                        <p class="letras-timer">00:05</p>
                    <?php endif?>
                <?php endif?>
            </div>            
            <div class="col-sm-7" align="center">
                <?php if ($dadosPartida[1]['id_vencedor']==0):?>
                    <?php if ($dadosPartida[1]['id_adversario']!=0):?>
                        <?php if ($dadosPartida[1]['id_jogador_vez']!=$_SESSION['user']['id_usuario']):?>
                            <p class="letras-waiting-play">Aguardando Jogada do</p>
                            <br>
                            <p class="letras-waiting-play"> Adversário...</p>
                        <?php else: ?>                        
                            <div class=<?php echo(Define_Style("A",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="A" onclick="VerificarLetra('A')">A</div>
                            <div class=<?php echo(Define_Style("B",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="B" onclick="VerificarLetra('B')">B</div>
                            <div class=<?php echo(Define_Style("C",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="C" onclick="VerificarLetra('C')">C</div>
                            <div class=<?php echo(Define_Style("D",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="D" onclick="VerificarLetra('D')">D</div>
                            <div class=<?php echo(Define_Style("E",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="E" onclick="VerificarLetra('E')">E</div>
                            <div class=<?php echo(Define_Style("F",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="F" onclick="VerificarLetra('F')">F</div>
                            <div class=<?php echo(Define_Style("G",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="G" onclick="VerificarLetra('G')">G</div>
                            <div class=<?php echo(Define_Style("H",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="H" onclick="VerificarLetra('H')">H</div>
                            <div class=<?php echo(Define_Style("I",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="I" onclick="VerificarLetra('I')">I</div>
                            <div class=<?php echo(Define_Style("J",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="J" onclick="VerificarLetra('J')">J</div>
                            <div class=<?php echo(Define_Style("K",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="K" onclick="VerificarLetra('K')">K</div>
                            <div class=<?php echo(Define_Style("L",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="L" onclick="VerificarLetra('L')">L</div>
                            <div class=<?php echo(Define_Style("M",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> id="M" onclick="VerificarLetra('M')">M</div>
                            <br>
                            <div class=<?php echo(Define_Style("N",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('N')">N</div>
                            <div class=<?php echo(Define_Style("O",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('O')">O</div>
                            <div class=<?php echo(Define_Style("P",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('P')">P</div>
                            <div class=<?php echo(Define_Style("Q",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('Q')">Q</div>
                            <div class=<?php echo(Define_Style("R",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('R')">R</div>
                            <div class=<?php echo(Define_Style("S",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('S')">S</div>
                            <div class=<?php echo(Define_Style("T",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('T')">T</div>
                            <div class=<?php echo(Define_Style("U",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('U')">U</div>
                            <div class=<?php echo(Define_Style("V",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('V')">V</div>
                            <div class=<?php echo(Define_Style("W",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('W')">W</div>
                            <div class=<?php echo(Define_Style("X",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('X')">X</div>
                            <div class=<?php echo(Define_Style("Y",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('Y')">Y</div>
                            <div class=<?php echo(Define_Style("Z",$dadosLetras,count($dadosLetras),$arrPalavra)) ?> onclick="VerificarLetra('Z')">Z</div>                       
                        <?php endif?>
                    <?php else: ?>
                        <br>
                        <p class="letras-waiting">Aguardando Adversário...</p>
                    <?php endif?>
                <?php elseif($dadosPartida[1]['id_vencedor']==$_SESSION['user']['id_usuario']): ?>                        
                        <p class="letras-vit_det">Você venceu!</p>                        
                <?php else: ?>
                        
                        <p class="letras-vit_det">Você perdeu!</p>
                <?php endif?>                 
            </div>

            <div class="col-sm-3" style="padding-right:15px;padding-top: 6px;">                
                <button class="btn btn-warning" style="width: 80%;">Dica</button>
                <br><br>
                <button class="btn btn-danger" style="width: 80%;">Desistir</button>
            </div>
        </div>
    </div>
</div>
</body>