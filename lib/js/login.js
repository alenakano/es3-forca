function RealizarLogin()
{
    var login = $("#login").val();
    var senha = $("#senha").val();

    if(login == "" || senha == "")
    {
        window.alert("Todos os campos são obrigatorios. Insira todas as informações e tente novamente");
        return 0;
    }
    else
    {
        $.ajax({
            type: 'post',
            data: $("#formCredenciais").serialize(),
            url: "lib/php/login.php",
            success: function(response)
            {
                
                if(response === "adm")
                {
                    window.alert("Login realizado com sucesso! Bem vindo administrador, você será redirecionado");
                    location.href = "menu.php";
                }

                if(response === "pla")
                {

                    window.alert("Login realizado com sucesso!, você será redirecionado");
                    location.href = "menu.php";
                }
                
                if(response === 0)
                {
                    window.alert("Todos os campos são obrigatorios. Insira todas as informações e tente novamente");
                    return 0;
                }

                if(response === "erro")
                {
                    window.alert("não foi encontrado nenhum perfil para essas credenciais");
                    return 0;
                }
            }

        });
    }
}	

function RealizarCadastro()
{
    var login = $("#cadastroLogin").val();
    var nome = $("#cadastroName").val();
    var senha = $("#cadastroSenha").val();

    if(senha == "" || login == "" || nome == "")
    {
        window.alert("Todos os campos são necessários para o cadastro. Insira todos os campos e tente novamente.");
    }
    else
    {
        $.ajax({
            url: "lib/php/cadastrar-jogador.php",
            type: "post",
            data: $("#formCadastro").serialize(),
            success: function(response)
            {
                window.alert(response);
                location.reload();
            }
        });
    }
}
