<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\EntUsuarios;
use yii\db\Expression;
use app\models\ViewPremiosRestantes;
use app\models\RelUsuarioPremio;
use app\models\ViewUsuarioDatos;

class SiteController extends Controller {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
				'access' => [
						'class' => AccessControl::className (),
						'only' => [
								'logout'
						],
						'rules' => [
								[
										'actions' => [
												'logout'
										],
										'allow' => true,
										'roles' => [
												'@'
										]
								]
						]
				],
				'verbs' => [
						'class' => VerbFilter::className (),
						'actions' => [
								'logout' => [
										'post'
								]
						]
				]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [
				'error' => [
						'class' => 'yii\web\ErrorAction'
				],
				'captcha' => [
						'class' => 'yii\captcha\CaptchaAction',
						'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
				]
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex(){
		$usuario = new EntUsuarios ();

		return $this->render ( 'inicio' );
	}

	public function actionRegistro(){
		$usuario = new EntUsuarios ();

		

		if ($usuario->load ( Yii::$app->request->post () )) {


			if ($usuario->save ()) {


				return $this->render('premio');
			}

			
		}

		return $this->render ( 'registro', [
				'usuario' => $usuario
		] );
	}

	public function actionVerPremio($token=""){
		$nombrePremio = "<h3>¡Estuviste muy cerca!</h3>
			<h1>Mejor suerte para la próxima</h1>
			<p>Fiesta Americana agradece tu participación.</p>";
		$usuarioPremio = RelUsuarioPremio::find()->where(['txt_token'=>$token])->one();

		if($usuarioPremio){
			$nombrePremio = $usuarioPremio->idPremio->txt_nombre;
		}

		return $this->render('premio',['nombrePremio'=>$nombrePremio]);
	}

	/**
	 * Guarda la informacion
	 */
	public function actionGuardarInformacion($tokenEvento=null) {

		$usuario = new EntUsuarios ();
		

		if ($usuario->load ( Yii::$app->request->post () )) {

			if ($usuario->save ()) {

			}

			return $this->renderAjax ( 'mucha-suerte' );
		}
	}

	private function getToken($string='token_'){
		$token = $string . md5 ( uniqid ( $string ) ) . uniqid ();
		return $token;
	}

	/**
	 * Descarga un csv con la informacion necesaria
	 */
	public function actionDescargarRegistros3289ldksd339ffd3jl(){
		$usuarios = ViewUsuarioDatos::find()->all();

		$arrayCsv = [ ];
		$i = 0;

		foreach ( $usuarios as $data ) {

			$arrayCsv [$i] ['nombreCompleto'] = $data->txt_nombre_completo;
			$arrayCsv [$i] ['telefonoCelular'] = $data->txt_telefono_celular;
			$arrayCsv [$i] ['codigoPostal'] = $data->txt_cp;
			$arrayCsv [$i] ['numEdad'] = $data->num_edad;
			$arrayCsv [$i] ['fchRegistro'] = $data->fch_registro;
			$arrayCsv [$i] ['aceptoTerminos'] = $data->acepto_terminos;
			$arrayCsv [$i] ['premio'] = $data->txt_premio;
			

			$i++;
		}


	//print_r($arrayCsv );
	//exit ();

		$this->downloadSendHeaders ( 'reporte.csv' );

		echo $this->array2Csv ( $arrayCsv );
		die();

	}

		private function array2Csv($array) {
		if (count ( $array ) == 0) {
			return null;
		}
		ob_start();
		$df = fopen ( "php://output", "w" );
		fputcsv ( $df, [
				'Nombre completo',
				'Telefono',
				'C.P.',
				'Edad',
				'Fecha registro',
				'Acepto terminos',
				'Premio'
		]
		 );

		foreach ( $array as $row ) {
			fputcsv ( $df, $row );
		}

		fclose ( $df );
		return ob_get_clean();
	}




	private function downloadSendHeaders($filename) {
		// disable caching
		$now = gmdate ( "D, d M Y H:i:s" );
		// header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
		header ( "Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate" );
		header ( "Last-Modified: {$now} GMT" );

		// force download
		header ( "Content-Type: application/force-download" );
		header ( "Content-Type: application/octet-stream" );
		// comentario sin sentido
		header ( "Content-Type: application/download" );

		// disposition / encoding on response body
		header ( "Content-Disposition: attachment;filename={$filename}" );
		header ( "Content-Transfer-Encoding: binary" );
	}

	/**
	 * Cambia el formato de la fecha
	 *
	 * @param unknown $string
	 */
	public static function changeFormatDate($string) {
		$date = date_create ( $string );
		return date_format ( $date, "d-M-Y" );
	}

	/**
	 * Obtenemos la fecha actual para almacenarla
	 *
	 * @return string
	 */
	private function getFechaActual() {

		// Inicializamos la fecha y hora actual
		$fecha = date ( 'Y-m-d H:i:s', time () );
		return $fecha;
	}

}
