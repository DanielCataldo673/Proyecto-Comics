<?php

class Comic {
    protected $id;
    protected $personaje_principal;
    protected $serie;
    protected $volumen;
    protected $numero;
    protected $titulo;
    protected $publicacion;
    protected $guionista;
    protected $artista;
    protected $bajada;
    protected $portada;
    protected $origen;
    protected $editorial;
    protected $precio;

    protected $createValues= ['id', 'volumen', 'numero',
      'titulo', 'publicacion', 'bajada', 'portada', 'origen', 'editorial', 'precio'];
      
      /* Metodo Para Insertar un nuevo comic a la BD */

public function insert($titulo,$personaje_principal_id,$serie_id,$guionista_id,$artista_id,$volumen,$numero,$publicacion,$origen,$editorial,$bajada,$portada,$precio){
    $conexion = (new Conexion())->getConexion();

    $query = "INSERT INTO comics VALUES (NULL,:titulo,:personaje_principal_id,:serie_id,:guionista_id,:artista_id,:volumen,:numero,:publicacion,:origen,:editorial,:bajada,:portada,:precio)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
        'titulo' => $titulo,
        'personaje_principal_id' => $personaje_principal_id,
        'serie_id' => $serie_id,
        'guionista_id' => $guionista_id,
        'artista_id' => $artista_id,
        'volumen' => $volumen,
        'numero' => $numero,
        'publicacion' => $publicacion,
        'origen' => $origen,
        'editorial' => $editorial,
        'bajada' => $bajada,
        'portada' => $portada,
        'precio' => $precio,

        ]
        );
}
       
       /* editar comic */

public function edit($titulo,$personaje_principal_id,$serie_id,$guionista_id,$artista_id,$volumen,$numero,$publicacion,$origen,$editorial,$bajada,$precio,$id){
    $conexion = (new Conexion())->getConexion();

    $query = "UPDATE comics SET
       titulo = :titulo,
       personaje_principal_id = :personaje_principal_id,
       serie_id = :serie_id,
       guionista_id = :guionista_id,
       artista_id = :artista_id,
       volumen = :volumen,
       numero = :numero,
       publicacion = :publicacion,
       origen = :origen,
       editorial = :editorial,
       bajada = :bajada,
       precio = :precio
       WHERE id = :id
   
    ";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
        'id' => $id,    
        'titulo' => $titulo,
        'personaje_principal_id' => $personaje_principal_id,
        'serie_id' => $serie_id,
        'guionista_id' => $guionista_id,
        'artista_id' => $artista_id,
        'volumen' => $volumen,
        'numero' => $numero,
        'publicacion' => $publicacion,
        'origen' => $origen,
        'editorial' => $editorial,
        'bajada' => $bajada,
        'precio' => $precio,

        ]
        );
}


/* Remplazar Imagen */

public function reemplazar_imagen($imagen,$id){
    $conexion = (new Conexion())->getConexion();
    $query = "UPDATE comics SET portada = :portada WHERE id = :id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
        'id' => $id,
        'portada' => $imagen,
        
        
        ]
        );


   }

    /* Eliminar comic */

public function delete(){
    $conexion = (new Conexion())->getConexion();
    $query ="DELETE FROM comics WHERE id = ?";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([$this->id]);



}





      /* Devuelve es una instancia del objeto comic, con todas sus propiedades */
      public function createComic($comicData) : Comic {
        $comic = new self();
  /* primero, por cada valor en nuestro array de valores, buscamos el valor correspondiente y se lo asignamos a la propiedad */

        foreach ($this->createValues as $value) {
            $comic->{$value} = $comicData[$value];
        }
      
     /* guionistas */

     $comic->guionista = (new Guionista())->get_x_id($comicData['guionista_id']);

     /* Artista */

     $comic->artista = (new Artista())->get_x_id($comicData['artista_id']);

     /* personaje principal */

     $comic->personaje_principal = (new Personaje())->get_x_id($comicData['personaje_principal_id']);

     /* serie */

     $comic->serie = (new Serie())->get_x_id($comicData['serie_id']);

     return $comic;


}
    //Metodo
    //Devuele catalogo Completo

    public function catalogo_completo() : array {
        $catalogo = [];

        //llamamos a la conexion
        $conexion = (new Conexion())->getConexion();

        $query = "SELECT * FROM comics";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);

        $PDOStatement->execute();

        while($result = $PDOStatement->fetch()){
            $catalogo[] = $this->createComic($result);
        }

        return $catalogo;
    }

        //Devuelve el catalogo de productos de un personaje en particular

        public function catalogo_x_personaje(int $personaje_id) : array {
            $catalogo = [];
    
            //llamamos a la conexion
            $conexion = (new Conexion())->getConexion();
    
            $query = "SELECT * FROM comics WHERE personaje_principal_id= ?";
    
            $PDOStatement = $conexion->prepare($query);
    
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    
            $PDOStatement->execute(
                [$personaje_id]
            );
    
            while($result = $PDOStatement->fetch()){
                $catalogo[] = $this->createComic($result);
            }
    
    
            return $catalogo;
        



}

//Devuelve los datos de un producto en particular

public function producto_x_id(int $idProducto) : ?Comic {
    

    //llamamos a la conexion
    $conexion = (new Conexion())->getConexion();

    $query = "SELECT * FROM comics WHERE id = :idProducto";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);

    $PDOStatement->execute(
        [
            'idProducto' => $idProducto
        ]
    );

    $result = $this->createComic($PDOStatement->fetch());

    if (!$result) {
        return null;
    }

    return $result;


}

//Precio formateado

public function precio_formateado(){
    return number_format($this->precio, 2, ",", ".");
}

/* Metodo bajada reducida */

function bajada_reducida(int $cantidad =8): string {

    $texto = $this->bajada;

    /* explode - divide un string en varios string */
    $array = explode(" " , $texto);

    /* contar cuantas palabras hay en el array */
    if(count($array) <= $cantidad){
        $resultado = $texto;
    }else {
        array_splice($array, $cantidad);
        $resultado = implode(" " , $array) . "...";
    }

    return $resultado;
 }

/* Traer los nombres de cada clase sin usar JOIN (con los metodos) */

    public function nombre_completo() {
        return $this->getSerie()->getNombre() . "Vol." . $this->volumen . "#" . $this->numero;
    }


   

    /* GETTER */

    public function getSerie() :Serie
    {
        return $this->serie;
    }

    /**
     * Get the value of volumen
     */ 
    public function getVolumen()
    {
        return $this->volumen;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Get the value of publicacion
     */ 
    public function getPublicacion()
    {
        return $this->publicacion;
    }

    public function getGuion() {
        return $this->guionista->getNombre_Completo();
    }

    public function getArte() {
        return $this->artista->getNombre_Completo();
    }

    /**
     * Get the value of bajada
     */ 
    public function getBajada()
    {
        return $this->bajada;
    }

    /**
     * Get the value of portada
     */ 
    public function getPortada()
    {
        return $this->portada;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of editorial
     */ 
    public function getEditorial()
    {
        return $this->editorial;
    }

    public function getPersonaje_Prinipal(): Personaje
    {
        return $this->personaje_principal;
    }

    public function getGuionista(): Guionista
    {
        return $this->guionista;
    }

    public function getArtista(): Artista
    {
        return $this->artista;
    }

    /**
     * Get the value of origen
     */ 
    public function getOrigen()
    {
        return $this->origen;
    }
}




?>