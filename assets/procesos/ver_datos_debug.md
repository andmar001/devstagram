- Ver la información enviade desde el formulario por post
public function store(Request $request)
{
    dd($request -> get('username'));  // acceder solo a un campo especifico
}

public function store(Request $request)
{
    dd($request -> all());  // acceder a toda la respuesta enviada por post
}

- la propíedad name del input debe ser igual al nombre de la columna en la base de datos, es la que se envia al servidor

# validaciones
el campo de la etiqueta que se toma para realizar las validacion es el name = "name"