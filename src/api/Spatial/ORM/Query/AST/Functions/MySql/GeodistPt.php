<?php

namespace Core\Spatial\ORM\Query\AST\Functions\MySql;

use Core\Spatial\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * Description of STContains
 *
 * @author Maximilian
 */
class GeodistPt extends AbstractSpatialDQLFunction
{
	protected $platforms = array('mysql');

    protected $functionName = 'geodist_pt';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
