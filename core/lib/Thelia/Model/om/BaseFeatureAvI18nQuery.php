<?php

namespace Thelia\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Thelia\Model\FeatureAv;
use Thelia\Model\FeatureAvI18n;
use Thelia\Model\FeatureAvI18nPeer;
use Thelia\Model\FeatureAvI18nQuery;

/**
 * Base class that represents a query for the 'feature_av_i18n' table.
 *
 *
 *
 * @method FeatureAvI18nQuery orderById($order = Criteria::ASC) Order by the id column
 * @method FeatureAvI18nQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 * @method FeatureAvI18nQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method FeatureAvI18nQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method FeatureAvI18nQuery orderByChapo($order = Criteria::ASC) Order by the chapo column
 * @method FeatureAvI18nQuery orderByPostscriptum($order = Criteria::ASC) Order by the postscriptum column
 *
 * @method FeatureAvI18nQuery groupById() Group by the id column
 * @method FeatureAvI18nQuery groupByLocale() Group by the locale column
 * @method FeatureAvI18nQuery groupByTitle() Group by the title column
 * @method FeatureAvI18nQuery groupByDescription() Group by the description column
 * @method FeatureAvI18nQuery groupByChapo() Group by the chapo column
 * @method FeatureAvI18nQuery groupByPostscriptum() Group by the postscriptum column
 *
 * @method FeatureAvI18nQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FeatureAvI18nQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FeatureAvI18nQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FeatureAvI18nQuery leftJoinFeatureAv($relationAlias = null) Adds a LEFT JOIN clause to the query using the FeatureAv relation
 * @method FeatureAvI18nQuery rightJoinFeatureAv($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FeatureAv relation
 * @method FeatureAvI18nQuery innerJoinFeatureAv($relationAlias = null) Adds a INNER JOIN clause to the query using the FeatureAv relation
 *
 * @method FeatureAvI18n findOne(PropelPDO $con = null) Return the first FeatureAvI18n matching the query
 * @method FeatureAvI18n findOneOrCreate(PropelPDO $con = null) Return the first FeatureAvI18n matching the query, or a new FeatureAvI18n object populated from the query conditions when no match is found
 *
 * @method FeatureAvI18n findOneById(int $id) Return the first FeatureAvI18n filtered by the id column
 * @method FeatureAvI18n findOneByLocale(string $locale) Return the first FeatureAvI18n filtered by the locale column
 * @method FeatureAvI18n findOneByTitle(string $title) Return the first FeatureAvI18n filtered by the title column
 * @method FeatureAvI18n findOneByDescription(string $description) Return the first FeatureAvI18n filtered by the description column
 * @method FeatureAvI18n findOneByChapo(string $chapo) Return the first FeatureAvI18n filtered by the chapo column
 * @method FeatureAvI18n findOneByPostscriptum(string $postscriptum) Return the first FeatureAvI18n filtered by the postscriptum column
 *
 * @method array findById(int $id) Return FeatureAvI18n objects filtered by the id column
 * @method array findByLocale(string $locale) Return FeatureAvI18n objects filtered by the locale column
 * @method array findByTitle(string $title) Return FeatureAvI18n objects filtered by the title column
 * @method array findByDescription(string $description) Return FeatureAvI18n objects filtered by the description column
 * @method array findByChapo(string $chapo) Return FeatureAvI18n objects filtered by the chapo column
 * @method array findByPostscriptum(string $postscriptum) Return FeatureAvI18n objects filtered by the postscriptum column
 *
 * @package    propel.generator.Thelia.Model.om
 */
