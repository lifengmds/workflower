<?php
/**
 * Definition for workflow process steps
 *
 * @author: lifeng lifengmds@gmail.com
 *
 */
namespace Workflower\Runtime;

use Illuminate\Database\QueryException;
use Workflower\Runtime\WorkflowRunInterface;
use Workflower\Persistence\Model as Model;
use Workflower\Definition\Process;
use Workflower\Definition\Workflow as Workflow;

/**
 * Class Workflow
 *
 * @package Workflower\Definition
 *
 */
class WorkflowRun extends Model implements WorkflowRunInterface
{
    protected $table = 'workflow_def';

    /**
     * Workflow constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * One workflow has multiple process steps
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function process()
    {
        return $this->hasMany(Process, 'workflow_id');
    }

    /**
     * Belongs to one workflow
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workflow()
    {
        return $this->belongsTo(Workflow, 'workflow_id');
    }

    /**
     * Init when create a workflow
     *
     * @param Integer $id workflow id
     *
     * @return void
     */
    public function init($id): void
    {
        //Create a START process as the first step of a workflow
        Process::new(['workflow_id' => $id, 'type' => 'start', 'is_auto' => 1, 'process_index' => 1]);
    }

    /**
     * Init when create a workflow
     *
     * @param Integer $id workflow id
     *
     * @return void
     */
    public function initProcess($id): void
    {
        //Create a START process as the first step of a workflow
        Process::new(['workflow_id' => $id, 'type' => 'start', 'is_auto' => 1, 'process_index' => 1]);
    }

    /**
     * Generate a workflow
     *
     * @param Integer $workflow_id   id
     * @param String  $workflow_name name of the workflow
     * @param Integer $user          creator
     *
     * @return mixed
     */
    public function generate($workflow_id, $workflow_name, $user)
    {
        $this->workflow_def_id = $workflow_id;
        $this->workflow_name = $workflow_name;
        $this->created_by = $user;
        $this->save();
        //$workflow = self::create(['workflow_def_id' => $workflow_id, 'workflow_name' => $workflow_name, 'created_by' => $user]);

        //Create runtime process
        $this->init($this->id);
    }

    /**
     * The initiator of the current workflow
     *
     * @return mixed
     */
    public function initiator()
    {
        // TODO: Implement initiator() method.
    }

    /**
     * The initiator of the current workflow
     *
     * @return mixed
     */
    public function currentProcess()
    {
        // TODO: Implement currentProcess() method.
    }

    /**
     * The current people to audit 当前审批人（未操作）
     *
     * @return mixed
     */
    public function currentTransactor()
    {
        // TODO: Implement currentTransactor() method.
    }

    /**
     * Get pending list of workflow of specified user, or all if user is null
     *
     * @param Integer $user user id
     * @param Integer $workflow workflow id
     *
     * @return mixed
     */
    public function pending($user, $workflow)
    {
        // TODO: Implement pending() method.
    }

    /**
     * Get list of Finished workflow
     *
     * @param Integer $user user id
     * @param Integer $workflow workflow id
     *
     * @return mixed
     */
    public function finished($user, $workflow)
    {
        // TODO: Implement finished() method.
    }

    /**
     * Get List of notified workflow
     *
     * @param Integer $user user id
     * @param Integer $workflow workflow id
     *
     * @return mixed
     */
    public function notified($user, $workflow)
    {
        // TODO: Implement notified() method.
    }

    /**
     * Create a workflow
     *
     * @param string $workflow_name workflow name
     * @param string $table         table name
     * @param string $table_name    table alias name
     * @param string $memo          drescription
     * @param string $user_id       created_by
     *
     * @return mixed
     */
    public function create($workflow_name, $table, $table_name, $memo, $user_id)
    {
        try{
            $this->workflow_name = $workflow_name;
            $this->form_key = $table;
            $this->form_name = $table_name;
            $this->memo = $memo;
            $this->created_by = $user_id;
            $this->save();
            return $this->id;
        }catch (QueryException $ex){
            return $ex->getMessage();
        }catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Create a workflow
     *
     * @param string $workflow_name workflow name
     * @param string $table         table name
     * @param string $table_name    table alias name
     * @param string $memo          drescription
     * @param string $user_id       created_by
     *
     * @return mixed
     */
    public function modify($args, $workflow_name, $table, $table_name, $memo, $user_id)
    {
        try{
            $this->get($args['id']);
            foreach ($args as $arg => $v) {
                $this->$arg = $v;
            }
            $this->workflow_name = $workflow_name;
            $this->form_key = $table;
            $this->form_name = $table_name;
            $this->memo = $memo;
            $this->created_by = $user_id;
            $this->save();
            return $this->id;
        }catch (QueryException $ex){
            return $ex->getMessage();
        }catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}