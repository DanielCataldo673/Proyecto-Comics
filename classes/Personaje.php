<?php
class Personaje{
    protected $id;
    protected $nombre;
    protected $alias;
    protected $biografia;
    protected $creador;
    protected $primera_aparicion;
    protected $imagen;
    



/* devuelve los datos de un personaje en particular */

public function get_x_id(int $id) : ?Personaje {

     //llamamos a la conexion
     $conexion = (new Conexion())->getConexion();

     $query = "SELECT * FROM personajes WHERE id = $id";
 
     $PDOStatement = $conexion->prepare($query);
 
     $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
 
     $PDOStatement->execute();
    
     $result = $PDOStatement->fetch();
 
     if (!$result) {
         return null;
     }
 
     return $result;
}

/* Devuele el listado completo de personajes */

public function lista_completa() : array {
    $resultado = [];

    //llamamos a la conexion
    $conexion = (new Conexion())->getConexion();

    $query = "SELECT * FROM personajes";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

    $PDOStatement->execute();

    $resultado = $PDOStatement->fetchAll();

    return $resultado;
}


   /* devuelve el nombre de un personaje y su alias entre parentesis  $aliasPrimero 
   true en caso de querer el alias como dato principal (y el verdadero nombre entre parentesis)*/

public function getTitulo($aliasPrimero = False): String{
    if ($aliasPrimero) {
        $result = "$this->alias ($this->nombre)";
    }else {
        $result = "$this->nombre ($this->alias)";
    }
    return $result;
}

/* Metodo Para Insertar un nuevo personaje a la BD */

public function insert($nombre, $alias, $creador, $primera_aparicion, $biografia, $imagen){
    $conexion = (new Conexion())->getConexion();

    $query = "INSERT INTO personajes(id, nombre, alias, biografia, creador, primera_aparicion, imagen) VALUES(NULL, :nombre, :alias, :biografia, :creador, :primera_aparicion, :imagen )";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
        'nombre' => $nombre,
        'alias' => $alias,
        'biografia' => $biografia,
        'creador' => $creador,
        'primera_aparicion' => $primera_aparicion,
        'imagen' => $imagen,
        ]
        );
}
/* editar personajes */
public function edit($nombre, $alias, $creador, $primera_aparicion, $biografia, $id){
    $conexion = (new Conexion())->getConexion();

    $query = "UPDATE  personajes SET nombre = :nombre, alias = :alias, biografia = :biografia, creador = :creador, primera_aparicion = :primera_aparicion WHERE id = :id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
        'id' => $id,
        'nombre' => $nombre,
        'alias' => $alias,
        'biografia' => $biografia,
        'creador' => $creador,
        'primera_aparicion' => $primera_aparicion,
        
        ]
        );
}

/* Remplazar Imagen */

   public function reemplazar_imagen($imagen,$id){
    $conexion = (new Conexion())->getConexion();
    $query = "UPDATE personajes SET imagen = :imagen WHERE id = :id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
        'id' => $id,
        'imagen' => $imagen,
        
        
        ]
        );


   }
/* Eliminar Personaje */

public function delete(){
    $conexion = (new Conexion())->getConexion();
    $query ="DELETE FROM personajes WHERE id = ?";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([$this->id]);



}


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of alias
     */ 
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set the value of alias
     *
     * @return  self
     */ 
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get the value of biografia
     */ 
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * Set the value of biografia
     *
     * @return  self
     */ 
    public function setBiografia($biografia)
    {
        $this->biografia = $biografia;

        return $this;
    }

    /**
     * Get the value of creador
     */ 
    public function getCreador()
    {
        return $this->creador;
    }

    /**
     * Set the value of creador
     *
     * @return  self
     */ 
    public function setCreador($creador)
    {
        $this->creador = $creador;

        return $this;
    }

    /**
     * Get the value of primera_aparicion
     */ 
    public function getPrimera_aparicion()
    {
        return $this->primera_aparicion;
    }

    /**
     * Set the value of primera_aparicion
     *
     * @return  self
     */ 
    public function setPrimera_aparicion($primera_aparicion)
    {
        $this->primera_aparicion = $primera_aparicion;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }
}

?>