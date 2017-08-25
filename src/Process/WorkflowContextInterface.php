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

namespace Workflower\Process;

use Entity\EntityInterface;

/**
 * @since Interface available since Release 1.1.0
 */
interface WorkflowContextInterface extends EntityInterface
{
    /**
     * @return int|string
     */
    public function getWorkflowId();
}
