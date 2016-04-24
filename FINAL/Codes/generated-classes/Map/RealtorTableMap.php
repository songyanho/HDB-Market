<?php

namespace Map;

use \Realtor;
use \RealtorQuery;
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
 * This class defines the structure of the 'realtor' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RealtorTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.RealtorTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'hdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'realtor';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Realtor';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Realtor';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the full_name field
     */
    const COL_FULL_NAME = 'realtor.full_name';

    /**
     * the column name for the nric field
     */
    const COL_NRIC = 'realtor.nric';

    /**
     * the column name for the contact_number field
     */
    const COL_CONTACT_NUMBER = 'realtor.contact_number';

    /**
     * the column name for the id field
     */
    const COL_ID = 'realtor.id';

    /**
     * the column name for the username field
     */
    const COL_USERNAME = 'realtor.username';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'realtor.password';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'realtor.email';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'realtor.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'realtor.updated_at';

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
        self::TYPE_PHPNAME       => array('FullName', 'Nric', 'ContactNumber', 'Id', 'Username', 'Password', 'Email', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('fullName', 'nric', 'contactNumber', 'id', 'username', 'password', 'email', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(RealtorTableMap::COL_FULL_NAME, RealtorTableMap::COL_NRIC, RealtorTableMap::COL_CONTACT_NUMBER, RealtorTableMap::COL_ID, RealtorTableMap::COL_USERNAME, RealtorTableMap::COL_PASSWORD, RealtorTableMap::COL_EMAIL, RealtorTableMap::COL_CREATED_AT, RealtorTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('full_name', 'nric', 'contact_number', 'id', 'username', 'password', 'email', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FullName' => 0, 'Nric' => 1, 'ContactNumber' => 2, 'Id' => 3, 'Username' => 4, 'Password' => 5, 'Email' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ),
        self::TYPE_CAMELNAME     => array('fullName' => 0, 'nric' => 1, 'contactNumber' => 2, 'id' => 3, 'username' => 4, 'password' => 5, 'email' => 6, 'createdAt' => 7, 'updatedAt' => 8, ),
        self::TYPE_COLNAME       => array(RealtorTableMap::COL_FULL_NAME => 0, RealtorTableMap::COL_NRIC => 1, RealtorTableMap::COL_CONTACT_NUMBER => 2, RealtorTableMap::COL_ID => 3, RealtorTableMap::COL_USERNAME => 4, RealtorTableMap::COL_PASSWORD => 5, RealtorTableMap::COL_EMAIL => 6, RealtorTableMap::COL_CREATED_AT => 7, RealtorTableMap::COL_UPDATED_AT => 8, ),
        self::TYPE_FIELDNAME     => array('full_name' => 0, 'nric' => 1, 'contact_number' => 2, 'id' => 3, 'username' => 4, 'password' => 5, 'email' => 6, 'created_at' => 7, 'updated_at' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('realtor');
        $this->setPhpName('Realtor');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Realtor');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('full_name', 'FullName', 'VARCHAR', true, 255, null);
        $this->addColumn('nric', 'Nric', 'VARCHAR', true, 255, null);
        $this->addColumn('contact_number', 'ContactNumber', 'VARCHAR', true, 255, null);
        $this->addForeignPrimaryKey('id', 'Id', 'INTEGER' , 'user', 'id', true, null, null);
        $this->addColumn('username', 'Username', 'VARCHAR', true, 255, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', '\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Listing', '\\Listing', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':realtor_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'Listings', false);
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
            'concrete_inheritance' => array('extends' => 'user', 'descendant_column' => 'descendant_class', 'copy_data_to_parent' => 'true', 'copy_data_to_child' => 'false', 'schema' => '', 'exclude_behaviors' => '', ),
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()
    /**
     * Method to invalidate the instance pool of all tables related to realtor     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ListingTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 3 + $offset
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
        return $withPrefix ? RealtorTableMap::CLASS_DEFAULT : RealtorTableMap::OM_CLASS;
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
     * @return array           (Realtor object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RealtorTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RealtorTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RealtorTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RealtorTableMap::OM_CLASS;
            /** @var Realtor $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RealtorTableMap::addInstanceToPool($obj, $key);
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
            $key = RealtorTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RealtorTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Realtor $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RealtorTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(RealtorTableMap::COL_FULL_NAME);
            $criteria->addSelectColumn(RealtorTableMap::COL_NRIC);
            $criteria->addSelectColumn(RealtorTableMap::COL_CONTACT_NUMBER);
            $criteria->addSelectColumn(RealtorTableMap::COL_ID);
            $criteria->addSelectColumn(RealtorTableMap::COL_USERNAME);
            $criteria->addSelectColumn(RealtorTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(RealtorTableMap::COL_EMAIL);
            $criteria->addSelectColumn(RealtorTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(RealtorTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.full_name');
            $criteria->addSelectColumn($alias . '.nric');
            $criteria->addSelectColumn($alias . '.contact_number');
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.email');
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
        return Propel::getServiceContainer()->getDatabaseMap(RealtorTableMap::DATABASE_NAME)->getTable(RealtorTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RealtorTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RealtorTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RealtorTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Realtor or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Realtor object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(RealtorTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Realtor) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RealtorTableMap::DATABASE_NAME);
            $criteria->add(RealtorTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = RealtorQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RealtorTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RealtorTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the realtor table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RealtorQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Realtor or Criteria object.
     *
     * @param mixed               $criteria Criteria or Realtor object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RealtorTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Realtor object
        }


        // Set the correct dbName
        $query = RealtorQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RealtorTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RealtorTableMap::buildTableMap();
