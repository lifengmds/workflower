<?php
/*
 * Copyright (c) 2014 GOTO Hidenori <hidenorigoto@gmail.com>,
 *               2014 KUBO Atsuhiro <kubo@iteman.jp>,
 * All rights reserved.
 *
 * This file is part of Domain Kata.
 *
 * This program and the accompanying materials are made available under
 * the terms of the BSD 2-Clause License which accompanies this
 * distribution, and is available at http://opensource.org/licenses/BSD-2-Clause
 */

namespace Entity\Operation;

use Entity\EntityInterface;

/**
 * @since Interface available since Release 1.1.0
 */
interface EquatableInterface extends OperationInterface
{
    /**
     * @param EntityInterface $target
     *
     * @return bool
     */
    public function equals(EntityInterface $target);
}
