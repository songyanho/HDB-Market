<?php

namespace Base;

use \Realtor as ChildRealtor;
use \RealtorQuery as ChildRealtorQuery;
use \UserQuery as ChildUserQuery;
use \Exception;
use \PDO;
use Map\RealtorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'realtor' table.
 *
 *
 *
 * @method     ChildRealtorQuery orderByFullName($order = Criteria::ASC) Order by the full_name column
 * @method     ChildRealtorQuery orderByNric($order = Criteria::ASC) Order by the nric column
 * @method     ChildRealtorQuery orderByContactNumber($order = Criteria::ASC) Order by the contact_number column
 * @method     ChildRealtorQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildRealtorQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildRealtorQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildRealtorQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildRealtorQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildRealtorQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildRealtorQuery groupByFullName() Group by the full_name column
 * @method     ChildRealtorQuery groupByNric() Group by the nric column
 * @method     ChildRealtorQuery groupByContactNumber() Group by the contact_number column
 * @method     ChildRealtorQuery groupById() Group by the id column
 * @method     ChildRealtorQuery groupByUsername() Group by the username column
 * @method     ChildRealtorQuery groupByPassword() Group by the password column
 * @method     ChildRealtorQuery groupByEmail() Group by the email column
 * @method     ChildRealtorQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildRealtorQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildRealtorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRealtorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRealtorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRealtorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRealtorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRealtorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRealtorQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildRealtorQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildRealtorQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildRealtorQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildRealtorQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildRealtorQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildRealtorQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     ChildRealtorQuery leftJoinListing($relationAlias = null) Adds a LEFT JOIN clause to the query using the Listing relation
 * @method     ChildRealtorQuery rightJoinListing($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Listing relation
 * @method     ChildRealtorQuery innerJoinListing($relationAlias = null) Adds a INNER JOIN clause to the query using the Listing relation
 *
 * @method     ChildRealtorQuery joinWithListing($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Listing relation
 *
 * @method     ChildRealtorQuery leftJoinWithListing() Adds a LEFT JOIN clause and with to the query using the Listing relation
 * @method     ChildRealtorQuery rightJoinWithListing() Adds a RIGHT JOIN clause and with to the query using the Listing relation
 * @method     ChildRealtorQuery innerJoinWithListing() Adds a INNER JOIN clause and with to the query using the Listing relation
 *
 * @method     \UserQuery|\ListingQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildRealtor findOne(ConnectionInterface $con = null) Return the first ChildRealtor matching the query
 * @method     ChildRealtor findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRealtor matching the query, or a new ChildRealtor object populated from the query conditions when no match is found
 *
 * @method     ChildRealtor findOneByFullName(string $full_name) Return the first ChildRealtor filtered by the full_name column
 * @method     ChildRealtor findOneByNric(string $nric) Return the first ChildRealtor filtered by the nric column
 * @method     ChildRealtor findOneByContactNumber(string $contact_number) Return the first ChildRealtor filtered by the contact_number column
 * @method     ChildRealtor findOneById(int $id) Return the first ChildRealtor filtered by the id column
 * @method     ChildRealtor findOneByUsername(string $username) Return the first ChildRealtor filtered by the username column
 * @method     ChildRealtor findOneByPassword(string $password) Return the first ChildRealtor filtered by the password column
 * @method     ChildRealtor findOneByEmail(string $email) Return the first ChildRealtor filtered by the email column
 * @method     ChildRealtor findOneByCreatedAt(string $created_at) Return the first ChildRealtor filtered by the created_at column
 * @method     ChildRealtor findOneByUpdatedAt(string $updated_at) Return the first ChildRealtor filtered by the updated_at column *

 * @method     ChildRealtor requirePk($key, ConnectionInterface $con = null) Return the ChildRealtor by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRealtor requireOne(ConnectionInterface $con = null) Return the first ChildRealtor matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRealtor requireOneByFullName(string $full_name) Return the first ChildRealtor filtered by the full_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRealtor requireOneByNric(string $nric) Return the first ChildRealtor filtered by the nric column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRealtor requireOneByContactNumber(string $contact_number) Return the first ChildRealtor filtered by the contact_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRealtor requireOneById(int $id) Return the first ChildRealtor filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRealtor requireOneByUsername(string $username) Return the first ChildRealtor filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRealtor requireOneByPassword(string $password) Return the first ChildRealtor filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRealtor requireOneByEmail(string $email) Return the first ChildRealtor filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRealtor requireOneByCreatedAt(string $created_at) Return the first ChildRealtor filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRealtor requireOneByUpdatedAt(string $updated_at) Return the first ChildRealtor filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRealtor[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRealtor objects based on current ModelCriteria
 * @method     ChildRealtor[]|ObjectCollection findByFullName(string $full_name) Return ChildRealtor objects filtered by the full_name column
 * @method     ChildRealtor[]|ObjectCollection findByNric(string $nric) Return ChildRealtor objects filtered by the nric column
 * @method     ChildRealtor[]|ObjectCollection findByContactNumber(string $contact_number) Return ChildRealtor objects filtered by the contact_number column
 * @method     ChildRealtor[]|ObjectCollection findById(int $id) Return ChildRealtor objects filtered by the id column
 * @method     ChildRealtor[]|ObjectCollection findByUsername(string $username) Return ChildRealtor objects filtered by the username column
 * @method     ChildRealtor[]|ObjectCollection findByPassword(string $password) Return ChildRealtor objects filtered by the password column
 * @method     ChildRealtor[]|ObjectCollection findByEmail(string $email) Return ChildRealtor objects filtered by the email column
 * @method     ChildRealtor[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildRealtor objects filtered by the created_at column
 * @method     ChildRealtor[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildRealtor objects filtered by the updated_at column
 * @method     ChildRealtor[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RealtorQuery extends ChildUserQuery
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RealtorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hdb', $modelName = '\\Realtor', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRealtorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRealtorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRealtorQuery) {
            return $criteria;
        }
        $query = new ChildRealtorQuery();
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
     * @return ChildRealtor|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RealtorTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RealtorTableMap::DATABASE_NAME);
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
     * @return ChildRealtor A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT full_name, nric, contact_number, id, username, password, email, created_at, updated_at FROM realtor WHERE id = :p0';
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
            /** @var ChildRealtor $obj */
            $obj = new ChildRealtor();
            $obj->hydrate($row);
            RealtorTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildRealtor|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RealtorTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RealtorTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the full_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFullName('fooValue');   // WHERE full_name = 'fooValue'
     * $query->filterByFullName('%fooValue%'); // WHERE full_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fullName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByFullName($fullName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fullName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fullName)) {
                $fullName = str_replace('*', '%', $fullName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RealtorTableMap::COL_FULL_NAME, $fullName, $comparison);
    }

    /**
     * Filter the query on the nric column
     *
     * Example usage:
     * <code>
     * $query->filterByNric('fooValue');   // WHERE nric = 'fooValue'
     * $query->filterByNric('%fooValue%'); // WHERE nric LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nric The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByNric($nric = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nric)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nric)) {
                $nric = str_replace('*', '%', $nric);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RealtorTableMap::COL_NRIC, $nric, $comparison);
    }

    /**
     * Filter the query on the contact_number column
     *
     * Example usage:
     * <code>
     * $query->filterByContactNumber('fooValue');   // WHERE contact_number = 'fooValue'
     * $query->filterByContactNumber('%fooValue%'); // WHERE contact_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByContactNumber($contactNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactNumber)) {
                $contactNumber = str_replace('*', '%', $contactNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RealtorTableMap::COL_CONTACT_NUMBER, $contactNumber, $comparison);
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
     * @see       filterByUser()
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RealtorTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RealtorTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RealtorTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RealtorTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RealtorTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RealtorTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(RealtorTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(RealtorTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RealtorTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(RealtorTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(RealtorTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RealtorTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(RealtorTableMap::COL_ID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RealtorTableMap::COL_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

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
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
    }

    /**
     * Filter the query by a related \Listing object
     *
     * @param \Listing|ObjectCollection $listing the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRealtorQuery The current query, for fluid interface
     */
    public function filterByListing($listing, $comparison = null)
    {
        if ($listing instanceof \Listing) {
            return $this
                ->addUsingAlias(RealtorTableMap::COL_ID, $listing->getRealtorId(), $comparison);
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
     * @return $this|ChildRealtorQuery The current query, for fluid interface
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
     * @param   ChildRealtor $realtor Object to remove from the list of results
     *
     * @return $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function prune($realtor = null)
    {
        if ($realtor) {
            $this->addUsingAlias(RealtorTableMap::COL_ID, $realtor->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the realtor table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RealtorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RealtorTableMap::clearInstancePool();
            RealtorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RealtorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RealtorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RealtorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RealtorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(RealtorTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(RealtorTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(RealtorTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(RealtorTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(RealtorTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildRealtorQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(RealtorTableMap::COL_CREATED_AT);
    }

} // RealtorQuery
