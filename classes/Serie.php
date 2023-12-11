<?php
class Serie{
    protected $id;
    protected $nombre;
    protected $historia;


    /* Devuele el listado completo de series */

public function lista_completa() : array {
    $resultado = [];

    //llamamos a la conexion
    $conexion = (new Conexion())->getConexion();

    $query = "SELECT * FROM series";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

    $PDOStatement->execute();

    $resultado = $PDOStatement->fetchAll();

    return $resultado;
}
    


/* devuelve los datos de un artista en particular */

public function get_x_id(int $id) : ?Serie {

     //llamamos a la conexion
     $conexion = (new Conexion())->getConexion();

     $query = "SELECT * FROM series WHERE id = $id";
 
     $PDOStatement = $conexion->prepare($query);
 
     $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
 
     $PDOStatement->execute();
    
     $result = $PDOStatement->fetch();
 
     if (!$result) {
         return null;
     }
 
     return $result;
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
     * Get the value of historia
     */ 
    public function getHistoria()
    {
        return $this->historia;
    }

    /**
     * Set the value of historia
     *
     * @return  self
     */ 
    public function setHistoria($historia)
    {
        $this->historia = $historia;

        return $this;
    }
}

?>