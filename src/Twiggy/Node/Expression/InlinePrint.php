<?php
declare(strict_types=1);

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LatteTools\Twiggy\Node\Expression;

use LatteTools\Twiggy\Compiler;
use LatteTools\Twiggy\Node\Node;

/**
 * @internal
 */
final class InlinePrint extends AbstractExpression
{
	public function __construct(Node $node, int $lineno)
	{
		parent::__construct(['node' => $node], [], $lineno);
	}


	public function compile(Compiler $compiler): void
	{
		$compiler
			->raw('print (')
			->subcompile($this->getNode('node'))
			->raw(')')
		;
	}
}
