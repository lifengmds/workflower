<?php
/**
 * Definition for workflow process steps
 *
 * @author: lifeng lifengmds@gmail.com
 *
 */
namespace Workflower\Runtime;

use Workflower\Persistence\EntityCollectionInterface;

/**
 * Interface for workflow definition
 *
 * @package Workflow
 * @version 1.0
 */

interface WorkflowInterface extends EntityCollectionInterface
{

    /**
     * Get results create by a specific user
     *
     * @param string $user user key
     *
     * @return mixed
     */
    public function belongsTo($key);


    /**
     * The initiator of the current workflow
     *
     * @return mixed
     */
    public function initiator();


    /**
     * The initiator of the current workflow
     *
     * @return mixed
     */
    public function current();

    /**
     * Get pending list of workflows of specified user, or all if user is null
     *
     * @param Integer $user     user id
     * @param Integer $workflow workflow id
     *
     * @return mixed
     */
    public function pending($user, $workflow);

    /**
     * Get Finished list of workflows
     *
     * @param Integer $user     user id
     * @param Integer $workflow workflow id
     *
     * @return mixed
     */
    public function finished($user, $workflow);

    /**
     * Get notified workflows
     *
     * @param Integer $user     user id
     * @param Integer $workflow workflow id
     *
     * @return mixed
     */
    public function notified($user, $workflow);

}