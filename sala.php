<?php
include_once("lib/php/header.php");  
include_once("lib/php/conexao.dao.php");

/*if(!isset($_SESSION['user']))
{
	echo "<script>location.href = 'index.php';</script>";
}*/

if(!isset($_REQUEST['sala']))
{
    echo "<script>window.alert('Nenhum id de sala selecionado, selecione uma sala para poder participar do jogo.')</script>";
    header("location: menu.php");
}

$sala = $_REQUEST['sala'];

$sqlSala = "SELECT * FROM forca_sala S, forca_tema T WHERE S.ID_TEMA = T.ID_TEMA AND S.ID_SALA = ?0";

$param = array($sala);
$dados = Conexao::ExecutarQuery($sqlSala, $param);

$sqlPalavras = "SELECT * FROM forca_palavra P WHERE P.ID_TEMA = ?0";

$param = array($dados[1]['id_tema']);
$palavras = Conexao::ExecutarQuery($sqlPalavras, $param);

$rand = rand(1, count($palavras));

$palavraSelecionada = $palavras[$rand]['palavra'];
$dicas = $palavras[$rand]['dicas'];
$arrPalavra = str_split($palavraSelecionada);
$numeroDeLetras = count($arrPalavra);
?>

<style>
    .letras-jogo
    {
        overflow: hidden;
        padding: 15px;
        font-weight: bold;
        font-size: 20px;
        background-size: cover;
        border-radius: 10px;
        text-shadow: 4px 4px 2px black;
        transition-duration: 0.4s;
        display: inline-block;
        background-color: black;
        color: white;
    }

    .letras-selecao
    {
        overflow: hidden;
        padding: 10px;
        font-weight: bold;
        font-size: 18px;
        background-size: cover;
        border-radius: 10px;
        transition-duration: 0.4s;
        display: inline-block;
        background-color: blue;
        color: white;
    }
    .letras-selecao:hover 
    {
        background-color: green;

    }
        
</style>

<script>
    const palavraCompleta = '<?=$palavraSelecionada?>';
    const arrPalavra = palavraCompleta.split('');

    function VerificarLetra()
    {

    }
</script>


<div class="container">
    <div class="dashboard" style="margin-top: 3%;" align="center">
        <div class="row">
            <div class="col-sm-12">
                <?php $i = 0; while($i < $numeroDeLetras):?>
                    <div class="letras-jogo" id="letra<?=$i?>">
                        <?=$arrPalavra[$i]?>
                    </div>
                <?php $i++; endwhile?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10" align="center" style="margin-top: 46%;">
                <div class="letras-selecao" onclick="VerificarLetra('A')">A</div>
                <div class="letras-selecao" onclick="VerificarLetra('B')">B</div>
                <div class="letras-selecao" onclick="VerificarLetra('C')">C</div>
                <div class="letras-selecao" onclick="VerificarLetra('D')">D</div>
                <div class="letras-selecao" onclick="VerificarLetra('E')">E</div>
                <div class="letras-selecao" onclick="VerificarLetra('F')">F</div>
                <div class="letras-selecao" onclick="VerificarLetra('G')">G</div>
                <div class="letras-selecao" onclick="VerificarLetra('H')">H</div>
                <div class="letras-selecao" onclick="VerificarLetra('I')">I</div>
                <div class="letras-selecao" onclick="VerificarLetra('J')">J</div>
                <div class="letras-selecao" onclick="VerificarLetra('K')">K</div>
                <div class="letras-selecao" onclick="VerificarLetra('L')">L</div>
                <div class="letras-selecao" onclick="VerificarLetra('M')">M</div>
                <div class="letras-selecao" onclick="VerificarLetra('N')">N</div>
                <div class="letras-selecao" onclick="VerificarLetra('O')">O</div>
                <div class="letras-selecao" onclick="VerificarLetra('P')">P</div>
                <div class="letras-selecao" onclick="VerificarLetra('Q')">Q</div>
                <div class="letras-selecao" onclick="VerificarLetra('R')">R</div>
                <div class="letras-selecao" onclick="VerificarLetra('S')">S</div>
                <div class="letras-selecao" onclick="VerificarLetra('T')">T</div>
                <div class="letras-selecao" onclick="VerificarLetra('U')">U</div>
                <div class="letras-selecao" onclick="VerificarLetra('V')">V</div>
                <div class="letras-selecao" onclick="VerificarLetra('W')">W</div>
                <div class="letras-selecao" onclick="VerificarLetra('X')">X</div>
                <div class="letras-selecao" onclick="VerificarLetra('Y')">Y</div>
                <div class="letras-selecao" onclick="VerificarLetra('Z')">Z</div>
            </div>

            <div class="col-sm-2" style="margin-top: 46%;">
                <button class="btn btn-warning" style="width: 100%;">Dica</button>
                <br><br>
                <button class="btn btn-danger" style="width: 100%;">Desistir</button>
            </div>
        </div>
    </div>
</div>