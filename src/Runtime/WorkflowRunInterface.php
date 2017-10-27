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

interface WorkflowRunInterface extends EntityCollectionInterface
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
     * Generate a workflow
     *
     * @param Integer $workflow_id   id
     * @param String  $workflow_name name of the workflow
     * @param Integer $user          creator
     *
     * @return mixed
     */
    public function generate($workflow_id, $workflow_name, $user);


    /**
     * Generate processes of a workflow
     *
     * @param Integer $workflow_id   id
     * @param String  $workflow_name name of the workflow
     * @param Integer $user          creator
     *
     * @return mixed
     */
    public function initProcess($workflow_id);

    /**
     * The initiator of the current workflow
     *
     * @return mixed
     */
    public function currentProcess();


    /**
     * The current people to audit 当前审批人（未操作）
     *
     * @return mixed
     */
    public function currentTransactor();

    /**
     * Get pending list of workflow of specified user, or all if user is null
     *
     * @param Integer $user     user id
     * @param Integer $workflow workflow id
     *
     * @return mixed
     */
    public function pending($user, $workflow);

    /**
     * Get list of Finished workflow
     *
     * @param Integer $user     user id
     * @param Integer $workflow workflow id
     *
     * @return mixed
     */
    public function finished($user, $workflow);

    /**
     * Get List of notified workflow
     *
     * @param Integer $user     user id
     * @param Integer $workflow workflow id
     *
     * @return mixed
     */
    public function notified($user, $workflow);

}