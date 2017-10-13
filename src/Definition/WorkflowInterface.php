<?php
/**
 * Definition for workflow process steps
 *
 * @author: lifeng lifengmds@gmail.com
 *
 */
namespace Workflower\Definition;

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


}