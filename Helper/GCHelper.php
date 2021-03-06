<?php
/**
 * Piwik PRO - cloud hosting and enterprise analytics consultancy
 * from the creators of Piwik.org
 *
 * @link http://piwik.pro
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\SiteMigration\Helper;

use Piwik\Singleton;

class GCHelper extends Singleton
{
    protected function __construct()
    {
        $this->enableGC();

        parent::__construct();
    }

    public function enableGC()
    {
        if (!gc_enabled()) {
            gc_enable();
        }
    }

    public function cleanup()
    {
        gc_collect_cycles();
    }

    public function cleanVariable(&$variable)
    {
        unset($variable);
    }
}
