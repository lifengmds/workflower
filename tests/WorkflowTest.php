<?php
/**
 * Created by PhpStorm.
 * User: michaellee
 * Date: 9/20/17
 * Time: 8:53 PM
 */

namespace Workflower;

use PHPUnit\Framework\TestCase;
use Workflower\Definition\Workflow;

class WorkflowTest extends TestCase
{
    /**
     * @var workflow
     */
    protected $workflow;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->workflow = new Workflow();
    }


    /**
     * @test
     */
    public function start()
    {
        $data = ['workflow_name' => 'workname', 'form_key' => 'tabfdfles', 'form_name' => 'testtasfble', 'memo' => '测s试表2'];
        /*$flow = New Workflow();
        $flow->workflow_name = 'workflow name test';
        $flow->form_key = 'formkey testing';
        $flow->form_name = 'form name';
        $flow->save();*/
        //$flow->fill($data);
        Workflow::create($data);
        //Workflow::new($data);
        //print_r($this->workflow->create('workflow name','tables','testtable','测试表','memo',1));
    }

}