$(document).ready(function(){
    $("#btnJogar").click(function(){
        var nick = $("input[name='nick']").val();
        var senha = $("input[name='senha']").val();
        if(nick == "" || senha == "")
        {
            window.alert("É necessario inserir um Apelido para poder jogar! \nDigite seu apelido e tente novamente.");
        }
    });

    $("#btnCadastro").click(function (){
        $("#formCadastro").toggle("slow");
    })
    
    $("formCadastro").hide();
    $("#formCadastroTemaDiv").hide();
    $("#formCadastroPalavraDiv").hide();
    $("#tabelaTemaDiv").hide();
    $("#tabelaPalavraDiv").hide();
    $("#tabelaUsuarioDiv").hide();


    $("#btnTema").click(function(){
        $("#formCadastroTemaDiv").toggle('slow');
        $("#formCadastroPalavraDiv").hide('slow');
        $("#tabelaTemaDiv").hide('slow');
        $("#tabelaPalavraDiv").hide('slow');
        $("#tabelaUsuarioDiv").hide('slow');
    });

    $("#btnTemaLista").click(function(){
        $("#formCadastroTemaDiv").hide('slow');
        $("#formCadastroPalavraDiv").hide('slow');
        $("#tabelaTemaDiv").toggle('slow');
        $("#tabelaPalavraDiv").hide('slow');
        $("#tabelaUsuario").hide('slow');
    });

    $("#btnPalavra").click(function(){
        $("#formCadastroTemaDiv").hide('slow');
        $("#formCadastroPalavraDiv").toggle('slow');
        $("#tabelaTemaDiv").hide('slow');
        $("#tabelaPalavraDiv").hide('slow');
        $("#tabelaUsuario").hide('slow');
    });

    $("#btnPalavraLista").click(function(){
        $("#formCadastroTemaDiv").hide('slow');
        $("#formCadastroPalavraDiv").hide('slow');
        $("#tabelaTemaDiv").hide('slow');
        $("#tabelaPalavraDiv").toggle('slow');
        $("#tabelaUsuario").hide('slow');
    });

    $("#btnUsuarioLista").click(function(){
        $("#formCadastroTemaDiv").hide('slow');
        $("#formCadastroPalavraDiv").hide('slow');
        $("#tabelaTemaDiv").hide('slow');
        $("#tabelaPalavraDiv").hide('slow');
        $("#tabelaUsuarioDiv").toggle('slow');
    });

    $("#tabelaResultado").DataTable(
        {
            "language":
            {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            
            "order": [[ 1, "desc" ]]
        }
    );

    $("#tabelaTema").DataTable(
        {
            "language":
            {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        }
    );

    $("#tabelaPalavra").DataTable(
        {
            "language":
            {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        }
    );

    $("#tabelaUsuario").DataTable(
        {
            "language":
            {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            
            "order": [[ 1, "desc" ]]
        }
    );

});