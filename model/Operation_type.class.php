<?php


class Operation_type
{

    private $id_operation_type;
    private $price;
    private $type;

    /**
     * Operation_type constructor.
     * @param $price
     * @param $type
     */
    public function __construct($price, $type)
    {
        $this->price = $price;
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getIdOperationType()
    {
        return $this->id_operation_type;
    }

    /**
     * @param mixed $id_operation_type
     */
    public function setIdOperationType($id_operation_type): void
    {
        $this->id_operation_type = $id_operation_type;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }



}