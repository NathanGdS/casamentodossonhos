<?php 
include_once '../../Db/daohelper.php';
try{
$pagina = 1;
 $conn = connection();
 $verificar = "SELECT count(cod_produto) FROM produto where cod_categoria ='$codCat'";
 $querySelect = executeSelect($conn, $verificar);
    $cod = array();
    $produto = array();
    if($querySelect->rowCount() > 0){
         $qtd = $querySelect->fetch();
        }else{}
    //aqui farei a veriicação da url para pegar o codigo
    if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
        $pl = (10 * ($pagina - 1)) + 1;
        $npl = $pagina * 10;
        for($i=$pl;$i<=$npl;$i++){
             $verificar2 = "SELECT * FROM produto where cod_produto = {$i} and cod_categoria='$codCat'";
                $querySelect = executeSelect($conn, $verificar2);
                if($querySelect->rowCount() > 0){
                    while($fetch = $querySelect->fetch(PDO::FETCH_ASSOC)){
                    $produto[] = $fetch;
                    }
                }else{ }
        }
    }else{
        $npl = 10;
        
             $verificar2 = "SELECT * FROM produto where cod_categoria='$codCat'";
                $querySelect = executeSelect($conn, $verificar2);
                if($querySelect->rowCount() > 0){
                    while($fetch = $querySelect->fetch(PDO::FETCH_ASSOC)){
                    $produto[] = $fetch;
                    }
                }else{ }
        
    
    }
}catch (Exception $ex) {

}
