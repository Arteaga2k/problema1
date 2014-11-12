<?php

/**
 * @author Carlos
 * Este ser� el modelo base, que heredar�n el resto de modelos
 * En el constructor llamamos a la clase con patron singlenton db
 */
abstract class Model
{

	/**
	 * 
	 * @var unknown
	 */
	protected  $_table;
	
    /**
     *
     * @var unknown
     */
    protected $_db;

    /**
     *
     * @var unknown
     */
    protected $_sql;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        require 'app/libs/db.php';
        $this->_db = Db::singleton();
    }
    
    // metodos abstractos para clases que hereden, ya que no se pueden definir con exactitud
    abstract protected function get($id);

    abstract protected function add();

    abstract protected function edit($id);

    abstract protected function delete($id);

    /**
     *
     * @param string $sql            
     */
    protected function _setSql($sql)
    {
        $this->_sql = $sql;
    }

    /**
     * Ejecuta un query del tipo SELECT que devuelve todas las filas
     *
     * @param string $data            
     * @throws Exception
     * @return multitype:
     */
    public function getAll($data = null)
    {
        if (! $this->_sql) {
            throw new Exception("No hay sql");
        }
        
        $sth = $this->_db->prepare($this->_sql);
        $sth->execute($data);
        return $sth->fetchAll();
    }

    /**
     * Ejecuta un query simple del tipo INSERT, DELETE, UPDATE
     *
     * @param array $params            
     * @throws Exception
     */
    public function singleQuery(array $params = array())
    {
        if (! $this->_sql) {
            throw new Exception("No hay sql");
        }
        
        $sth = $this->_db->prepare($this->_sql);
        $sth->execute($params);
        
       
    }

    /**
     * Ejecuta un query simple del tipo SELECT que devuelve una sola fila
     *
     * @param string $data            
     * @throws Exception
     * @return mixed
     */
    public function getFila(array $params = array())
    {
        if (! $this->_sql) {
            throw new Exception("No hay sql");
        }
        
        $sth = $this->_db->prepare($this->_sql);
        $sth->execute($params);
        return $sth->fetch();
    }
    
    
    
    public function creaSql($array,$accion,$cond,$)
    {  
    	 
    	$cond = array();    	
    	
    	$columns = array_keys($array);
    	$values = array_values($array);
		
		//accion insert into, update set, delete from
    	
    	
    	$query = "
    	$accion (" . implode(", ", $columns) . ")
    	$VALUES ('" . implode("', '", $values) . "')";   	
    
    	 
    	if (count($cond)) {
    		$query .= ' WHERE ' . implode(' AND ', $cond);
    	} 	 
    
    	var_dump($query);
    }
    
    
}