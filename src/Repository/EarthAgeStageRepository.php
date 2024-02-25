<?php

namespace App\Repository;

use App\Entity\EarthAgeStage;
use App\Repository\EarthAgeStageRepository\Filter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\ArrayParameterType;
use Doctrine\ORM\AbstractQuery;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EarthAgeStage>
 *
 * @method EarthAgeStage|null find($id, $lockMode = null, $lockVersion = null)
 * @method EarthAgeStage|null findOneBy(array $criteria, array $orderBy = null)
 * @method EarthAgeStage[]    findAll()
 * @method EarthAgeStage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EarthAgeStageRepository extends ServiceEntityRepository
{
    public function __construct(
        ManagerRegistry $registry,
        private readonly Filter $filter,
    )
    {
        parent::__construct($registry, EarthAgeStage::class);
    }

    /**
     * @param array<int> $ids
     *
     * @return array<int, array<string, mixed>>
     */
    public function findNamesById(array $ids): array
    {
        $queryBuilder = $this->createQueryBuilder('earthAgeStage')
            ->select('earthAgeStage.name')
            ->where('earthAgeStage.id IN (:ids)')
            ->setParameter('ids', $ids, ArrayParameterType::INTEGER);

        return $queryBuilder->getQuery()->getResult(AbstractQuery::HYDRATE_SCALAR_COLUMN);
    }

    /**
     * @return array<int, EarthAgeStage>
     */
    public function findBySeriesId(int $seriesId): array
    {
        $queryBuilder = $this->createQueryBuilder('earthAgeStage')
            ->where('earthAgeStage.earthAgeSeriesId = :seriesId')
            ->setParameter('seriesId', $seriesId);

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @param array<string, mixed> $filter
     *
     * @return array<int, EarthAgeStage>
     */
    public function findByFilter(array $filter): array
    {
        $queryBuilder = $this->createQueryBuilder('earthAgeStage');
        $this->filter->addFilter($filter, $queryBuilder);

        return $queryBuilder->getQuery()->getResult();
    }

    public function getStage(bool $isCreate, ?string $id): ?EarthAgeStage
    {
        if ($isCreate === false && $id === null) {
            return null;
        }

        if ($isCreate === true) {
            $system = new EarthAgeStage();
            $system->setCustom(true);

            return $system;
        }

        // @phpstan-ignore-next-line
        if ($id === null) {
            return null;
        }

        return $this->find($id);
    }

    public function save(EarthAgeStage $earthAgeSystem): void
    {
        $this->_em->persist($earthAgeSystem);
        $this->_em->flush();
    }

    public function delete(EarthAgeStage $earthAgeSystem): void
    {
        $this->_em->remove($earthAgeSystem);
        $this->_em->flush();
    }

    public function getColumnCount(): int
    {
        $queryBuilder = $this->createQueryBuilder('earthAgeStage')
            ->select(['COUNT(earthAgeStage.id)']);

        $result = $queryBuilder->getQuery()
            ->getResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);

        return (int) $result;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getExportList(int $limit, int $offset): array
    {
        return $this->getEntityManager()->getConnection()->createQueryBuilder()
            ->select(['*'])
            ->from('earth_age_stage')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->executeQuery()
            ->fetchAllAssociative();
    }
}
