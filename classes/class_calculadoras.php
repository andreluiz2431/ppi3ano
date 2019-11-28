<?php
class Calculos{
    // calculos resistencia
    public function resistenciaEquivalenteMista1($res1, $res2, $res3, $res4){ // Misto 1 Função 1 (2 séries)
        $array[0] = $res1 + $res2;
        $array[1] = $res3 + $res4;
        return $array;
    }

    public function resistenciaEquivalenteMista2($res1, $res2){ // Misto 1 Função 2 | Misto 2 Função 1 e 3 | Misto 3 Função 2 e 4
        $equivalente = 1/$equivalente = 1/$res1 + 1/$res2;
        return $equivalente;
    }
    
    public function resistenciaEquivalenteMista3($res1, $res2){ // Misto 2 Função 2 | Misto 3 Função 5
        $equivalente = $res1 + $res2;
        return $equivalente;
    }
    
    public function resistenciaEquivalenteMista4($res1, $res2, $res3, $res4){ // Misto 2 Função 4
        $equivalente = $res1 + $res2 + $res3 + $res4;
        return $equivalente;
    }
    
    public function resistenciaEquivalenteMista5($res1, $res2, $res3){ // Misto 3 Função 1 e 3
        $equivalente = $res1 + $res2 + $res3;
        return $equivalente;
    }

    public function resistenciaEquivalenteSerie($contador){ // pronto
        $equivalente = 0;
        $i = 1;
        while($i <= $contador){
            $resistor[$i] = $_POST['res_'.$i.''];
            $equivalente = $equivalente + $resistor[$i];
            $i++;
        }

        return $equivalente;
    }

    public function resistenciaEquivalenteParalela($contador){ // pronto
        $f = 0;
        $equivalente = 0;
        $i = 1;
        $a = 1;
        while($i <= $contador){
            $resistor[$i] = $_POST['res_'.$i.''];
            $f = $f + $a/$resistor[$i];
            $i++;
        }

        $equivalente = $a/$equivalente = $f;

        return $equivalente;
    }

    //URI
    public function uri($r, $u, $i){
        if(empty($i)){
            $i = $u / $r;
            return $i;
        }elseif(empty($u)){
            $u = $r * $i;
            return $u;
        }elseif(empty($r)){
            $r = $u / $i;
            return $r;
        }else{
            return "Não foi possivel realizar seu calculo";
        }
    }

    // calculos potencia
    public function pur($p, $u, $r){
        if (empty($p)){
            $p = ($u**2) / ($r);
            return $p;
        }elseif(empty($u)){
            $u = (($r*$p)**(0.5));
            return $u;
        }elseif(empty($r)){
            $r = ($u**2) / ($p);
            return $r;
        }else{
            return "Não foi possivel realizar seu calculo";
        }
    }

    public function pui($p, $u, $i){
        if (empty($p)){
            $p = ($u)*($i);
            return $p;
        }elseif (empty($u)){
            $u = ($p)/($i);
            return $u;
        }elseif (empty($i)){
            $i = ($p)/($u);
            return $i;
        }else{
            return "Não foi possivel realizar seu calculo";
        }
    }

    public function pri($p, $r, $i){
        if (empty($p)){
            $p=($r)*($i**2);
            return $p;
        }elseif (empty($r)){
            $r=($i**2) / ($p);
            return $r;
        }elseif (empty($i)){
            $i= sqrt(($p)/($r));
            return $i;
        }else{
            return "Não foi possivel realizar seu calculo";
        }
    }
}
?>
