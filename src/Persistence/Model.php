<?php
/**
 * Created by PhpStorm.
 * User: michaellee
 * Date: 9/20/17
 * Time: 5:10 PM
 */

namespace Workflower\Persistence;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Base Call for model handling
 *
 * @package Workflow
 * @version 1.0
 */

class Model extends BaseModel implements EntityCollectionInterface
{

    private $_capsule = null;
    private $_config = null;
    private $_db = null;
    public $instance = null;
    public $model = null;

    public function __construct()
    {
        parent::__construct();
        $this->_config = include('config.php');
        $this->_capsule = new Capsule();
        $this->_capsule->addConnection($this->config['databases']['mysql']);
        $this->_capsule->setAsGlobal();
        $this->_capsule->bootEloquent();
        $this->model = get_called_class();
        $this->_db = $this->_capsule->table($this->table_name);
    }

    /**
     *
     *
     * @param Integer $id id to query
     *
     * @return Model
     */
    public function get($key)
    {
        return call_user_func($this->model."::find", $key);
    }

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
    public function list($offset, $limit, $order_by, $order)
    {
        return $this->_db
            ->orderBy($order_by, $order)
            ->offset($offset)
            ->limit($limit)
            ->get();
    }

    /**
     * Get results create by a specific user
     *
     * @param string $id user id
     *
     * @return mixed
     */
    public function belongsToUser($id)
    {
        return $this->db->where('created_by', $id)->get();
    }

    /**
     * Update an Entity by instance
     *
     * @param Array $args instance to create
     *
     * @return Model
     */
    public function modify($args)
    {
        try{
            $this->get($args['id']);
            foreach ($args as $arg => $v) {
                $this->$arg = $v;
            }
            $this->save();
            return $this;
        }catch (QueryException $ex){
            return $ex->getMessage();
        }catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    /**
     * Create a workflow
     *
     * @param string $args workflow name
     *
     * @return Model
     */
    public function new($args)
    {
        try{
            return call_user_func($this->model."::create", $args);
        }catch (QueryException $ex){
            return $ex->getMessage();
        }catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Delete a record
     *
     * @param Integer $id instance to remove
     *
     * @return Integer
     */
    public function remove($id)
    {
        try{
            return call_user_func($this->model."::destroy", $id);
        }catch (QueryException $ex){
            return $ex->getMessage();
        }catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Retrieve an external iterator
     *
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }

    /**
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        // TODO: Implement count() method.
    }

}