// Validação de Data
function dataValidate(data){
    // Verifica se a data tem menos de 10 caracteres
   if(data.length != 10){
       return false;
   }else{
       //pega a data atual
       var dataAtual = new Date();

       var dia = data.substr(0,2); // pega somente o dia da data
       var mes = data.substr(3,2); // pega somente o mes da data
       var ano = data.substr(6,4); // pega somente o ano da data

       // Idade máxima para o cadastro no sistema 127 anos
       var idadeMax = dataAtual.getFullYear() - 127;
       var subAno = ano - idadeMax; // Variavel que vai verificar se a idade é maior que 127 anos.

       // Valida o Ano
       if((data.length != 10) || (subAno < 0) || (ano > dataAtual.getFullYear())){
            return false;
       }else{
           // Validar se o mês é valido
           if(mes < 0 || mes > 12){
               return false;
           }else if((mes == 1 || mes == 3 || mes == 5 || mes == 7 || mes == 8 || mes == 10 || mes == 12)&&(dia > 31)){
               return false;
           }else if(( mes == 4 || mes == 6 || mes == 9 || mes == 11 ) && ( dia > 30 )){ //valida os meses com 30 dias
               return false;
           }else if((mes == 2) && (dia > 29 || (dia == 29 && ano % 4 != 0))){//valida o mes de fevereiro e o ano bissexto
            return false; 
           }else{
               return true;
           }
       }
   }
}

// Função que valida a data de validade do campo produto
function ValidaData(valor){
    var date=valor;
	var ardt=new Array;
	var ExpReg=new RegExp("(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}");
	ardt=date.split("/");
	erro=false;
	if ( date.search(ExpReg)==-1){
		erro = true;
		}
	else if (((ardt[1]==4)||(ardt[1]==6)||(ardt[1]==9)||(ardt[1]==11))&&(ardt[0]>30))
		erro = true;
	else if ( ardt[1]==2) {
		if ((ardt[0]>28)&&((ardt[2]%4)!=0))
			erro = true;
		if ((ardt[0]>29)&&((ardt[2]%4)==0))
			erro = true;
	}
	if (erro) {
		return false;
	}
	return true;
}

// funções de mascaras para campos
$(document).ready(function(){
$('#txtcpf').mask('000.000.000-00', {reverse: true});
$('#txtcnpj').mask('00.000.000/0000-00',{reverse:true});
$('#txtcep').mask('00.000-000',{reverse: true});
//$('#txtrg').mask('0.000.000',{reverse: true});
$('#txtfone').mask('00 0 0000-0000',{reverse: true});
$('#data').mask('00/00/0000',{reverse: true});
$('#txtdata').mask('00/00/0000',{reverse: true});
$('#codProduto').mask('0000-000',{reverse: true});
});

