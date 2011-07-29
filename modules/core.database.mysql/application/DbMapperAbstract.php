<?php
namespace CoreDatabaseMysql;
use Zend\Db\Adapter\AbstractAdapter;
abstract class DbMapperAbstract
{
    /**
     * Database adapter for read queries
     *
     * @var AbstractAdapter
     */
    protected $_readAdapter;

    /**
     * Database adapter for write queries
     *
     * @var AbstractAdapter
     */
    protected $_writeAdapter;

    /**
     * Storage 
     * 
     * @var array
     */
    protected $_storage = array();

    /**
     * Default database adapter
     *
     * @var AbstractAdapter
     */
    protected static $_defaultAdapter;

    /**
     * Table name
     *
     * @var string
     */
    protected $_tableName;

    /**
     * Model class name 
     * 
     * @var string
     */
    protected $_modelClass;


    /**
     * Constructor
     *
     * This method is final, because it should not be used to initialize, use
     * {@link _init()} instead
     *
     * @param AbstractAdapter $writeAdapter
     * @param AbstractAdapter $readAdapter
     *
     * @throws Exception If there is no adapter defined
     *
     * @return void
     */
    final public function __construct(AbstractAdapter $writeAdapter = null, AbstractAdapter $readAdapter = null)
    {
        if (null === $writeAdapter) {
            if (null === ($writeAdapter = self::getDefaultAdapter())) {
                throw new \Exception('There was no adapter defined');
            }
        }

        if (null === $readAdapter) {
            $readAdapter = $writeAdapter;
        }

        $this->setReadAdapter($readAdapter);
        $this->setWriteAdapter($writeAdapter);

        $this->_init();
    }

    /**
     * Init hook
     *
     * @return void
     */
    protected function _init()
    {}

    /**
     * Get the database adapter for read queries
     *
     * @return AbstractAdapter
     */
    public function getReadAdapter()
    {
        return $this->_readAdapter;
    }

    /**
     * Set readAdapter.
     *
     * @param $readAdapter the value to be set
     */
    public function setReadAdapter($readAdapter)
    {
        $this->_readAdapter = $readAdapter;
        return $this;
    }

    /**
     * Get the database adapter for write queries
     *
     * @return AbstractAdapter
     */
    public function getWriteAdapter()
    {
        return $this->_writeAdapter;
    }

    /**
     * Set writeAdapter.
     *
     * @param $writeAdapter the value to be set
     */
    public function setWriteAdapter($writeAdapter)
    {
        $this->_writeAdapter = $writeAdapter;
        return $this;
    }

    /**
     * Get the table name
     *
     * @return string
     */
    public function getTableName()
    {
        return $this->_tableName;
    }

    /**
     * Set the default database adapter
     *
     * @param AbstractAdapter $adapter
     *
     * @return void
     */
    public static function setDefaultAdapter(AbstractAdapter $adapter)
    {
        self::$_defaultAdapter = $adapter;
    }

    /**
     * Get the default database adapter
     *
     * @return AbstractAdapter
     */
    public static function getDefaultAdapter()
    {
        return self::$_defaultAdapter;
    }


    /**
     * Convert DB rows to model classes 
     * 
     * @param array $rows 
     * @param string $class 
     * @return array
     */
    protected function _rowsToModels($rows, $class = false)
    {
        if ($class == false) $class = $this->_modelClass;
        if (!$rows) return array();
        foreach ($rows as $i => $row) {
            $rows[$i] = $this->_rowToModel($row, $class);
        }
        return $rows;
    }

    /**
     * Convert DB row to model classes 
     * 
     * @param array $row 
     * @param string $class 
     * @return mixed
     */
    protected function _rowToModel($row, $class = false)
    {
        if ($class == false) $class = $this->_modelClass;
        $model = ($row) ? new $class($row) : false;
        if ($model) $this->_addModelToCache($model);
        return $model;
    }

    protected function _setCachedModel($model, $keys)
    {
        if (is_array($keys)) {
            foreach ($keys as $key) {
                $this->_storage[$key] = $model;
            }
        } else {
            $this->_storage[$keys] = $model;
        }
    }

    protected function _getCachedModel($key)
    {
        if (!isset($this->_storage[$key])) {
            return false;
        }  
        return $this->_storage[$key];
    }

    /**
     * _addModelToCache 
     *
     * Override this method to enable model caching
     * 
     * @param mixed $model 
     * @return void
     */
    protected function _addModelToCache($model)
    {
        return false;
    }
}
