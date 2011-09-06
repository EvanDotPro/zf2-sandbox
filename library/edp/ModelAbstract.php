<?php
namespace edp;
abstract class ModelAbstract
{
    protected $_model;
    protected $_broker;

    public function __construct($options = null)
    {
        if ($options instanceof \Zend\Config\Config) {
            $options = $options->toArray();
        }
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function setOptions(array $options)
    {
        $classMethods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = $this->_fieldToMethod($key);
            if (in_array($method, $classMethods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
    
    private function _fieldToMethod($name)
    {
        return 'set' . $this->_toCamelCase($name);
    }

    private function _toCamelCase($name)
    {
        return implode('',array_map('ucfirst', explode('_',$name)));
    }

    private function _fromCamelCase($name)
    {
        return trim(preg_replace_callback('/([A-Z])/', function($c){ return '_'.strtolower($c[1]); }, $name),'_');
    }

    public function toArray($array = false)
    {
        $array = $array ?: get_object_vars($this);
        foreach ($array as $key => $value) {
            unset($array[$key]);
            $key = $this->_fromCamelCase($key);
            if (is_object($value)) {
                $array[$key] = $value->toArray();
            } elseif (is_array($value)) {
                $array[$key] = $this->toArray($value);
            } else {
                $array[$key] = $value;
            }
        }
        return $array;
    }
 
    /**
     * Get model.
     *
     * @return model
     */
    public function getModel()
    {
        return $this->_model;
    }
 
    /**
     * Set model.
     *
     * @param $model the value to be set
     */
    public function setModel($model)
    {
        $this->_model = $model;
        return $this;
    }
 
    /**
     * Get broker.
     *
     * @return broker
     */
    public function getBroker()
    {
        return $this->_broker;
    }
 
    /**
     * Set broker.
     *
     * @param $broker the value to be set
     */
    public function setBroker($broker)
    {
        if (null === $this->_broker) {
            $this->setBroker(new ModelPluginBroker());
        }
        return $this->_broker;
    }
}
