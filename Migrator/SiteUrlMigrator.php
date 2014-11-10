<?php
/**
 * Piwik PRO - cloud hosting and enterprise analytics consultancy
 * from the creators of Piwik.org
 *
 * @link http://piwik.pro
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\SiteMigration\Migrator;

use Piwik\Plugins\SiteMigration\Helper\DBHelper;
use Piwik\Plugins\SiteMigration\Helper\GCHelper;

class SiteUrlMigrator extends Migrator
{
    /**
     * @var SiteMigrator
     */
    protected $siteMigrator;

    public function __construct(DBHelper $targetDb, GCHelper $gcHelper, Migrator $siteMigrator)
    {
        $this->siteMigrator = $siteMigrator;

        parent::__construct($targetDb, $gcHelper);
    }

    protected function translateRow(&$row)
    {
        $row['idsite'] = $this->siteMigrator->getNewId($row['idsite']);
    }

    /**
     * @return string Name of the table migrated by this migration
     */
    protected function getTableName()
    {
        return 'site_url';
    }

    /**
     * @param array $row
     *
     * @return int  The current id stored in the given row
     */
    protected function getIdFromRow(&$row)
    {
        return null;
    }
}
