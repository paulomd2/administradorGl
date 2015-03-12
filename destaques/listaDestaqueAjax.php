<div id="destaquesordem">
    <ul>
        <?php
        require_once '../model/banco.php';
        require_once 'model/dao.php';

        if (isset($_GET['count'])) {
            $count = $_GET['count'];
        } else {
            $count = 5;
        }
        
        if(isset($_GET['lingua'])){
            $lingua = $_GET['lingua'];
        }else{
            $lingua = 'pt';
        }

        $destaques = $objDestaqueDao->verDestaques($count,$lingua);

        for ($i = 1; $i < count($destaques); $i++) {

            echo '
                    <li id="recordsArray_' . $destaques[$i]["idDestaque"] . '">
                        <div class = "lista_destaque">
                            <img src = "../images/' . $destaques[$i]["imagem"] . '" alt = "' . $destaques[$i]["titulo"] . '" title = "' . $destaques[$i]["titulo"] . '" width = "300" style = "float: left; margin-right: 10px;"/>
                            <span>' . $destaques[$i]["titulo"] . '</span><br/>
                            <a href="altDestaque.php?id=' . $destaques[$i]['idDestaque'] . '">Alterar</a> | <a href="javascript:delDestaque(' . $destaques[$i]["idDestaque"] . ')">Excluir</a>
                            </a>
                        </div>
                    </li>
                ';
        }
        ?>
    </ul>
</div>