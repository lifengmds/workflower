<?php
/**
 * Definition for workflow process steps
 *
 * @author: lifeng lifengmds@gmail.com
 *
 */
namespace Workflower\Runtime;

use Illuminate\Database\QueryException;
use Workflower\Persistence\Model as Model;
use Workflower\Definition\Workflow;

class Process extends Model
{
    protected $table = 'workflow_def_process';

    /**
     * Workflow constructor.
     */
    public function __construct()
    {
        parent::__construct();
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