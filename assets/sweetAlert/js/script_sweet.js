$(document).on('click','#logout',function(e){
    swal("Deslogado", "com Sucesso!", "success");
    redirect('administradorController/logoutUsuario');
});

$(document).on('click','#submit',function(e){
    swal("Usuário e/ou Senha", "estão incorretos!", "danger");
    redirect('loginController/verificarNivel');
});

$(document).ready(function(e){
    $('#submit').on('click',function(e){
        swal("Usuário e/ou Senha", "estão incorretos!", "danger");
        redirect('loginController/verificarNivel');
    });
});