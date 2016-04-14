<?php

namespace Base;

use \Listing as ChildListing;
use \ListingQuery as ChildListingQuery;
use \Exception;
use \PDO;
use Map\ListingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'listing' table.
 *
 *
 *
 * @method     ChildListingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildListingQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildListingQuery orderBySize($order = Criteria::ASC) Order by the size column
 * @method     ChildListingQuery orderByUnitNumber($order = Criteria::ASC) Order by the unit_number column
 * @method     ChildListingQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildListingQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildListingQuery orderByHdbId($order = Criteria::ASC) Order by the hdb_id column
 * @method     ChildListingQuery orderByRealtorId($order = Criteria::ASC) Order by the realtor_id column
 * @method     ChildListingQuery orderByLatitude($order = Criteria::ASC) Order by the latitude column
 * @method     ChildListingQuery orderByLongitude($order = Criteria::ASC) Order by the longitude column
 * @method     ChildListingQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildListingQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildListingQuery groupById() Group by the id column
 * @method     ChildListingQuery groupByTitle() Group by the title column
 * @method     ChildListingQuery groupBySize() Group by the size column
 * @method     ChildListingQuery groupByUnitNumber() Group by the unit_number column
 * @method     ChildListingQuery groupByPrice() Group by the price column
 * @method     ChildListingQuery groupByDescription() Group by the description column
 * @method     ChildListingQuery groupByHdbId() Group by the hdb_id column
 * @method     ChildListingQuery groupByRealtorId() Group by the realtor_id column
 * @method     ChildListingQuery groupByLatitude() Group by the latitude column
 * @method     ChildListingQuery groupByLongitude() Group by the longitude column
 * @method     ChildListingQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildListingQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildListingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildListingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildListingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildListingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildListingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildListingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildListingQuery leftJoinHdb($relationAlias = null) Adds a LEFT JOIN clause to the query using the Hdb relation
 * @method     ChildListingQuery rightJoinHdb($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Hdb relation
 * @method     ChildListingQuery innerJoinHdb($relationAlias = null) Adds a INNER JOIN clause to the query using the Hdb relation
 *
 * @method     ChildListingQuery joinWithHdb($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Hdb relation
 *
 * @method     ChildListingQuery leftJoinWithHdb() Adds a LEFT JOIN clause and with to the query using the Hdb relation
 * @method     ChildListingQuery rightJoinWithHdb() Adds a RIGHT JOIN clause and with to the query using the Hdb relation
 * @method     ChildListingQuery innerJoinWithHdb() Adds a INNER JOIN clause and with to the query using the Hdb relation
 *
 * @method     ChildListingQuery leftJoinRealtor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Realtor relation
 * @method     ChildListingQuery rightJoinRealtor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Realtor relation
 * @method     ChildListingQuery innerJoinRealtor($relationAlias = null) Adds a INNER JOIN clause to the query using the Realtor relation
 *
 * @method     ChildListingQuery joinWithRealtor($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Realtor relation
 *
 * @method     ChildListingQuery leftJoinWithRealtor() Adds a LEFT JOIN clause and with to the query using the Realtor relation
 * @method     ChildListingQuery rightJoinWithRealtor() Adds a RIGHT JOIN clause and with to the query using the Realtor relation
 * @method     ChildListingQuery innerJoinWithRealtor() Adds a INNER JOIN clause and with to the query using the Realtor relation
 *
 * @method     ChildListingQuery leftJoinPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Photo relation
 * @method     ChildListingQuery rightJoinPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Photo relation
 * @method     ChildListingQuery innerJoinPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the Photo relation
 *
 * @method     ChildListingQuery joinWithPhoto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Photo relation
 *
 * @method     ChildListingQuery leftJoinWithPhoto() Adds a LEFT JOIN clause and with to the query using the Photo relation
 * @method     ChildListingQuery rightJoinWithPhoto() Adds a RIGHT JOIN clause and with to the query using the Photo relation
 * @method     ChildListingQuery innerJoinWithPhoto() Adds a INNER JOIN clause and with to the query using the Photo relation
 *
 * @method     ChildListingQuery leftJoinWatchlist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Watchlist relation
 * @method     ChildListingQuery rightJoinWatchlist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Watchlist relation
 * @method     ChildListingQuery innerJoinWatchlist($relationAlias = null) Adds a INNER JOIN clause to the query using the Watchlist relation
 *
 * @method     ChildListingQuery joinWithWatchlist($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Watchlist relation
 *
 * @method     ChildListingQuery leftJoinWithWatchlist() Adds a LEFT JOIN clause and with to the query using the Watchlist relation
 * @method     ChildListingQuery rightJoinWithWatchlist() Adds a RIGHT JOIN clause and with to the query using the Watchlist relation
 * @method     ChildListingQuery innerJoinWithWatchlist() Adds a INNER JOIN clause and with to the query using the Watchlist relation
 *
 * @method     \HdbQuery|\RealtorQuery|\PhotoQuery|\WatchlistQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildListing findOne(ConnectionInterface $con = null) Return the first ChildListing matching the query
 * @method     ChildListing findOneOrCreate(ConnectionInterface $con = null) Return the first ChildListing matching the query, or a new ChildListing object populated from the query conditions when no match is found
 *
 * @method     ChildListing findOneById(int $id) Return the first ChildListing filtered by the id column
 * @method     ChildListing findOneByTitle(string $title) Return the first ChildListing filtered by the title column
 * @method     ChildListing findOneBySize(double $size) Return the first ChildListing filtered by the size column
 * @method     ChildListing findOneByUnitNumber(string $unit_number) Return the first ChildListing filtered by the unit_number column
 * @method     ChildListing findOneByPrice(double $price) Return the first ChildListing filtered by the price column
 * @method     ChildListing findOneByDescription(string $description) Return the first ChildListing filtered by the description column
 * @method     ChildListing findOneByHdbId(int $hdb_id) Return the first ChildListing filtered by the hdb_id column
 * @method     ChildListing findOneByRealtorId(int $realtor_id) Return the first ChildListing filtered by the realtor_id column
 * @method     ChildListing findOneByLatitude(double $latitude) Return the first ChildListing filtered by the latitude column
 * @method     ChildListing findOneByLongitude(double $longitude) Return the first ChildListing filtered by the longitude column
 * @method     ChildListing findOneByCreatedAt(string $created_at) Return the first ChildListing filtered by the created_at column
 * @method     ChildListing findOneByUpdatedAt(string $updated_at) Return the first ChildListing filtered by the updated_at column *

 * @method     ChildListing requirePk($key, ConnectionInterface $con = null) Return the ChildListing by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOne(ConnectionInterface $con = null) Return the first ChildListing matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildListing requireOneById(int $id) Return the first ChildListing filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOneByTitle(string $title) Return the first ChildListing filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOneBySize(double $size) Return the first ChildListing filtered by the size column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOneByUnitNumber(string $unit_number) Return the first ChildListing filtered by the unit_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOneByPrice(double $price) Return the first ChildListing filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOneByDescription(string $description) Return the first ChildListing filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOneByHdbId(int $hdb_id) Return the first ChildListing filtered by the hdb_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOneByRealtorId(int $realtor_id) Return the first ChildListing filtered by the realtor_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOneByLatitude(double $latitude) Return the first ChildListing filtered by the latitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOneByLongitude(double $longitude) Return the first ChildListing filtered by the longitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOneByCreatedAt(string $created_at) Return the first ChildListing filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListing requireOneByUpdatedAt(string $updated_at) Return the first ChildListing filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildListing[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildListing objects based on current ModelCriteria
 * @method     ChildListing[]|ObjectCollection findById(int $id) Return ChildListing objects filtered by the id column
 * @method     ChildListing[]|ObjectCollection findByTitle(string $title) Return ChildListing objects filtered by the title column
 * @method     ChildListing[]|ObjectCollection findBySize(double $size) Return ChildListing objects filtered by the size column
 * @method     ChildListing[]|ObjectCollection findByUnitNumber(string $unit_number) Return ChildListing objects filtered by the unit_number column
 * @method     ChildListing[]|ObjectCollection findByPrice(double $price) Return ChildListing objects filtered by the price column
 * @method     ChildListing[]|ObjectCollection findByDescription(string $description) Return ChildListing objects filtered by the description column
 * @method     ChildListing[]|ObjectCollection findByHdbId(int $hdb_id) Return ChildListing objects filtered by the hdb_id column
 * @method     ChildListing[]|ObjectCollection findByRealtorId(int $realtor_id) Return ChildListing objects filtered by the realtor_id column
 * @method     ChildListing[]|ObjectCollection findByLatitude(double $latitude) Return ChildListing objects filtered by the latitude column
 * @method     ChildListing[]|ObjectCollection findByLongitude(double $longitude) Return ChildListing objects filtered by the longitude column
 * @method     ChildListing[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildListing objects filtered by the created_at column
 * @method     ChildListing[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildListing objects filtered by the updated_at column
 * @method     ChildListing[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ListingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ListingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hdb', $modelName = '\\Listing', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildListingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildListingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildListingQuery) {
            return $criteria;
        }
        $query = new ChildListingQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildListing|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ListingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ListingTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildListing A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, title, size, unit_number, price, description, hdb_id, realtor_id, latitude, longitude, created_at, updated_at FROM listing WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildListing $obj */
            $obj = new ChildListing();
            $obj->hydrate($row);
            ListingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildListing|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ListingTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ListingTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ListingTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ListingTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the size column
     *
     * Example usage:
     * <code>
     * $query->filterBySize(1234); // WHERE size = 1234
     * $query->filterBySize(array(12, 34)); // WHERE size IN (12, 34)
     * $query->filterBySize(array('min' => 12)); // WHERE size > 12
     * </code>
     *
     * @param     mixed $size The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterBySize($size = null, $comparison = null)
    {
        if (is_array($size)) {
            $useMinMax = false;
            if (isset($size['min'])) {
                $this->addUsingAlias(ListingTableMap::COL_SIZE, $size['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($size['max'])) {
                $this->addUsingAlias(ListingTableMap::COL_SIZE, $size['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_SIZE, $size, $comparison);
    }

    /**
     * Filter the query on the unit_number column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitNumber('fooValue');   // WHERE unit_number = 'fooValue'
     * $query->filterByUnitNumber('%fooValue%'); // WHERE unit_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unitNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByUnitNumber($unitNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unitNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $unitNumber)) {
                $unitNumber = str_replace('*', '%', $unitNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_UNIT_NUMBER, $unitNumber, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(ListingTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(ListingTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the hdb_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHdbId(1234); // WHERE hdb_id = 1234
     * $query->filterByHdbId(array(12, 34)); // WHERE hdb_id IN (12, 34)
     * $query->filterByHdbId(array('min' => 12)); // WHERE hdb_id > 12
     * </code>
     *
     * @see       filterByHdb()
     *
     * @param     mixed $hdbId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByHdbId($hdbId = null, $comparison = null)
    {
        if (is_array($hdbId)) {
            $useMinMax = false;
            if (isset($hdbId['min'])) {
                $this->addUsingAlias(ListingTableMap::COL_HDB_ID, $hdbId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hdbId['max'])) {
                $this->addUsingAlias(ListingTableMap::COL_HDB_ID, $hdbId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_HDB_ID, $hdbId, $comparison);
    }

    /**
     * Filter the query on the realtor_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRealtorId(1234); // WHERE realtor_id = 1234
     * $query->filterByRealtorId(array(12, 34)); // WHERE realtor_id IN (12, 34)
     * $query->filterByRealtorId(array('min' => 12)); // WHERE realtor_id > 12
     * </code>
     *
     * @see       filterByRealtor()
     *
     * @param     mixed $realtorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByRealtorId($realtorId = null, $comparison = null)
    {
        if (is_array($realtorId)) {
            $useMinMax = false;
            if (isset($realtorId['min'])) {
                $this->addUsingAlias(ListingTableMap::COL_REALTOR_ID, $realtorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($realtorId['max'])) {
                $this->addUsingAlias(ListingTableMap::COL_REALTOR_ID, $realtorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_REALTOR_ID, $realtorId, $comparison);
    }

    /**
     * Filter the query on the latitude column
     *
     * Example usage:
     * <code>
     * $query->filterByLatitude(1234); // WHERE latitude = 1234
     * $query->filterByLatitude(array(12, 34)); // WHERE latitude IN (12, 34)
     * $query->filterByLatitude(array('min' => 12)); // WHERE latitude > 12
     * </code>
     *
     * @param     mixed $latitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByLatitude($latitude = null, $comparison = null)
    {
        if (is_array($latitude)) {
            $useMinMax = false;
            if (isset($latitude['min'])) {
                $this->addUsingAlias(ListingTableMap::COL_LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($latitude['max'])) {
                $this->addUsingAlias(ListingTableMap::COL_LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_LATITUDE, $latitude, $comparison);
    }

    /**
     * Filter the query on the longitude column
     *
     * Example usage:
     * <code>
     * $query->filterByLongitude(1234); // WHERE longitude = 1234
     * $query->filterByLongitude(array(12, 34)); // WHERE longitude IN (12, 34)
     * $query->filterByLongitude(array('min' => 12)); // WHERE longitude > 12
     * </code>
     *
     * @param     mixed $longitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByLongitude($longitude = null, $comparison = null)
    {
        if (is_array($longitude)) {
            $useMinMax = false;
            if (isset($longitude['min'])) {
                $this->addUsingAlias(ListingTableMap::COL_LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($longitude['max'])) {
                $this->addUsingAlias(ListingTableMap::COL_LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_LONGITUDE, $longitude, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ListingTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ListingTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ListingTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ListingTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Hdb object
     *
     * @param \Hdb|ObjectCollection $hdb The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildListingQuery The current query, for fluid interface
     */
    public function filterByHdb($hdb, $comparison = null)
    {
        if ($hdb instanceof \Hdb) {
            return $this
                ->addUsingAlias(ListingTableMap::COL_HDB_ID, $hdb->getId(), $comparison);
        } elseif ($hdb instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ListingTableMap::COL_HDB_ID, $hdb->toKeyValue('Id', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByHdb() only accepts arguments of type \Hdb or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Hdb relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function joinHdb($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Hdb');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Hdb');
        }

        return $this;
    }

    /**
     * Use the Hdb relation Hdb object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HdbQuery A secondary query class using the current class as primary query
     */
    public function useHdbQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHdb($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Hdb', '\HdbQuery');
    }

    /**
     * Filter the query by a related \Realtor object
     *
     * @param \Realtor|ObjectCollection $realtor The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildListingQuery The current query, for fluid interface
     */
    public function filterByRealtor($realtor, $comparison = null)
    {
        if ($realtor instanceof \Realtor) {
            return $this
                ->addUsingAlias(ListingTableMap::COL_REALTOR_ID, $realtor->getId(), $comparison);
        } elseif ($realtor instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ListingTableMap::COL_REALTOR_ID, $realtor->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRealtor() only accepts arguments of type \Realtor or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Realtor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function joinRealtor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Realtor');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Realtor');
        }

        return $this;
    }

    /**
     * Use the Realtor relation Realtor object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RealtorQuery A secondary query class using the current class as primary query
     */
    public function useRealtorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRealtor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Realtor', '\RealtorQuery');
    }

    /**
     * Filter the query by a related \Photo object
     *
     * @param \Photo|ObjectCollection $photo the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildListingQuery The current query, for fluid interface
     */
    public function filterByPhoto($photo, $comparison = null)
    {
        if ($photo instanceof \Photo) {
            return $this
                ->addUsingAlias(ListingTableMap::COL_ID, $photo->getListingId(), $comparison);
        } elseif ($photo instanceof ObjectCollection) {
            return $this
                ->usePhotoQuery()
                ->filterByPrimaryKeys($photo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPhoto() only accepts arguments of type \Photo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Photo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function joinPhoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Photo');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Photo');
        }

        return $this;
    }

    /**
     * Use the Photo relation Photo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PhotoQuery A secondary query class using the current class as primary query
     */
    public function usePhotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPhoto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Photo', '\PhotoQuery');
    }

    /**
     * Filter the query by a related \Watchlist object
     *
     * @param \Watchlist|ObjectCollection $watchlist the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildListingQuery The current query, for fluid interface
     */
    public function filterByWatchlist($watchlist, $comparison = null)
    {
        if ($watchlist instanceof \Watchlist) {
            return $this
                ->addUsingAlias(ListingTableMap::COL_ID, $watchlist->getListingId(), $comparison);
        } elseif ($watchlist instanceof ObjectCollection) {
            return $this
                ->useWatchlistQuery()
                ->filterByPrimaryKeys($watchlist->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByWatchlist() only accepts arguments of type \Watchlist or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Watchlist relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function joinWatchlist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Watchlist');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Watchlist');
        }

        return $this;
    }

    /**
     * Use the Watchlist relation Watchlist object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \WatchlistQuery A secondary query class using the current class as primary query
     */
    public function useWatchlistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWatchlist($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Watchlist', '\WatchlistQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildListing $listing Object to remove from the list of results
     *
     * @return $this|ChildListingQuery The current query, for fluid interface
     */
    public function prune($listing = null)
    {
        if ($listing) {
            $this->addUsingAlias(ListingTableMap::COL_ID, $listing->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the listing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ListingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ListingTableMap::clearInstancePool();
            ListingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ListingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ListingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ListingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ListingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildListingQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ListingTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildListingQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ListingTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildListingQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ListingTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildListingQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ListingTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildListingQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ListingTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildListingQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ListingTableMap::COL_CREATED_AT);
    }

} // ListingQuery
