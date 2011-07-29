<?php
namespace edp;
abstract class ServiceAbstract
{
    protected $_mapper;
    
    /**
     * __construct 
     * 
     * @param mixed $mapper 
     * @access public
     * @return void
     */
    public function __construct($mapper = null)
    {
        if ($mapper !== null) {
            $this->setMapper($mapper);
        }
    }
 
    /**
     * Get mapper.
     *
     * @return mapper
     */
    public function getMapper()
    {
        return $this->_mapper;
    }
 
    /**
     * Set mapper.
     *
     * @param $mapper the value to be set
     */
    public function setMapper($mapper)
    {
        $this->_mapper = $mapper;
        return $this;
    }
}
