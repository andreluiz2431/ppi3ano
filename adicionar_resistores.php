
<?php
$z = 0;
if(!empty($_POST['numr'])){
    $z = $_POST['numr'];
}

$z++;
?>
<form method="post" action="<?php echo $pagina; ?>.php">

    <input name="numr" value="<?php echo $z; ?>" style="display: none">
    <input type="submit" value="+">

</form>

<?php
if(!empty($_POST["numr"])){
    echo '<input type="button" value="-" onclick="history.go(-1)" /><a href="'.$pagina.'.php">Limpar</a>';

    $numr = $_POST['numr'];
    $j = 1;

    echo '<form method="post" action="'.$pagina.'.php">';

    while($j <= $numr){
        $z++;
        echo "<label>Resistor $j</label><input type='text' name='res_$j' placeholder='Dê um valor ao resistor'><br>";
        $j++;
    }
    echo "<input type='number' value='$numr' name='cont' style='display:none'><br>";
    echo "<input type='submit'></form>";
}

if(!empty($_POST['cont'])){
    $c = $_POST['cont'];
    $i = 0;

    while($i <= $c){
        if($i != 0){
            $array[$i] = $_POST['res_'.$i.''];
        }

        $i++;
    }
}
?>
