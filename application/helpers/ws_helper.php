<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * @file ws.php
 * @author Sebastián Salazar Molina <sebasalazar@gmail.com>
 */
/**
 * 
 * @author Sebastián Salazar Molina <sebasalazar@gmail.com>
 * @param string $rut
 * @param string $contrasena
 * @return boolean
 * Valida contra el webservices de la unidad de informática, si el rut (con dígito verificador) 
 * y la contraseña proporcionada (en mayúsculas y hasheada en sha256) es válida o no lo es.
 */
if (!function_exists('ws_autenticar')) {

    function ws_autenticar($rut, $contrasena) {
        $resultado = false;

        try {

            // Creacion de un arreglo con los parámetros de entrada.
            $parametros = array();
            $parametros['rut'] = $rut;
            $parametros['password'] = $contrasena;

            // usuario de webService
            $autenticacion = array('login' => 'cacuna',
                'password' => '30a7a0479c66576762bdc671041ceb1817ded11f');

            $cliente = new SoapClient("http://informatica.utem.cl:8011/dirdoc-auth/ws/auth?wsdl", $autenticacion);
            $objeto = $cliente->autenticar($parametros);
            $codigo = (int) $objeto->return->codigo;
            $descripcion = (string) trim($objeto->return->descripcion);

            if ($codigo > 0) {
                $resultado = true;
            } else {
                error_log("Servicio WEB respondió: $descripcion ($codigo)");
            }
        } catch (Exception $e) {
            $resultado = false;
            error_log("Error en autenticacion: {$e->getMessage()}");
        }
        return $resultado;
    }

}

/**
 * 
 * @author Sebastián Salazar Molina <sebasalazar@gmail.com>
 * @param string $rut
 * @param int $semestre
 * @param int $anio
 * @return array
 * Retorna los cursos de un docente segun semestre y año
 */
if (!function_exists('ws_cursos_semestre_anio')) {

    function ws_cursos_semestre_anio($rut, $semestre, $anio) {
        $resultado = array();

        try {
            // Creacion de un arreglo       
            $parametros = array();
            $parametros['rut'] = $rut;
            $parametros['semestre'] = $semestre;
            $parametros['anio'] = $anio;

            // usuario de webService
            $autenticacion = array('login' => 'cacuna',
                'password' => '30a7a0479c66576762bdc671041ceb1817ded11f');

            $cliente = new SoapClient("http://informatica.utem.cl:8011/dirdoc-auth/ws/auth?wsdl", $autenticacion);
            $objeto = $cliente->consultarCursosPorRutDocenteYSemestre($parametros);
            $respuesta = $objeto->return;
            if (count($respuesta) > 1) {
                foreach ($respuesta as $obj) {
                    $resultado[] = (object) $obj;
                }
            } else {
                $resultado[] = $respuesta;
            }
        } catch (Exception $e) {
            $resultado = array();
            error_log("Error en autenticacion: {$e->getMessage()}");
        }
        return $resultado;
    }
  

}

//if (!function_exists('wsSession')) {
//
//     function wsSession($rut) {
//         //$resultado = false;
// 
//       
//             // Creacion de un arreglo con los parámetros de entrada.
//             $parametros = array();
//             $parametros['rut'] = $rut;
// 
//             // usuario de webService
//            $autenticacion = array('login' => 'cacuna',
//               'password' => '30a7a0479c66576762bdc671041ceb1817ded11f');
//
//          $cliente = new SoapClient("http://informatica.utem.cl:8011/dirdoc-auth/ws/auth?wsdl", $autenticacion);
//        // $objeto = $cliente->consultarDocente($parametros);
//                  $objeto = $cliente->consultarEstudiante($parametros);
//
//                $tipo=(string) trim($objeto->return->tipo);   
//               
//               if($tipo=="ALUM") 
//                  
//                    $resultado = False;
//                 else
//                    $resultado = TRUE;
//                    
//
//        return $resultado;
//    }
//}