abstract class BaseFeatureAvI18nQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFeatureAvI18nQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = 'Thelia\\Model\\FeatureAvI18n', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FeatureAvI18nQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     FeatureAvI18nQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FeatureAvI18nQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FeatureAvI18nQuery) {
            return $criteria;
        }
        $query = new FeatureAvI18nQuery();
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
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$id, $locale]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   FeatureAvI18n|FeatureAvI18n[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FeatureAvI18nPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FeatureAvI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @param     PropelPDO $con A connection object
     *
     * @return   FeatureAvI18n A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `LOCALE`, `TITLE`, `DESCRIPTION`, `CHAPO`, `POSTSCRIPTUM` FROM `feature_av_i18n` WHERE `ID` = :p0 AND `LOCALE` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new FeatureAvI18n();
            $obj->hydrate($row);
            FeatureAvI18nPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return FeatureAvI18n|FeatureAvI18n[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|FeatureAvI18n[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return FeatureAvI18nQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(FeatureAvI18nPeer::ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(FeatureAvI18nPeer::LOCALE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FeatureAvI18nQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(FeatureAvI18nPeer::ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(FeatureAvI18nPeer::LOCALE, $key[1], Criteria::EQUAL);
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
     * @see       filterByFeatureAv()
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FeatureAvI18nQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(FeatureAvI18nPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the locale column
     *
     * Example usage:
     * <code>
     * $query->filterByLocale('fooValue');   // WHERE locale = 'fooValue'
     * $query->filterByLocale('%fooValue%'); // WHERE locale LIKE '%fooValue%'
     * </code>
     *
     * @param     string $locale The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FeatureAvI18nQuery The current query, for fluid interface
     */
    public function filterByLocale($locale = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($locale)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $locale)) {
                $locale = str_replace('*', '%', $locale);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FeatureAvI18nPeer::LOCALE, $locale, $comparison);
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
     * @return FeatureAvI18nQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FeatureAvI18nPeer::TITLE, $title, $comparison);
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
     * @return FeatureAvI18nQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FeatureAvI18nPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the chapo column
     *
     * Example usage:
     * <code>
     * $query->filterByChapo('fooValue');   // WHERE chapo = 'fooValue'
     * $query->filterByChapo('%fooValue%'); // WHERE chapo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chapo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FeatureAvI18nQuery The current query, for fluid interface
     */
    public function filterByChapo($chapo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chapo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $chapo)) {
                $chapo = str_replace('*', '%', $chapo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FeatureAvI18nPeer::CHAPO, $chapo, $comparison);
    }

    /**
     * Filter the query on the postscriptum column
     *
     * Example usage:
     * <code>
     * $query->filterByPostscriptum('fooValue');   // WHERE postscriptum = 'fooValue'
     * $query->filterByPostscriptum('%fooValue%'); // WHERE postscriptum LIKE '%fooValue%'
     * </code>
     *
     * @param     string $postscriptum The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FeatureAvI18nQuery The current query, for fluid interface
     */
    public function filterByPostscriptum($postscriptum = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($postscriptum)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $postscriptum)) {
                $postscriptum = str_replace('*', '%', $postscriptum);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FeatureAvI18nPeer::POSTSCRIPTUM, $postscriptum, $comparison);
    }

    /**
     * Filter the query by a related FeatureAv object
     *
     * @param   FeatureAv|PropelObjectCollection $featureAv The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FeatureAvI18nQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFeatureAv($featureAv, $comparison = null)
    {
        if ($featureAv instanceof FeatureAv) {
            return $this
                ->addUsingAlias(FeatureAvI18nPeer::ID, $featureAv->getId(), $comparison);
        } elseif ($featureAv instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FeatureAvI18nPeer::ID, $featureAv->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFeatureAv() only accepts arguments of type FeatureAv or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FeatureAv relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FeatureAvI18nQuery The current query, for fluid interface
     */
    public function joinFeatureAv($relationAlias = null, $joinType = 'LEFT JOIN')
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FeatureAv');

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
            $this->addJoinObject($join, 'FeatureAv');
        }

        return $this;
    }

    /**
     * Use the FeatureAv relation FeatureAv object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\FeatureAvQuery A secondary query class using the current class as primary query
     */
    public function useFeatureAvQuery($relationAlias = null, $joinType = 'LEFT JOIN')
    {
        return $this
            ->joinFeatureAv($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FeatureAv', '\Thelia\Model\FeatureAvQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   FeatureAvI18n $featureAvI18n Object to remove from the list of results
     *
     * @return FeatureAvI18nQuery The current query, for fluid interface
     */
    public function prune($featureAvI18n = null)
    {
        if ($featureAvI18n) {
            $this->addCond('pruneCond0', $this->getAliasedColName(FeatureAvI18nPeer::ID), $featureAvI18n->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(FeatureAvI18nPeer::LOCALE), $featureAvI18n->getLocale(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
