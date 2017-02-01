<?php
/**
 * Created by PhpStorm.
 * User: Deprogrammer
 * Date: 2/1/2017
 * Time: 6:53 PM
 */

namespace App\Multi_Tenant;
use Illuminate\Database\Eloquent\Model;

class ClientContext implements Context
{
    /**
     * The current context
     *
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $context;

    /**
     * Set the context
     *
     * @param Illuminate\Database\Eloquent\Model
     */
    public function set(Model $context)
    {
        $this->context = $context;
    }

    /**
     * Check to see if the context has been set
     *
     * @return boolean
     */
    public function has()
    {
        if($this->context) return true;

        return false;
    }

    /**
     * Get the context identifier
     *
     * @return integer
     */
    public function id()
    {
        return $this->context->id;
    }

    /**
     * Get the context column
     *
     * @return string
     */
    public function column()
    {
        return 'client_id';
    }

    /**
     * Get the context table name
     *
     * @return string
     */
    public function table()
    {
        return 'clients';
    }

}