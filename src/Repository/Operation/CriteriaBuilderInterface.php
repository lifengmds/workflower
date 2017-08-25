<?php
/*
 * Copyright (c) 2014 KUBO Atsuhiro <kubo@iteman.jp>,
 * All rights reserved.
 *
 * This file is part of Domain Kata.
 *
 * This program and the accompanying materials are made available under
 * the terms of the BSD 2-Clause License which accompanies this
 * distribution, and is available at http://opensource.org/licenses/BSD-2-Clause
 */

namespace Repository\Operation;

use Entity\CriteriaInterface;

/**
 * @since Interface available since Release 1.2.0
 */
interface CriteriaBuilderInterface extends CriteriaInterface, OperationInterface
{
    /**
     * @return CriteriaInterface
     */
    public function build();
}
