<?php
/**
 * Definition for workflow process steps
 *
 * @author: lifeng lifengmds@gmail.com
 *
 */
namespace Workflower\Persistence;

/**
 * Interface for workflow definition
 *
 * @package Workflow
 * @version 1.0
 */

interface EntityCollectionInterface extends EntityInterface, \Countable, \IteratorAggregate
{

    /**
     * Get item by key
     *
     * @param string|int $key key/id to query
     *
     * @return EntityCollectionInterface
     */
    public function get($key);

    /**
     * Remove item by id
     *
     * @param Integer $key instance to remove
     *
     * @return Boolean
     */
    public function remove($key);


    /**
     * Update an Entity by instance
     *
     * @param Array $args args to modify
     *
     * @return mixed
     */
    public function update($args);

    /**
     * Query workflow definition
     *
     * @param integer $offset   pagination start offset
     * @param integer $limit    page size
     * @param string  $order_by order
     * @param string  $order    asc or desc
     *
     * @return mixed
     */
    public function list($offset, $limit, $order_by, $order);




}