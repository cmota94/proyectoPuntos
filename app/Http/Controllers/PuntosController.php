<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;


class PuntosController extends Controller
{

	public function index(Request $request){

    $connString = "host=rigel.fca.unam.mx dbname=li313304901 user=li313304901 password=rigelFCA";
    $db = pg_connect($connString) or die('connection failed');

		if ($request) {

      $idAlumno = $request->input('numeroCuenta');
      $fechaInicio = $request->get('fechaInicio');
      $fechaFin = $request->get('fechaFin');

    	$alumnos = pg_query($db, '	select 	alumIdAlumno, 
                      										alumNombre, 
                      										alumApellidoPaterno, 
                      										alumApellidoMaterno 
                  								from alumno
                                 ');

			//where alumIdAlumno ='.$numeroCuenta

			//return view('puntos.index', compact('alumnos'));

		} /*else {

      $alumnos = pg_query($db,  ' select  alumIdAlumno, 
                                          alumNombre, 
                                          alumApellidoPaterno, 
                                          alumApellidoMaterno 
                                  from alumno');
    }*/

    return view('puntos.index', compact('alumnos'));
		
	}

	public function cartasIndex(Request $request){

		if ($request) {

			$numeroCuenta = $request->get('numeroCuenta');

        $numerosCuenta = DB::table('actividad')
                          ->join('grupo', 'gruIdActividad', '=', 'act_idActividad')
                          ->join('inscripción', 'gruIdGrupo', '=', 'insIdGrupo')
                          ->select('insIdAlumno')
                          ->groupBy('insIdAlumno')
                          ->havingRaw('SUM(act_numeroPuntos) >= 15')
                          ->get();

          //dd($numerosCuenta); 

		      $connString = "host=rigel.fca.unam.mx dbname=li313304901 user=li313304901 password=rigelFCA";
        	$db = pg_connect($connString) or die('connection failed');

        	$alumnos = pg_query($db, '	select 	alumIdAlumno, 
                          										alumNombre, 
                          										alumApellidoPaterno, 
                          										alumApellidoMaterno 
                      								from alumno');

								//where alumIdAlumno ='.$numeroCuenta

			return view('puntos.cartasIndex', compact('alumnos'));
		}	
	}


	public function generarCartaExpres(Request $request){

    $idAlumno = $request->get('idAlumno'); //Request $request

		$connString = "host=rigel.fca.unam.mx dbname=li313304901 user=li313304901 password=rigelFCA";
    $db = pg_connect($connString) or die('connection failed');

   	$query = pg_query($db, '	select 	alumIdAlumno, 
                    									alumNombre, 
                    									alumApellidoPaterno, 
                    									alumApellidoMaterno 
                							from alumno
                							where alumIdAlumno = '.$idAlumno);

    $alumno = pg_fetch_row($query);
		$fecha = new \DateTime();
		//echo $fecha->format('d-m-Y H:i:s');

    if ($alumno) {
      $pdf = PDF::loadView('puntos.cartaExpres', compact('alumno', 'fecha'));
      return $pdf->download('cartaExpres.pdf');  
    } else {
      return redirect('/eventos/cartas')->with('status', 'No se puede generar la carta del alumno');
    }
	}


	public function generarConstancia($id){

      //$idAlumno = $request->get('numeroCuenta');


		  $connString = "host=rigel.fca.unam.mx dbname=li313304901 user=li313304901 password=rigelFCA";

      $db = pg_connect($connString) or die('connection failed');

     	$query = pg_query($db, '	select 	alumIdAlumno, 
                      									alumNombre, 
                      									alumApellidoPaterno, 
                      									alumApellidoMaterno 
                      					from alumno
                      					where alumIdAlumno = '.$id);
     	$alumno = pg_fetch_row($query);
     	$fecha = new \DateTime();

     	/*$constancia = pg_query($db, 'insert into contancia (consIdAlumnos, consPlanEstudios, consFecha, consEstatus, consPersona) 							values ($alumno->alumIdAlumno, $)');
     	//dd($alumno);*/

      $pdf = PDF::loadView('puntos.constancia', compact('alumno'));
      return $pdf->download("Constancia.pdf");
	}
}
    
