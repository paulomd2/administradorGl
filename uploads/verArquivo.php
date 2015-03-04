<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../plugin/zeroclipboard/ZeroClipboard.js"></script>
        <script type="text/javascript" src="js/upload.js"></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <!-- polyfiller file to detect and load polyfills -->
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
        <script src="../plugin/uploadify/jquery.uploadify.js"></script>
        <link rel="stylesheet" href="../plugin/uploadify/uploadify.css" />
        <script>
            webshims.setOptions('waitReady', false);
            webshims.setOptions('forms-ext', {types: 'date'});
            webshims.polyfill('forms forms-ext');
        </script>
    </head>
    <body>
        <?php
        include_once '../include/header.php';
        include_once '../include/lateral.php';
        ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Upload</a>
                <a href="#"><?php echo $_GET['id']; ?></a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="pasta" id="pasta" />

                <h1>Todos arquivos</h1>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="min-width: 20%;">Arquivo</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaArquivos"></tbody>
                </table>
            </div>
        </div>
    </body>
</html>

<?php
/* --------------------------- DADOS SUBCATEGORIAS --------------------------- */
/*class teste{
private $id;
private $id_categoria;
private $titulo_subcategoria;
private $slug_subcategoria;
private $ordem_subcategoria;
private $estado_subcategoria;

public function setId($id){
$this->id = $id;
}
public function getId(){
return $this->id;
}

public function getSubcategoria(){
return $this->subcategoria;
}
public function getSlugSubcategoria(){
return $this->slug_subcategoria;
}
public function getOrdemSubcategoria(){
return $this->ordem_subcategoria;
}
public function getEstadoSubcategoria(){
return $this->estado_subcategoria;
}

public function mostrarDados(){
$sql = "SELECT * FROM  subcategoria WHERE id_categoria = '$this->id'";
$qry = self::executarSQL($sql);
$linha = self::listar($qry);

$this->id = $linha["id"];
$this->categoria = $linha["id_subcategoria"];
$this->subcategoria = $linha["titulo_subcategoria"];
$this->slug_subcategoria = $linha["slug_subcategoria"];
$this->ordem_subcategoria = $linha["ordem_subcategoria"];
$this->estado_subcategoria = $linha["estado_subcategoria"];
}

public function comboCategoria($id){
$sql = "SELECT * FROM  subcategoria ";
$qry = self::executarSQL($sql);

while($linha = self::listar($qry)){
if($id==$linha["id_subcategoria"]){
$selecionado = "selected='selected' ";
} else{
$selecionado = "";
}

echo "<option value=$linha[id_subcategoria] $selecionado>$linha[subcategoria]</option>\n";
}
}

public function verCategorias($sql, $i){
$qry = mysql_query($sql);

$this->id = mysql_result($qry, $i, "id_categoria");
$this->id_subcategoria = mysql_result($qry, $i, "id_subcategoria");
$this->titulo_subcategoria = mysql_result($qry, $i, "titulo_subcategoria");
$this->slug_subcategoria = mysql_result($qry, $i, "slug_subcategoria");
$this->ordem_subcategoria = mysql_result($qry, $i, "ordem_subcategoria");
$this->estado_subcategoria = mysql_result($qry, $i, "estado_subcategoria");
}

public function totalRegistros($sql){
$qry = self::executarSQL($sql);
$total = self::contaDados($qry);

return $total;
}
}
/* --------------------------- FIM DADOS SUBCATEGORIAS --------------------------- */