<?php

namespace Base;

use \Hdb as ChildHdb;
use \HdbQuery as ChildHdbQuery;
use \Exception;
use \PDO;
use Map\HdbTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hdb' table.
 *
 *
 *
 * @method     ChildHdbQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildHdbQuery orderByBlock($order = Criteria::ASC) Order by the block column
 * @method     ChildHdbQuery orderByFlatType($order = Criteria::ASC) Order by the flat_type column
 * @method     ChildHdbQuery orderByTown($order = Criteria::ASC) Order by the town column
 * @method     ChildHdbQuery orderByStreet($order = Criteria::ASC) Order by the street column
 * @method     ChildHdbQuery orderByFlatModel($order = Criteria::ASC) Order by the flat_model column
 * @method     ChildHdbQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildHdbQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildHdbQuery groupById() Group by the id column
 * @method     ChildHdbQuery groupByBlock() Group by the block column
 * @method     ChildHdbQuery groupByFlatType() Group by the flat_type column
 * @method     ChildHdbQuery groupByTown() Group by the town column
 * @method     ChildHdbQuery groupByStreet() Group by the street column
 * @method     ChildHdbQuery groupByFlatModel() Group by the flat_model column
 * @method     ChildHdbQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildHdbQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildHdbQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHdbQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHdbQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHdbQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHdbQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHdbQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHdbQuery leftJoinListing($relationAlias = null) Adds a LEFT JOIN clause to the query using the Listing relation
 * @method     ChildHdbQuery rightJoinListing($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Listing relation
 * @method     ChildHdbQuery innerJoinListing($relationAlias = null) Adds a INNER JOIN clause to the query using the Listing relation
 *
 * @method     ChildHdbQuery joinWithListing($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Listing relation
 *
 * @method     ChildHdbQuery leftJoinWithListing() Adds a LEFT JOIN clause and with to the query using the Listing relation
 * @method     ChildHdbQuery rightJoinWithListing() Adds a RIGHT JOIN clause and with to the query using the Listing relation
 * @method     ChildHdbQuery innerJoinWithListing() Adds a INNER JOIN clause and with to the query using the Listing relation
 *
 * @method     \ListingQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHdb findOne(ConnectionInterface $con = null) Return the first ChildHdb matching the query
 * @method     ChildHdb findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHdb matching the query, or a new ChildHdb object populated from the query conditions when no match is found
 *
 * @method     ChildHdb findOneById(int $id) Return the first ChildHdb filtered by the id column
 * @method     ChildHdb findOneByBlock(string $block) Return the first ChildHdb filtered by the block column
 * @method     ChildHdb findOneByFlatType(string $flat_type) Return the first ChildHdb filtered by the flat_type column
 * @method     ChildHdb findOneByTown(string $town) Return the first ChildHdb filtered by the town column
 * @method     ChildHdb findOneByStreet(string $street) Return the first ChildHdb filtered by the street column
 * @method     ChildHdb findOneByFlatModel(string $flat_model) Return the first ChildHdb filtered by the flat_model column
 * @method     ChildHdb findOneByCreatedAt(string $created_at) Return the first ChildHdb filtered by the created_at column
 * @method     ChildHdb findOneByUpdatedAt(string $updated_at) Return the first ChildHdb filtered by the updated_at column *

 * @method     ChildHdb requirePk($key, ConnectionInterface $con = null) Return the ChildHdb by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHdb requireOne(ConnectionInterface $con = null) Return the first ChildHdb matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHdb requireOneById(int $id) Return the first ChildHdb filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHdb requireOneByBlock(string $block) Return the first ChildHdb filtered by the block column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHdb requireOneByFlatType(string $flat_type) Return the first ChildHdb filtered by the flat_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHdb requireOneByTown(string $town) Return the first ChildHdb filtered by the town column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHdb requireOneByStreet(string $street) Return the first ChildHdb filtered by the street column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHdb requireOneByFlatModel(string $flat_model) Return the first ChildHdb filtered by the flat_model column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHdb requireOneByCreatedAt(string $created_at) Return the first ChildHdb filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHdb requireOneByUpdatedAt(string $updated_at) Return the first ChildHdb filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHdb[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHdb objects based on current ModelCriteria
 * @method     ChildHdb[]|ObjectCollection findById(int $id) Return ChildHdb objects filtered by the id column
 * @method     ChildHdb[]|ObjectCollection findByBlock(string $block) Return ChildHdb objects filtered by the block column
 * @method     ChildHdb[]|ObjectCollection findByFlatType(string $flat_type) Return ChildHdb objects filtered by the flat_type column
 * @method     ChildHdb[]|ObjectCollection findByTown(string $town) Return ChildHdb objects filtered by the town column
 * @method     ChildHdb[]|ObjectCollection findByStreet(string $street) Return ChildHdb objects filtered by the street column
 * @method     ChildHdb[]|ObjectCollection findByFlatModel(string $flat_model) Return ChildHdb objects filtered by the flat_model column
 * @method     ChildHdb[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildHdb objects filtered by the created_at column
 * @method     ChildHdb[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildHdb objects filtered by the updated_at column
 * @method     ChildHdb[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HdbQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HdbQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hdb', $modelName = '\\Hdb', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHdbQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHdbQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHdbQuery) {
            return $criteria;
        }
        $query = new ChildHdbQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$id, $town] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildHdb|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = HdbTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])])))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HdbTableMap::DATABASE_NAME);
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
     * @return ChildHdb A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, block, flat_type, town, street, flat_model, created_at, updated_at FROM hdb WHERE id = :p0 AND town = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildHdb $obj */
            $obj = new ChildHdb();
            $obj->hydrate($row);
            HdbTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildHdb|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(HdbTableMap::COL_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(HdbTableMap::COL_TOWN, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(HdbTableMap::COL_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(HdbTableMap::COL_TOWN, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(HdbTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(HdbTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HdbTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the block column
     *
     * Example usage:
     * <code>
     * $query->filterByBlock('fooValue');   // WHERE block = 'fooValue'
     * $query->filterByBlock('%fooValue%'); // WHERE block LIKE '%fooValue%'
     * </code>
     *
     * @param     string $block The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function filterByBlock($block = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($block)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $block)) {
                $block = str_replace('*', '%', $block);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HdbTableMap::COL_BLOCK, $block, $comparison);
    }

    /**
     * Filter the query on the flat_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFlatType('fooValue');   // WHERE flat_type = 'fooValue'
     * $query->filterByFlatType('%fooValue%'); // WHERE flat_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $flatType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function filterByFlatType($flatType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($flatType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $flatType)) {
                $flatType = str_replace('*', '%', $flatType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HdbTableMap::COL_FLAT_TYPE, $flatType, $comparison);
    }

    /**
     * Filter the query on the town column
     *
     * Example usage:
     * <code>
     * $query->filterByTown('fooValue');   // WHERE town = 'fooValue'
     * $query->filterByTown('%fooValue%'); // WHERE town LIKE '%fooValue%'
     * </code>
     *
     * @param     string $town The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function filterByTown($town = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($town)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $town)) {
                $town = str_replace('*', '%', $town);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HdbTableMap::COL_TOWN, $town, $comparison);
    }

    /**
     * Filter the query on the street column
     *
     * Example usage:
     * <code>
     * $query->filterByStreet('fooValue');   // WHERE street = 'fooValue'
     * $query->filterByStreet('%fooValue%'); // WHERE street LIKE '%fooValue%'
     * </code>
     *
     * @param     string $street The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function filterByStreet($street = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($street)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $street)) {
                $street = str_replace('*', '%', $street);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HdbTableMap::COL_STREET, $street, $comparison);
    }

    /**
     * Filter the query on the flat_model column
     *
     * Example usage:
     * <code>
     * $query->filterByFlatModel('fooValue');   // WHERE flat_model = 'fooValue'
     * $query->filterByFlatModel('%fooValue%'); // WHERE flat_model LIKE '%fooValue%'
     * </code>
     *
     * @param     string $flatModel The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function filterByFlatModel($flatModel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($flatModel)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $flatModel)) {
                $flatModel = str_replace('*', '%', $flatModel);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HdbTableMap::COL_FLAT_MODEL, $flatModel, $comparison);
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
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(HdbTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(HdbTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HdbTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(HdbTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(HdbTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HdbTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Listing object
     *
     * @param \Listing|ObjectCollection $listing the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHdbQuery The current query, for fluid interface
     */
    public function filterByListing($listing, $comparison = null)
    {
        if ($listing instanceof \Listing) {
            return $this
                ->addUsingAlias(HdbTableMap::COL_ID, $listing->getHdbId(), $comparison);
        } elseif ($listing instanceof ObjectCollection) {
            return $this
                ->useListingQuery()
                ->filterByPrimaryKeys($listing->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByListing() only accepts arguments of type \Listing or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Listing relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function joinListing($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Listing');

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
            $this->addJoinObject($join, 'Listing');
        }

        return $this;
    }

    /**
     * Use the Listing relation Listing object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ListingQuery A secondary query class using the current class as primary query
     */
    public function useListingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinListing($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Listing', '\ListingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHdb $hdb Object to remove from the list of results
     *
     * @return $this|ChildHdbQuery The current query, for fluid interface
     */
    public function prune($hdb = null)
    {
        if ($hdb) {
            $this->addCond('pruneCond0', $this->getAliasedColName(HdbTableMap::COL_ID), $hdb->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(HdbTableMap::COL_TOWN), $hdb->getTown(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hdb table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HdbTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HdbTableMap::clearInstancePool();
            HdbTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HdbTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HdbTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HdbTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HdbTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildHdbQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(HdbTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildHdbQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(HdbTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildHdbQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(HdbTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildHdbQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(HdbTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildHdbQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(HdbTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildHdbQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(HdbTableMap::COL_CREATED_AT);
    }

} // HdbQuery
