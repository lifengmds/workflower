<?php
/*
 * Copyright (c) KUBO Atsuhiro <kubo@iteman.jp> and contributors,
 * All rights reserved.p
 *
 * This file is part of Workflower.
 *
 * This program and the accompanying materials are made available under
 * the terms of the BSD 2-Clause License which accompanies this
 * distribution, and is available at http://opensource.org/licenses/BSD-2-Clause
 */

namespace Workflower\Workflow\Event;

use Workflower\Workflow\Element\TransitionalInterface;

class StartEvent extends Event implements EventInterface, TransitionalInterface
{
}
