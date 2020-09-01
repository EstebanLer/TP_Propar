<?php


class Operation
{

    private $id_operation;
    private $id_customer;
    private $id_worker;
    private $id_type;

    private $status;
    private $creation_date;
    private $date_start;
    private $date_end;

    private $description;

    /**
     * Operation constructor.
     * @param $id_customer
     * @param $id_type
     * @param $status
     * @param $description
     */
    public function __construct($id_customer, $id_type, $status, $description)
    {
        $this->id_customer = $id_customer;
        $this->id_type = $id_type;
        $this->description = $description;
        $this->status = "Available"; // par défaut, le statut est available
    }


    /**
     * @return mixed
     */
    public function getIdOperation()
    {
        return $this->id_operation;
    }

    /**
     * @param mixed $id_operation
     */
    public function setIdOperation($id_operation): void
    {
        $this->id_operation = $id_operation;
    }

    /**
     * @return mixed
     */
    public function getIdCustomer()
    {
        return $this->id_customer;
    }

    /**
     * @param mixed $id_customer
     */
    public function setIdCustomer($id_customer): void
    {
        $this->id_customer = $id_customer;
    }

    /**
     * @return mixed
     */
    public function getIdWorker()
    {
        return $this->id_worker;
    }

    /**
     * @param mixed $id_worker
     */
    public function setIdWorker($id_worker): void
    {
        $this->id_worker = $id_worker;
    }

    /**
     * @return mixed
     */
    public function getIdType()
    {
        return $this->id_type;
    }

    /**
     * @param mixed $id_type
     */
    public function setIdType($id_type): void
    {
        $this->id_type = $id_type;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * @param mixed $creation_date
     */
    public function setCreationDate($creation_date): void
    {
        $this->creation_date = $creation_date;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->date_start;
    }

    /**
     * @param mixed $date_start
     */
    public function setDateStart($date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->date_end;
    }

    /**
     * @param mixed $date_end
     */
    public function setDateEnd($date_end): void
    {
        $this->date_end = $date_end;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }


}