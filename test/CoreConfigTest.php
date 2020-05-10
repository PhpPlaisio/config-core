<?php
declare(strict_types=1);

namespace Plaisio\Config\Test;

use PHPUnit\Framework\TestCase;
use Plaisio\C;
use Plaisio\Kernel\Nub;
use SetBased\Helper\Cast;

/**
 * Test cases for CoreConfig
 */
class CoreConfigTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The kernel for testing purposes.
   *
   * @var Nub
   */
  private $kernel;

  //--------------------------------------------------------------------------------------------------------------------

  /**
   * Returns invalid values for manBool().
   *
   * @return array
   */
  public function invalidManBool(): array
  {
    $cases   = $this->invalidOptBool();
    $cases[] = ['value' => null];

    return $cases;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns invalid values for manFiniteFloat().
   *
   * @return array
   */
  public function invalidManFiniteFloat(): array
  {
    $cases   = $this->invalidOptFiniteFloat();
    $cases[] = ['value' => null];

    return $cases;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns invalid values for manFloat().
   *
   * @return array
   */
  public function invalidManFloat(): array
  {
    $cases   = $this->invalidOptFloat();
    $cases[] = ['value' => null];

    return $cases;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns invalid values for manInt().
   *
   * @return array
   */
  public function invalidManInt(): array
  {
    $cases   = $this->invalidOptInt();
    $cases[] = ['value' => null];

    return $cases;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns invalid values for manString().
   *
   * @return array
   */
  public function invalidManString(): array
  {
    $cases   = [];
    $cases[] = ['value' => null];

    return $cases;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns invalid values for manBool().
   *
   * @return array
   */
  public function invalidOptBool(): array
  {
    return [['value' => 'hello, world']];
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns invalid values for optFiniteFloat().
   *
   * @return array
   */
  public function invalidOptFiniteFloat(): array
  {
    return [['value' => 'hello, world'],
            ['value' => NAN],
            ['value' => INF],
            ['value' => -INF]];
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns invalid values for optFloat().
   *
   * @return array
   */
  public function invalidOptFloat(): array
  {
    return [['value' => 'hello, world']];
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns invalid values for manInt().
   *
   * @return array
   */
  public function invalidOptInt(): array
  {
    return [['value' => 'hello, world']];
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function setUp(): void
  {
    $this->kernel = new TestKernel();
    $this->kernel->DL->connect();
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for manBool() with invalid values.
   *
   * @dataProvider invalidManBool
   *
   * @param mixed $value Test value.
   */
  public function testInvalidManBool($value): void
  {
    $this->expectException(\RuntimeException::class);
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString($value));
    Nub::$nub->config->manBool(C::CFG_ID_TEST);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for manFloat() with invalid values.
   *
   * @dataProvider invalidManFloat
   *
   * @param mixed $value Test value.
   */
  public function testInvalidManFloat($value): void
  {
    $this->expectException(\RuntimeException::class);
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString($value));
    Nub::$nub->config->manFloat(C::CFG_ID_TEST);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for manInt() with invalid values.
   *
   * @dataProvider invalidManInt
   *
   * @param mixed $value Test value.
   */
  public function testInvalidManInt($value): void
  {
    $this->expectException(\RuntimeException::class);
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString($value));
    Nub::$nub->config->manInt(C::CFG_ID_TEST);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for manString() with invalid values.
   *
   * @dataProvider invalidManString
   *
   * @param mixed $value Test value.
   */
  public function testInvalidManString($value): void
  {
    $this->expectException(\RuntimeException::class);
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString($value));
    Nub::$nub->config->manString(C::CFG_ID_TEST);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for manBool() with invalid values.
   *
   * @dataProvider invalidOptBool
   *
   * @param mixed $value Test values.
   */
  public function testInvalidOptBool($value): void
  {
    $this->expectException(\RuntimeException::class);
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString($value));
    Nub::$nub->config->optBool(C::CFG_ID_TEST);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for optFloat() with invalid values.
   *
   * @dataProvider invalidOptFloat
   *
   * @param mixed $value Test value.
   */
  public function testInvalidOptFloat($value): void
  {
    $this->expectException(\RuntimeException::class);
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString($value));
    Nub::$nub->config->optFloat(C::CFG_ID_TEST);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for manInt() with invalid values.
   *
   * @dataProvider invalidOptInt
   *
   * @param mixed $value Test values.
   */
  public function testInvalidOptInt($value): void
  {
    $this->expectException(\RuntimeException::class);
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString($value));
    Nub::$nub->config->optInt(C::CFG_ID_TEST);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for manBool().
   */
  public function testManBool(): void
  {
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(true));
    $value = Nub::$nub->config->manBool(C::CFG_ID_TEST);
    self::assertTrue($value);

    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(false));
    $value = Nub::$nub->config->manBool(C::CFG_ID_TEST);
    self::assertFalse($value);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for manFiniteFloat().
   */
  public function testManFiniteFloat(): void
  {
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(M_PI));
    $value = Nub::$nub->config->manFiniteFloat(C::CFG_ID_TEST);
    self::assertEquals(M_PI, $value);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for manFloat().
   */
  public function testManFloat(): void
  {
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(M_PI));
    $value = Nub::$nub->config->manFloat(C::CFG_ID_TEST);
    self::assertEquals(M_PI, $value);

    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(NAN));
    $value = Nub::$nub->config->manFloat(C::CFG_ID_TEST);
    self::assertNan($value);

    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(INF));
    $value = Nub::$nub->config->manFloat(C::CFG_ID_TEST);
    self::assertEquals(INF, $value);

    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(-INF));
    $value = Nub::$nub->config->manFloat(C::CFG_ID_TEST);
    self::assertEquals(-INF, $value);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for manInt().
   */
  public function testManInt(): void
  {
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(PHP_INT_MAX));
    $value = Nub::$nub->config->manInt(C::CFG_ID_TEST);
    self::assertEquals(PHP_INT_MAX, $value);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for manString().
   */
  public function testManString(): void
  {
    $text = 'hello, world';
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString($text));
    $value = Nub::$nub->config->manString(C::CFG_ID_TEST);
    self::assertEquals($text, $value);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for optBool().
   */
  public function testOptBool(): void
  {
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(true));
    $value = Nub::$nub->config->optBool(C::CFG_ID_TEST);
    self::assertTrue($value);

    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(false));
    $value = Nub::$nub->config->optBool(C::CFG_ID_TEST);
    self::assertFalse($value);

    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, null);
    $value = Nub::$nub->config->optBool(C::CFG_ID_TEST);
    self::assertNull($value);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for optFiniteFloat().
   */
  public function testOptFiniteFloat(): void
  {
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(M_PI));
    $value = Nub::$nub->config->optFiniteFloat(C::CFG_ID_TEST);
    self::assertEquals(M_PI, $value);

    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, null);
    $value = Nub::$nub->config->optFiniteFloat(C::CFG_ID_TEST);
    self::assertNull($value);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for optInt().
   */
  public function testOptInt(): void
  {
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString(PHP_INT_MAX));
    $value = Nub::$nub->config->optInt(C::CFG_ID_TEST);
    self::assertEquals(PHP_INT_MAX, $value);

    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, null);
    $value = Nub::$nub->config->optInt(C::CFG_ID_TEST);
    self::assertNull($value);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test cases for optString().
   */
  public function testOptString(): void
  {
    $text = 'hello, world';
    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, Cast::toOptString($text));
    $value = Nub::$nub->config->optString(C::CFG_ID_TEST);
    self::assertEquals($text, $value);

    Nub::$nub->DL->abcConfigMergeValue(C::CMP_ID_SYSTEM, C::CFG_ID_TEST, null);
    $value = Nub::$nub->config->optString(C::CFG_ID_TEST);
    self::assertNull($value);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
