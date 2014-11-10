<?php

class Utils
{
    public static function objectToArray($object)
    {
        $array = array();
        foreach ($object as $member => $data) {
            $array[$member] = $data;
        }
        return $array;
    }

    public static function ArrayObjetctToArray($datos)
    {
        $array = array();
        $count = 0;
        for ($i = 0; $i < count($datos); $i++) {
            $childObjetcs = $datos[$i];
            foreach ($childObjetcs as $member => $data) {
                $array[$count][$member] = $data;
            }
            $count++;
        }
        return $array;
    }

    public static function dataEncriptar($data)
    {
        $datos = array();
        foreach ($data as $clave => $valor) {
            $datos[base64_encode($clave)] = base64_encode($valor);
        }
        return $datos;
    }

    public static function dataDesencriptar($data)
    {
        $datos = array();
        foreach ($data as $clave => $valor) {
            $datos[base64_decode($clave)] = base64_decode($valor);
        }
        return $datos;
    }

    public static function downloadFile ($url, $path) {
        $in=    fopen($url, "rb");
        $out=   fopen($path, "wb");
        while ($chunk = fread($in,8192))
        {
            fwrite($out, $chunk, 8192);
        }
        fclose($in);
        fclose($out);
    }

}