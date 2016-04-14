<?php

namespace Map;

use \Listing;
use \ListingQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'listing' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ListingTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ListingTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'hdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'listing';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Listing';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Listing';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id field
     */
    const COL_ID = 'listing.id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'listing.title';

    /**
     * the column name for the size field
     */
    const COL_SIZE = 'listing.size';

    /**
     * the column name for the unit_number field
     */
    const COL_UNIT_NUMBER = 'listing.unit_number';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'listing.price';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'listing.description';

    /**
     * the column name for the hdb_id field
     */
    const COL_HDB_ID = 'listing.hdb_id';

    /**
     * the column name for the realtor_id field
     */
    const COL_REALTOR_ID = 'listing.realtor_id';

    /**
     * the column name for the latitude field
     */
    const COL_LATITUDE = 'listing.latitude';

    /**
     * the column name for the longitude field
     */
    const COL_LONGITUDE = 'listing.longitude';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'listing.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'listing.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Title', 'Size', 'UnitNumber', 'Price', 'Description', 'HdbId', 'RealtorId', 'Latitude', 'Longitude', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'title', 'size', 'unitNumber', 'price', 'description', 'hdbId', 'realtorId', 'latitude', 'longitude', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(ListingTableMap::COL_ID, ListingTableMap::COL_TITLE, ListingTableMap::COL_SIZE, ListingTableMap::COL_UNIT_NUMBER, ListingTableMap::COL_PRICE, ListingTableMap::COL_DESCRIPTION, ListingTableMap::COL_HDB_ID, ListingTableMap::COL_REALTOR_ID, ListingTableMap::COL_LATITUDE, ListingTableMap::COL_LONGITUDE, ListingTableMap::COL_CREATED_AT, ListingTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'title', 'size', 'unit_number', 'price', 'description', 'hdb_id', 'realtor_id', 'latitude', 'longitude', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Title' => 1, 'Size' => 2, 'UnitNumber' => 3, 'Price' => 4, 'Description' => 5, 'HdbId' => 6, 'RealtorId' => 7, 'Latitude' => 8, 'Longitude' => 9, 'CreatedAt' => 10, 'UpdatedAt' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'title' => 1, 'size' => 2, 'unitNumber' => 3, 'price' => 4, 'description' => 5, 'hdbId' => 6, 'realtorId' => 7, 'latitude' => 8, 'longitude' => 9, 'createdAt' => 10, 'updatedAt' => 11, ),
        self::TYPE_COLNAME       => array(ListingTableMap::COL_ID => 0, ListingTableMap::COL_TITLE => 1, ListingTableMap::COL_SIZE => 2, ListingTableMap::COL_UNIT_NUMBER => 3, ListingTableMap::COL_PRICE => 4, ListingTableMap::COL_DESCRIPTION => 5, ListingTableMap::COL_HDB_ID => 6, ListingTableMap::COL_REALTOR_ID => 7, ListingTableMap::COL_LATITUDE => 8, ListingTableMap::COL_LONGITUDE => 9, ListingTableMap::COL_CREATED_AT => 10, ListingTableMap::COL_UPDATED_AT => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'title' => 1, 'size' => 2, 'unit_number' => 3, 'price' => 4, 'description' => 5, 'hdb_id' => 6, 'realtor_id' => 7, 'latitude' => 8, 'longitude' => 9, 'created_at' => 10, 'updated_at' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('listing');
        $this->setPhpName('Listing');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Listing');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('size', 'Size', 'DOUBLE', true, null, null);
        $this->addColumn('unit_number', 'UnitNumber', 'VARCHAR', true, 10, null);
        $this->addColumn('price', 'Price', 'DOUBLE', true, null, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 1000, null);
        $this->addForeignKey('hdb_id', 'HdbId', 'INTEGER', 'hdb', 'id', true, null, null);
        $this->addForeignKey('realtor_id', 'RealtorId', 'INTEGER', 'realtor', 'id', true, null, null);
        $this->addColumn('latitude', 'Latitude', 'REAL', false, null, null);
        $this->addColumn('longitude', 'Longitude', 'REAL', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Hdb', '\\Hdb', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':hdb_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Realtor', '\\Realtor', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':realtor_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Photo', '\\Photo', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':listing_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'Photos', false);
        $this->addRelation('Watchlist', '\\Watchlist', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':listing_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'Watchlists', false);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()
    /**
     * Method to invalidate the instance pool of all tables related to listing     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        PhotoTableMap::clearInstancePool();
        WatchlistTableMap::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ListingTableMap::CLASS_DEFAULT : ListingTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Listing object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ListingTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ListingTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ListingTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ListingTableMap::OM_CLASS;
            /** @var Listing $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ListingTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ListingTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ListingTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Listing $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ListingTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ListingTableMap::COL_ID);
            $criteria->addSelectColumn(ListingTableMap::COL_TITLE);
            $criteria->addSelectColumn(ListingTableMap::COL_SIZE);
            $criteria->addSelectColumn(ListingTableMap::COL_UNIT_NUMBER);
            $criteria->addSelectColumn(ListingTableMap::COL_PRICE);
            $criteria->addSelectColumn(ListingTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(ListingTableMap::COL_HDB_ID);
            $criteria->addSelectColumn(ListingTableMap::COL_REALTOR_ID);
            $criteria->addSelectColumn(ListingTableMap::COL_LATITUDE);
            $criteria->addSelectColumn(ListingTableMap::COL_LONGITUDE);
            $criteria->addSelectColumn(ListingTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(ListingTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.size');
            $criteria->addSelectColumn($alias . '.unit_number');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.hdb_id');
            $criteria->addSelectColumn($alias . '.realtor_id');
            $criteria->addSelectColumn($alias . '.latitude');
            $criteria->addSelectColumn($alias . '.longitude');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ListingTableMap::DATABASE_NAME)->getTable(ListingTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ListingTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ListingTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ListingTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Listing or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Listing object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ListingTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Listing) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ListingTableMap::DATABASE_NAME);
            $criteria->add(ListingTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ListingQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ListingTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ListingTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the listing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ListingQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Listing or Criteria object.
     *
     * @param mixed               $criteria Criteria or Listing object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ListingTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Listing object
        }

        if ($criteria->containsKey(ListingTableMap::COL_ID) && $criteria->keyContainsValue(ListingTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ListingTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ListingQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ListingTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ListingTableMap::buildTableMap();
