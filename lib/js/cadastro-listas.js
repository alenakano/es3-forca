function RealizarCadastro(tipoCadastro = null)
{
    if(tipoCadastro == 'tema')
    {
        var tema = $("input[name='tema']").val()
        {
            if(tema == "")
            {
                window.alert("É preciso digitar um tema para cadastra-lo. \nDigite um tema e tente novamente");
                return 0;
            }

            $.ajax({
                type: "post",
                async: "true",
                data: $("#formCadastroTema").serialize(),
                url: "lib/php/cadastro-tema.php",
                success: function(response)
                {
                    if(response == 0)
                    {
                        window.alert("É preciso digitar um tema para cadastra-lo. \nDigite um tema e tente novamente")
                    }
                    else
                    {
                        window.alert(response);
                        location.reload();
                    }
                }
            });
        }
    }

    if(tipoCadastro == 'palavra')
    {			
        var tema = $("select[name='tema']").val();
        var palavra = $("input[name='palavra']").val();
        var dicas = $("textarea[name='dicas']").val();

        if(tema == 0 || palavra == "" || dicas == "")
        {
            window.alert("Todos os campos são obrigatórios. Preencha todos os campos e tente novamente.");
            return 0;
        }

        $.ajax({
            type: "post",
            async: "true",
            data: "id_tema="+tema+"&palavra="+palavra+"&dicas="+dicas,
            url: "lib/php/cadastro-palavra.php",
            success: function(response)
            {
                if(response == 0)
                {
                    window.alert("Todos os campos são obrigatórios. Preencha todos os campos e tente novamente.")
                }
                else
                {
                    window.alert(response);
                    location.reload();
                }
            }
        });
    }
}

function AbrirTelaAtualilacao(dados, tipoRegistro = null)
{
    if(tipoRegistro == "tema")
    {
        var idTema = dados[0];
        var tema = dados[1];

        $("#idTemaUpdate").val(idTema);
        $("#temaUpdate").val(tema);

        $("#UpdateTema").modal();
    }
    
    if(tipoRegistro == null)
    {
        var idPalavra = dados[0];
        var palavra = dados[1];
        var idTema = dados[2];
        var tema = dados[3];
        var dicas = dados[4];

        $("#idPalavraUpdate").val(idPalavra);
        $("#palavraUpdate").val(palavra);
        //$("#palavraUpdate").val(tema);
        $("#dicasUpdate").val(dicas);

        $("#UpdatePalavra").modal();
    }
}

function AlterarRegistro(tipoRegistro = null)
{
    if(tipoRegistro == "tema")
    {
        var idTema = $("#idTemaUpdate").val();
        var novoTema = $("#temaUpdate").val();

        if(novoTema == "")
        {
            window.alert("Nenhum tema digitado. Insira um tema e tente novamente");
            return false;
        }
        
        $.ajax({
            type: 'post',
            async: "true",
            url: "lib/php/alterar-tema.php",
            data: "tema="+novoTema+"&id_tema="+idTema,
            success: function(response)
            {
                if(response == 0)
                {
                    window.location("Nenhum tema digitado, Insira um tema e tente novamente");
                }
                else
                {
                    window.alert(response);
                    location.reload();
                }
            }
        });
    }

    if(tipoRegistro == null)
    {
        var idTema = $("#temaPalavraUpdate").val();
        var palavra = $("#palavraUpdate").val();
        var idPalavra = $("#idPalavraUpdate").val();
        var dicas = $("#dicasUpdate").val();

        if(palavra == "" || idTema == 0 || dicas == "")
        {
            window.alert("Todos os campos são obrigatórios. Digite todas as informações e tente novamente.");
            return 0;
        }

        $.ajax({
            type: 'post',
            async: "true",
            url: "lib/php/alterar-palavra.php",
            data: "id_tema="+idTema+"&palavra="+palavra+"&id_palavra="+idPalavra+"&dicas="+dicas,
            success: function(response)
            {
                if(response == 0)
                {
                    window.location("Nenhum tema digitado, Insira um tema e tente novamente");
                }
                else
                {
                    window.alert(response);
                    location.reload();
                }
            }
        });
    }
}

function DeletarRegistor(idRegistro, tipoRegistro = null)
{
    if(tipoRegistro == "tema")
    {
        if(window.confirm("Atenção: Deletando este tema, você deletará também todas as palavras relacionadas a ele. Tem certeza que deseja continuar?"))
        {
            $.ajax({
                type: "post",
                async: "true",
                data: "id_tema=" + idRegistro,
                url: "lib/php/deletar-tema.php",
                success: function(response)
                {
                    window.alert(response);
                    location.reload();
                }
            });
        }
        else
        {
            return 0;
        }
    }
    else
    {
        $.ajax({
            type: "post",
            async: "true",
            data: "id_palavra=" + idRegistro,
            url: "lib/php/deletar-palavra.php",
            success: function(response)
            {
                window.alert(response);
                location.reload();
            }
        });
    }
}

function AbrirMenu()
{
    location.href = "menu.php";
}

function HabilitarAdministrador(idUsuario)
{
    $.ajax({
        type: "post",
        async: "true",
        data: "id_usuario=" + idUsuario,
        url: "lib/php/tornar-administrador.php",
        success: function(response)
        {
            window.alert(response);
            location.reload();
        }
    });
}

function DeletarUsuario(idUsuario)
{
    $.ajax({
        type: "post",
        async: "true",
        data: "id_usuario=" + idUsuario,
        url: "lib/php/deletar-usuario.php",
        success: function(response)
        {
            window.alert(response);
            location.reload();
        }
    });
}