// Função para mostrar os campos obrigatorios
$(document).ready(function(){

// Valida o campo e troca a cor do campo Código do produto
$('#codProduto').blur(function(e){
    codigo = $('#codProduto').val();

    if(codigo.length > 5){
        $('#div_codigo').removeClass("has-error");
        $('#div_codigo').addClass("has-success");
    }else{
        $('#div_codigo').removeClass("has-success");
        $('#div_codigo').addClass("has-error");
    }
}),

// Valida o campo e troca a cor Nome do Produto
$('#nomeProduto').keydown(function(e){
    nomeProduto = $('#nomeProduto').val();

    if(nomeProduto.length > 4){
        $('#div_nomeproduto').removeClass("has-error");
        $('#div_nomeproduto').addClass("has-success");
    }else{
        $('#div_nomeproduto').removeClass("has-success");
        $('#div_nomeproduto').addClass("has-error");
    }
}),

// Valida o tamanho e troca a cor do campo de quantidade
$('#txtquantidade').blur(function(e){
    quantidade = $('#txtquantidade').val();

    if(quantidade.length > 1){
        $('#div_quantidade').removeClass("has-error");
        $('#div_quantidade').addClass("has-success");
    }else{
        $('#div_quantidade').removeClass("has-success");
        $('#div_quantidade').addClass("has-error");
    }
}),

// Valida o tamanho e troca a cor do campo de descrição
$('#txtdesc').blur(function(e){
    desc = $('#txtdesc').val();

    if(desc.length > 6){
        $('#div_desc').removeClass("has-error");
        $('#div_desc').addClass("has-success");
    }else{
        $('#div_desc').removeClass("has-success");
        $('#div_desc').addClass("has-error");
    }
}),

// Função que troca a cor do campo e valida
$('#txtnome').keydown(function(e){

    if($('#txtnome').val().length > 7){
        $('#div_nome').removeClass("has-error");
        $('#div_nome').addClass("has-success");
    }else{
        $('#div_nome').removeClass("has-success");
        $('#div_nome').addClass("has-error");
    }
}),

$('#txtnomefantasia').keydown(function(e){
    fantasia = $('#txtnomefantasia').val();
    
    if(fantasia.length > 2){
        $('#div_nomeFantasia').removeClass("has-error");
        $('#div_nomeFantasia').addClass("has-success");
    }else{
        $('#div_nomeFantasia').removeClass("has-success");
        $('#div_nomeFantasia').addClass("has-error");
    }
}),

$('#txtrazaosocial').keydown(function(e){
    razao = $('#txtrazaosocial').val();

    if(razao.length > 2){
        $('#div_razaoSocial').removeClass("has-error");
        $('#div_razaoSocial').addClass("has-success");
    }else{
        $('#div_razaoSocial').removeClass("has-success");
        $('#div_razaoSocial').addClass("has-error");
    }
}),

// Troca a cor do campo Nivel de Acesso(combobox)
$('#txtnivel').change(function(e){
    nivel = $('#txtnivel option:selected').val();

    if(nivel != " "){
        $('#div_nivel').removeClass("has-error");
        $('#div_nivel').addClass("has-success");
    }else{
        $('#div_nivel').removeClass("has-success");
        $('#div_nivel').addClass("has-error");
    }
}),

// Troca a cor do campo ativo(combobox)
$('#txtativo').change(function(e){
    ativo = $('#txtativo option:selected').val();

    if(ativo != " "){
        $('#div_ativo').removeClass("has-error");
        $('#div_ativo').addClass("has-success");
    }else{
        $('#div_ativo').removeClass("has-success");
        $('#div_ativo').addClass("has-error");
    }
}),

// Valida o campo e troca a cor do campo sexo
$('#txtsexo').change(function(e){
    sexo = $('#txtsexo option:selected').val();

    if(sexo != " "){
        $('#div_sexo').removeClass("has-error");
        $('#div_sexo').addClass("has-success");
    }else{
        $('#div_sexo').removeClass("has-success");
        $('#div_sexo').addClass("has-error");
    }
}),

// Valida se está vazio ou não e troca a cor do campo UF
$('#txtuf').change(function(e){
    uf = $('#txtuf').val();

    if(uf != " "){
        $('#div_uf').removeClass("has-error");
        $('#div_uf').addClass("has-success");
    }else{
        $('#div_uf').removeClass("has-success");
        $('#div_uf').addClass("has-error");
    }
}),

// Valida o tamanho e troca a cor do campo cidade.
$('#txtcidade').blur(function(e){
    cidade = $('#txtcidade').val();

    if(cidade.length > 5){
        $('#div_cidade').removeClass("has-error");
        $('#div_cidade').addClass("has-success");
    }else{
        $('#div_cidade').removeClass("has-success");
        $('#div_cidade').addClass("has-error");
    }
}),

 // Valida o tamanho e troca a cor do campo endereço  
$('#txtendereco').keypress(function(e){
    var endereco = $('#txtendereco').val();

    if(endereco.length > 10){
        $('#div_endereco').removeClass("has-error");
        $('#div_endereco').addClass("has-success");
    }else{
        $('#div_endereco').removeClass("has-success");
        $('#div_endereco').addClass("has-error");
    }
}),

$('#txtfone').blur(function(){
    $('#txtfone').replaceAll('_','');

    if($('#txtfone').val().length > 10){
        $('#div_fone').removeClass("has-error");
        $('#div_fone').addClass("has-success");
    }else{
        $('#div_fone').removeClass("has-success");
        $('#div_fone').addClass("has-error");
    }
}),

// Valida o tamanho e troca a cor do campo Numero.
$('#txtnumero').blur(function(e){
    $('#txtnumero').replaceAll('_','');

    if($('#txtnumero').val().length > 0){
        $('#div_numero').removeClass("has-error");
        $('#div_numero').addClass("has-success");
    }else{
        $('#div_numero').removeClass("has-success");
        $('#div_numero').addClass("has-error");
    }
}),

// Valida o tamanho e troca a cor do campo de Bairro
$('#txtbairro').blur(function(e){
    bairro = $('#txtbairro').val();

    if(bairro.length > 7){
        $('#div_bairro').removeClass("has-error");
        $('#div_bairro').addClass("has-success");
    }else{
        $('#div_bairro').removeClass("has-success");
        $('#div_bairro').addClass("has-error");
    }
}),

// Valida o tamanho e troca a cor do campo de CEP
$('#txtcep').blur(function(e){
    cep = $('#txtcep').val();

    if(cep.length > 5){
        $('#div_cep').removeClass("has-error");
        $('#div_cep').addClass("has-success");
    }else{
        $('#div_cep').removeClass("has-success");
        $('#div_cep').addClass("has-error");
    }
})

// Função de validação de e-mail e troca a cor do campo
$('#txtemail').blur(function(e){
    var email = $('#txtemail').val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(filter.test(email) && email != " "){
        $('#div_email').removeClass("has-error");
        $('#div_email').addClass("has-success");
    }else{
        alert('E-Mail inválido, Digite um E-Mail válido!');
        $('#div_email').removeClass("has-success");
        $('#div_email').addClass("has-error");
    }

}),

// Valida se está conforme um CPF válido e troca a cor do campo CPF
$('#txtcpf').blur(function(e){
    $('#txtcpf').replaceAll('_','');
    cpf = $('#txtcpf').val();
    filtro = /^[\d]{3}\.[\d]{3}\.[\d]{3}\-[\d]{2}$/;
    
    if(filtro.test(cpf) != " " && cpf.length > 10){
        $('#div_cpf').removeClass("has-error");
        $('#div_cpf').addClass("has-success");
    }else{
        alert('CPF inválido, por favor digite um CPF válido!');
        $('#div_cpf').removeClass("has-success");
        $('#div_cpf').addClass("has-error");
    }
}),

$("#txtcpfcnpj").keydown(function(){
    try {
        $("#txtcpfcnpj").unmask();
    } catch (e) {}

    var cpf = $("#txtcpfcnpj").val().length;
    var cnpj = $("#txtcpfcnpj").val().length;

    if(cpf < 11){
        $("#txtcpfcnpj").mask("999.999.999-99");
        $("#div_cpfCnpj").removeClass("has-error");
        $("#div_cpfCnpj").addClass("has-success");
    } else if(cnpj == 14){
        $("#txtcpfcnpj").mask("99.999.999/9999-99");
        $("#div_cpfCnpj").removeClass("has-error");
        $("#div_cpfCnpj").addClass("has-success");
    }                   
}),

$('#txcnpj').blur(function(cnpj){
    cnpj = $('#txtcnpj').val();
    $('#txtcnpj').val().replaceAll(/[^\d]+/g,'')

    if(cnpj.length != " "){
        aler('passei aqui, success');
        $('#div_cnpj').removeClass("has-error");
        $('#div_cnpj').addClass("has-success");
    }else{
        aler('Campo Cnpj vázio, por favor informe o CNPJ');
        $('#div_cnpj').removeClass("has-success");
        $('#div_cnpj').addClass("has-error");
    }
}),

// troca a cor do campo de data Validade
$('#data').blur(function(){
    data = $('#data').val();
    
    if(dataValidate(data)){
        $('#div_data').removeClass("has-error");
        $('#div_data').addClass("has-success");
    }else{
        alert('Data inválida, por favor digite uma data válida!');
        $('#div_data').removeClass("has-success");
        $('#div_data').addClass("has-error");
    }
}),

$('#txtdata').blur(function(e){
    Data = $('#txtdata').val();

    if(ValidaData(Data) != ""){
        $('#div_Data').removeClass("has-error");
        $('#div_Data').addClass("has-success");
    }else{
        alert('Data inválida ou campo vázio, por favor digite uma data válida!');
        $('#div_Data').removeClass("has-success");
        $('#div_Data').addClass("has-error");
    }
}),

$('#txtsenha').blur(function(e){
    senha = $('#txtsenha').val();

    if(senha.length > 7){
        $('#div_senha').removeClass("has-error");
        $('#div_senha').addClass("has-success");
    }else{
        $('#div_senha').removeClass("has-success");
        $('#div_senha').addClass("has-error");
    }
}),

// Função de troca de cor para categoria
$('#txtcategoria').keydown(function(e){
    categoria = $('#txtcategoria').val();

    if(categoria.length > 3){
        $("#div_categoria").removeClass("has-error");
        $("#div_categoria").addClass("has-success");
    }else{
        $("#div_categoria").removeClass("has-success");
        $("#div_categoria").addClass("has-error");
    }
}),

// Função de troca de cor para o campo descrição
$('#txtdescricao').keydown(function(e){
    descricao = $('#txtdescricao').val();

    if(descricao.length > 3){
        $('#div_descricao').removeClass('has-error');
        $('#div_descricao').addClass('has-success');
    }else{
        $('#div_descricao').removeClass('has-success');
        $('#div_descricao').addClass('has-error');
    }
}),

// Função de troca de cor do select categoria
$('#selcategoria').change(function(e){
    select = $('#selcategoria option:selected').val();

    if(select != " "){
        $('#div_categoria').removeClass('has-error');
        $('#div_categoria').addClass('has-success');
    }else{
        $('#div_categoria').removeClass('has-success');
        $('#div_categoria').addClass('has-error');
    }
}),

// Função de Troca de cor do select fornecedor
$('#selfornecedor').change(function(e){
    fornecedor = $('#selfornecedor option:selected').val();

    if(fornecedor != " "){
        $('#div_fornecedor').removeClass('has-error');
        $('#div_fornecedor').addClass('has-success');
    }else{
        $('#div_fornecedor').removeClass('has-success');
        $('#div_fornecedor').addClass('has-error');
    }
})
});

// Função de Validação do formulário.
$(document).ready(function(){
$('#codProduto').prop('required',true);
$('#data').prop('required',true);
$('#txtdata').prop('required',true);
$('#txtnome').prop('required',true);
$('#txtrg').prop('required',false);
$("#txtcpf").prop('required',true);
$("#txtemail").prop('required',true);
$('#txtsenha').prop('required',true);
$('#txtnivel').prop('required',true);
$('#txtativo').prop('required',true);
$('#txtsexo').prop('required',true);
$('#txtendereco').prop('required',true);
$('#txtnumero').prop('required',true);
$('#txtcep').prop('required',true);
$('#txtuf').prop('required',true);
$('#txtcidade').prop('required',true);
$('#txtbairro').prop('required',true);
$('#txtnomefantasia').prop('required',true);
$('#txtrazaosocial').prop('required',true);
$('#txtcategoria').prop('required',true);
$('#txtdescricao').prop('required',true);
});