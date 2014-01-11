<?php

/*
 * This file is a part of Sculpin.
 *
 * (c) Dragonfly Development Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mavimo\Sculpin\Bundle\ParsedownBundle;

/**
 * Parsedown Converter.
 *
 * @author Marco Vito Moscaritolo <marco@mavimo.org>
 */
class ParsedownConverter extends \Parsedown
{
    public function transform($text)
    {
        return $this->process($text);
    }
}
