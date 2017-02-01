<?php
/**
 * Created by PhpStorm.
 * User: Deprogrammer
 * Date: 2/1/2017
 * Time: 6:51 PM
 */

namespace App\Multi_Tenant\Context;
use Illuminate\Database\Eloquent\Model;


interface Context
{

    /**
     * Set the context
     *
     * @param Illuminate\Database\Eloquent\Model
     */
    public function set(Model $context);

    /**
     * Check to see if the context has been set
     *
     * @return boolean
     */
    public function has();

    /**
     * Get the context identifier
     *
     * @return integer
     */
    public function id();

    /**
     * Get the context column
     *
     * @return string
     */
    public function column();

    /**
     * Get the context table name
     *
     * @return string
     */
    public function table();


}