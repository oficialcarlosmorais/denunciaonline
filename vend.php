
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html, charset=utf-8"  />
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta http-equiv="content-language" content="pt-br, en-US, fr, en"  />
		<meta name="author" content="El Anara Nasciment, José Carlos Nogueira Morais, Roseany Lobato de Sousa" />
		<meta name="description" content="gerenciador pessoal e empresarial" />
		<meta name= "keywords" content="financeiro, finanças, I-manager" />
		<meta name="generator" content="sublime"/>
		<meta name="robots" content="all"/>
		<meta name="rating" content="general" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="copyright" content="El Anara Nascimento, José Carlos Nogueira Morais, Roseany Lobato de Sousa" />
		<title>I - MANAGER | PJ</title>
		<style>
			* {box-sizing: border-box; margin:0; padding: 0; font-family: arial; font-size: 16px; max-width: 600px;}

			main, header, article, section, aside, footer, div, input{display: block;}

			nav {
				height: 42.1px;
				width: 100%;
				background: rgb(57, 59, 60);
				display: flex;
				justify-content: space-between;
			}

			nav div{
				display: flex;
			}

			nav button {
				height: 42px;
				background: rgb(57, 59, 60);
				color: white;
				padding: 10px 20px 10px 20px;
				border:0px;
			}

			.btn_usuario{
				height: 42px;
				background: #045D14;
				text-decoration: none;
				font-style: italic;
				color: white;
				padding: 10px 20px 10px 20px;
				border:0px;
			}

			.menu_raiz {display: flex; flex-direction: column;}
			.menu_conteudo {
				display: none;
				background-color: #555; 
				color: white; 
				text-align: center;
				padding: 10px 20px 10px 20px;
				border:0px;
				z-index: 1;
				}

			nav #barra_menu .menu_raiz .menu_conteudo a{
				text-decoration: none;
				color: white;
			}

			.btn_nav_retratil{
				display: none;
				background: #555;
				padding: 5px 15px 5px 15px;
				margin: 2px;
				color: white;
				font-size: 20px;
			}


nav #barra_menu .menu_raiz:hover {display: block; }
nav #barra_menu .menu_raiz:hover .menu_conteudo {display: flex;}
nav #barra_menu .menu_raiz .menu_conteudo:hover{  background-color: #ddd;  color: black;}

#barra_menu{}
.flex {display: flex;}
.space_between {justify-content: space-between;}
.borda {border: 1px solid black;}
.espaco_acima {margin-top: 10px;}

			article {width: 100%; padding: 10px;}
			section {margin-top: 10px;}
			section div {}

			.tabela {

			}
			.tr{
				display: flex;
				flex-direction: row;
				margin:0;
				flex:1;
			}

			.th {
				padding: 5px;
				text-align: center;
				font-weight: bold;
				color: white;
				flex:1;}
			.td {
				padding: 5px 5px 5px 7px;
				flex:1;}
			.tr:nth-child(odd) {background: silver;}
			.tr:nth-child(even) {background: white;}
			.tr:first-child {background: #127524;border-radius: 10px 10px 0 0;}
			.tr:last-child {border-radius: 0 0 10px 10px;}
			.td:last-child {text-align: right;}
.sombra {box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.1)};
#uV_resumo div * {
  flex: 1;
  border-radius: 5px;
  margin: 5px;
  padding: 5px;
  margin-bottom: 10px;
  margin-top: 10px;
  background: #e6f2ff;
  flex-direction: row-reverse;
  background: silver;
}

@media screen and (max-width: 600px){

	.menu_raiz {display: none;}
	nav{flex-wrap: wrap;}

	main, body, nav, footer{
		min-width: 100vw;
		margin: 0px auto;
}

	article{
		width: 100vw;
		border:1px solid black;
		justify-content: center;
		padding: 2px;
		margin: 0px auto;
	}
	section {
		margin: 0px auto;
	}

	section div{
		margin: 0px auto;
	}
}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	
</script>
</head>
<body>
	<main>

		<!--INICIO DA BARRA DE NAVEGAÇÃO-->

<nav>
<a href="default_juridica.html"><img src=images/logo.png width=120px></a>
<div id="barra_menu" style="display:
 flex; flex-direction: row;">
	<div class="menu_raiz">
		<button>Cliente</button>
		<div class="menu_conteudo"><a href="cli_form_cadastro.html">Cadastrar</a></div>
		<div class="menu_conteudo"><a href="cli_form_editar.html">Editar</a></div>
		<div class="menu_conteudo"><a href="cli_visualizar.html">Visualizar</a></div>
	</div>
	<div class="menu_raiz">
		<button>Estoque</button>
		<div class="menu_conteudo"><a href="est_form_cadastro.html">Cadastrar</a></div>
		<div class="menu_conteudo"><a href="est_form_editar.html">Editar</a></div>
		<div class="menu_conteudo"><a href="est_visualizar.html">Visualizar</a></div>
	</div>
	<div class="menu_raiz">
		<button>Vendas</button>
		<div class="menu_conteudo"><a href="vend_form_vender.html">Vender</a></div>
		<div class="menu_conteudo"><a href="vend_visualizar.html">Visualizar</a></div>
	</div>
	<div class="menu_raiz">
		<button>Caixa</button>
		<div class="menu_conteudo"><a href="cx_visualizar.html">Visualizar caixa</a></div>
		<div class="menu_conteudo"><a href="cx_form_baixar.html">Baixar</a></div>
	</div>
	<div class="menu_raiz">
		<button class="btn_usuario">Sair</button>
	</div>
	<div class="btn_nav_retratil">&#9776;</div>
</div>
	
</nav>
				<!--FIM BARRA DE NAVEGAÇÃO -->

<!--AQUI COMEÇA O CORPO DO TEXTO-->

<article class="conteudo">
	<section>
		<div class="tabela">
			<div class="tr">
			<div class="th">Poduto</div><div class="th">Valor</div>
		</div>

<?php
$servername = "localhost";
$username = "root";
$password = "horus4321";
$dbname = "imanager";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

 $produto = $_POST['produto'];
 $valor = $_POST['valor'];
 $data_criacao = date('Y-m-d');
 $total_vendas = 0;
 $data_venda = $_POST['data_venda'];
 $forma_pgto = $_POST['forma_pgto'];

$sql = "INSERT INTO tbl_vendas (vd_produto, vd_valor, vd_data_venda, vd_forma_pgto)VALUES ('$produto', '$valor', '$data_venda','$forma_pgto')";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_vendas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class=tr><div class=td>". $row["vd_produto"]. "</div><div class=td>" . $row["vd_valor"]. "</div></div>";
        $total_vendas = $total_vendas + $row["vd_valor"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>

	</section>

<section id="vend_resumo" class="sombra">

    <div id="vend_total"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <strong>Total: R$</strong> <?php echo $total_vendas ?></div>
</section>
</article>
<!--AQUI TERMINA O CORPO DO TEXTO-->

<footer></footer>
	</main>
</body>	
</html>