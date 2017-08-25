<?php
/*
 * Copyright (c) KUBO Atsuhiro <kubo@iteman.jp> and contributors,
 * All rights reserved.
 *
 * This file is part of Workflower.
 *
 * This program and the accompanying materials are made available under
 * the terms of the BSD 2-Clause License which accompanies this
 * distribution, and is available at http://opensource.org/licenses/BSD-2-Clause
 */

namespace Workflower\Workflow\Activity;

use Workflower\Workflow\Element\ConditionalInterface;
use Workflower\Workflow\Element\FlowObjectInterface;
use Workflower\Workflow\Element\TransitionalInterface;

interface ActivityInterface extends FlowObjectInterface, TransitionalInterface, ConditionalInterface, WorkItemInterface
{
    public function createWorkItem();

    /**
     * @return bool
     */
    public function isAllocatable();

    /**
     * @return bool
     */
    public function isStartable();

    /**
     * @return bool
     */
    public function isCompletable();

    /**
     * @return bool
     */
    public function isEnded();

    /**
     * @param int $index
     *
     * @return WorkItemInterface
     *
     * @throws \OutOfBoundsException
     */
    public function getWorkItem($index);
}
