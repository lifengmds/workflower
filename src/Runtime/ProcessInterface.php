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

interface ProcessInterface extends EntityCollectionInterface
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
     * Get notified workflows
     *
     * @param Integer $id process id
     *
     * @return mixed
     */
    public function approve($id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function returnBack($id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function revoke($id);

    /**
     * Refuse to the initiator
     *
     * @param $id
     *
     * @return mixed
     */
    public function refuse($id);

    /**
     * Force close an workflow.
     *
     * @param Integer $id workflow id
     *
     * @return mixed
     */
    public function close($id);


    /**
     * @param $id
     *
     * @return mixed
     */
    public function sign($id);


}