<?php
/**
 * Definition for workflow process steps
 *
 * @author: lifeng lifengmds@gmail.com
 *
 */
namespace Workflower\Definition;

use Illuminate\Database\QueryException;
use Workflower\Persistence\WorkflowerInterface;
use Workflower\Persistence\Model;
use Workflower\Definition\Process;

class Workflow extends Model
{
    protected $table = 'workflow_def';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'workflow_name',
        'form_key',
        'form_name',
        'memo',
        'created_by',
        'updated_by'
    ];

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
     * Init when create a workflow
     *
     * @param Integer $id workflow id
     *
     * @return void
     */
    public function init($id): void
    {
        //Create a START process as the first step of a workflow
        //Process::new(['workflow_id' => $id, 'type' => 'start', 'is_auto' => 1, 'process_index' => 1]);
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
   /* public function create($workflow_name, $table, $table_name, $memo, $user_id)
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
    }*/

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
/*    public function modify($args, $workflow_name, $table, $table_name, $memo, $user_id)
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
*/
}