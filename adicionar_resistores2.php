
<?php
$z = 0;
if(!empty($_POST['numr2'])){
    $z = $_POST['numr2'];
}

$z++;
?>
<form method="post" action="<?php echo $pagina; ?>.php">

    <input name="numr2" value="<?php echo $z; ?>" style="display: none">
    <input type="submit" value="+">

</form>

<?php
if(!empty($_POST["numr2"])){
    echo '<input type="button" value="-" onclick="history.go(-1)" /><a href="serie.php">Limpar</a>';

    $numr = $_POST['numr2'];
    $j = 1;

    echo '<form method="post" action="'.$pagina.'.php">';

    while($j <= $numr){
        $z++;
        echo "<label>Resistor $j</label><input type='text' name='res2_$j' placeholder='Dê um valor ao resistor'><br>";
        $j++;
    }
    echo "<input type='number' value='$numr' name='cont2' style='display:none'><br>";
    echo "<input type='submit'></form>";
}

if(!empty($_POST['cont2'])){
    $d = $_POST['cont2'];
    $i = 0;

    while($i <= $d){
        if($i != 0){
            $array[$i] = $_POST['res2_'.$i.''];
        }

        $i++;
    }
}
?>
