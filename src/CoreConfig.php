<?php
declare(strict_types=1);

namespace Plaisio\Config;

use Plaisio\Kernel\Nub;
use SetBased\Exception\RuntimeException;
use SetBased\Helper\Cast;

/**
 * Class for fetching values of configuration parameters.
 */
class CoreConfig implements Config
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function manArray(int $cfgId): array
  {
    try
    {
      $json  = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);
      $value = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
      if (!is_array($value))
      {
        throw new RuntimeException('Value of parameter %d is not an array', $cfgId);
      }

      return $value;
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function manBool(int $cfgId): bool
  {
    try
    {
      $value = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);

      return Cast::toManBool($value);
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function manFiniteFloat(int $cfgId): float
  {
    try
    {
      $value = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);

      return Cast::toManFiniteFloat($value);
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function manFloat(int $cfgId): float
  {
    try
    {
      $value = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);

      return Cast::toManFloat($value);
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function manInt(int $cfgId): int
  {
    try
    {
      $value = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);

      return Cast::toManInt($value);
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function manString(int $cfgId): string
  {
    try
    {
      $value = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);

      return Cast::toManString($value);
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function optArray(int $cfgId): ?array
  {
    try
    {
      $json  = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);
      $value = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
      if (!is_array($value) && $value!==null)
      {
        throw new RuntimeException('Value if parameter %d is not an array nor null', $cfgId);
      }

      return $value;
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function optBool(int $cfgId): ?bool
  {
    try
    {
      $value = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);

      return Cast::toOptBool($value);
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function optFiniteFloat(int $cfgId): ?float
  {
    try
    {
      $value = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);

      return Cast::toOptFiniteFloat($value);
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function optFloat(int $cfgId): ?float
  {
    try
    {
      $value = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);

      return Cast::toOptFloat($value);
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function optInt(int $cfgId): ?int
  {
    try
    {
      $value = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);

      return Cast::toOptInt($value);
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function optString(int $cfgId): ?string
  {
    try
    {
      $value = Nub::$nub->DL->abcConfigCoreGetValue(Nub::$nub->companyResolver->getCmpId(), $cfgId);

      return Cast::toOptString($value);
    }
    catch (\Throwable $exception)
    {
      throw new RuntimeException([$exception], 'Failed to fetch value of parameter %d: %s',
                                 $cfgId,
                                 $exception->getMessage());
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
