<?php
use Cartelera\User\UserRepo;

class UserLogin extends \BaseController
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login()
    {
        $rules = [
            'usuario' => 'required|alpha_dash|min:4',
            'password' => 'required|alpha_dash|min:3'
        ];

        $inputCheck = Input::get('remember');

        $usuario = Input::get('usuario');
        $clave = Input::get('password');

        //recuperamos el usuario
        $user = $this->userRepo->findUsuario($usuario);

        if ($user > 0) {
            $userdata = array(
                'usuario' => $usuario,
                'password' => $clave
            );


            $validator = Validator::make($userdata, $rules);

            if ($validator->passes()) {
                // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
                if (Auth::attempt($userdata, ($inputCheck == 'on') ? true : false)) {

                    // De ser datos válidos nos mandara a la bienvenida
                    return Redirect::to('/');
                    //return View::make('hello');

                } else {

                    // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
                    //Session::flash('message', 'Datos incorrectos!');
                    Session::flash('error', 'Datos incorrectos!');
                    return Redirect::to('/');
                }
            } else {
                return \Redirect::back()->withInput()->withErrors($validator->errors());
            }
        } else {
            //recogemos si es un alummno o profesor
            $datos = $this->userRepo->findPosibleUsuario($usuario, $clave);
            if (count($datos) > 0) {
                $datosparseados = Utils::objectToArray($datos[0]);
                $datosparseados['c'] = sha1(implode('|', $datosparseados));
                Session::flash('mensaje', 'Por ser primera ves que entra al sistema, se le sugiere cambiar su contraseña para mayor privacidad');
                return Redirect::action('UserLogin@changePassword', array('datos' => Utils::dataEncriptar($datosparseados)));
            } else {
                Session::flash('error', 'Datos incorrectos!');
                return Redirect::to('/');
            }
        }
    }

    public function changePassword()
    {
        $datos = Utils::dataDesencriptar(Input::get('datos'));
        $sha1 = sha1(implode('|', array_except($datos, array('c'))));
        if ($datos['c'] == $sha1 && Session::has('iduser')) {
            return View::make('changePassword', compact('datos'));
        } else {
            Session::flush();
            return Redirect::to('/')->with('error', 'hubo un error, inicie sessión');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        Session::flash('global', 'Sesión finalizada ');
        return Redirect::to('/');
    }
}