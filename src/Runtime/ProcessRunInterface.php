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
interface ProcessRunInterface extends EntityCollectionInterface
{

    /**
     * Get results create by a specific user
     *
     * @param Integer $user user id
     *
     * @return mixed
     */
    public function belongsTo($user);

    /**
     * Find next step
     *
     * @return mixed
     */
    public function next();

    /**
     * Find previous step
     *
     * @return mixed
     */
    public function previous();

    /**
     * Get notified workflows
     *
     * @param Integer $id process id
     *
     * @return mixed
     */
    public function approve();

    /**
     * @param $id
     *
     * @return mixed
     */
    public function returnBack();

    /**
     * @param $id
     *
     * @return mixed
     */
    public function revoke();

    /**
     * Refuse to the initiator
     *
     * @param $id
     *
     * @return mixed
     */
    public function refuse();

    /**
     * Force close an workflow.
     *
     * @param Integer $id workflow id
     *
     * @return mixed
     */
    public function close();

    /**
     * @param $id
     *
     * @return mixed
     */
    public function sign();

    /**
     * Notify a user 支会
     *
     * @return mixed
     */
    public function notify();

}